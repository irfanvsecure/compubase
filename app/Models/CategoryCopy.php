<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** The written copy of one category page in one language; replaces resources/content/categories/{locale}/{slug}.php. */
class CategoryCopy extends Model
{
    protected $table = 'category_copy';

    protected $fillable = ['slug', 'locale', 'content'];

    protected $casts = ['content' => 'array'];
}
