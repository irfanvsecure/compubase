<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Support\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/** Saves what the website forms send, then emails it to the enquiry address. */
class EnquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $type = $request->input('type');
        $back = redirect()->to(url()->previous().'#'.$type.'-form');

        // Bots fill the hidden "website" field; pretend all went well.
        if ($request->filled('website')) {
            return $back->with('enquiry_sent', $type);
        }

        $data = $request->validate([
            'type' => 'required|in:'.implode(',', array_keys(Enquiry::TYPES)),
            'locale' => 'nullable|in:en,ar',
            'name' => 'required_unless:type,calendar|nullable|string|max:120',
            'organisation' => 'required_if:type,proposal|nullable|string|max:160',
            'email' => 'required|email|max:160',
            'phone' => 'required_unless:type,calendar|nullable|string|max:40',
            'course' => 'nullable|string|max:200',
            'timing' => 'nullable|string|max:40',
            'team_size' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:3000',
        ]);

        $enquiry = Enquiry::create($data + ['page' => substr((string) url()->previous(), 0, 250)]);

        $to = Settings::get('enquiry_email');
        if ($to) {
            try {
                Mail::raw($enquiry->summary(), function ($mail) use ($enquiry, $to) {
                    $mail->to($to)->replyTo($enquiry->email, $enquiry->name)
                        ->subject((Enquiry::TYPES[$enquiry->type] ?? 'Website enquiry').($enquiry->name ? ' — '.$enquiry->name : ''));
                });
                $enquiry->forceFill(['emailed_at' => now()])->save();
            } catch (\Throwable $e) {
                // The enquiry is saved either way; Claude can list it with list_enquiries.
                Log::warning('Enquiry email failed: '.$e->getMessage(), ['enquiry' => $enquiry->id]);
            }
        }

        return $back->with('enquiry_sent', $type);
    }
}
