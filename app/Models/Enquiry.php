<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** A message sent through one of the website forms. */
class Enquiry extends Model
{
    public const TYPES = ['contact' => 'Course enquiry', 'proposal' => 'Corporate proposal request', 'calendar' => 'Course calendar request'];

    protected $fillable = ['type', 'locale', 'name', 'organisation', 'email', 'phone', 'course', 'timing', 'team_size', 'message', 'page'];

    protected $casts = ['emailed_at' => 'datetime'];

    /** The enquiry as plain text, for the notification email. */
    public function summary(): string
    {
        $lines = ['Type' => self::TYPES[$this->type] ?? $this->type, 'Name' => $this->name, 'Organisation' => $this->organisation,
            'Email' => $this->email, 'Mobile' => $this->phone, 'Course' => $this->course, 'Timing' => $this->timing,
            'Team size' => $this->team_size, 'Language' => $this->locale === 'ar' ? 'Arabic' : 'English', 'Sent from' => $this->page];
        $text = collect($lines)->filter()->map(fn ($v, $k) => "{$k}: {$v}")->implode("\n");

        return $this->message ? $text."\n\nMessage:\n".$this->message : $text;
    }
}
