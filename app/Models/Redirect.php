<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Sends visitors of from_path ("/course/old-name") to to_path (a path or a full URL). */
class Redirect extends Model
{
    protected $fillable = ['from_path', 'to_path', 'status_code'];

    public function target(): string
    {
        return preg_match('#^https?://#', $this->to_path) ? $this->to_path : url($this->to_path);
    }

    /** Point from_path at to_path, and keep older redirects from making chains. */
    public static function point(string $from, string $to, int $status = 301): self
    {
        static::where('to_path', $from)->update(['to_path' => $to]);
        static::where('from_path', $to)->delete();

        return static::updateOrCreate(['from_path' => $from], ['to_path' => $to, 'status_code' => $status]);
    }
}
