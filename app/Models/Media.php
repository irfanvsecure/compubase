<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** An uploaded image. 'path' is relative to the project root, e.g. uploads/2026/10/photo.jpg. */
class Media extends Model
{
    use SoftDeletes;

    protected $fillable = ['path', 'original_name', 'mime', 'size', 'width', 'height', 'alt_en', 'alt_ar'];

    public function url(): string
    {
        return asset($this->path);
    }
}
