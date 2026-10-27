<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * A change to the text of one page ("/about") or of every page ("*"): each
 * occurrence of find is shown as replace. See App\Support\PageTexts.
 */
class PageText extends Model
{
    public const ALL_PAGES = '*';

    protected $fillable = ['path', 'find', 'replace', 'is_html'];

    protected $casts = ['is_html' => 'boolean'];
}
