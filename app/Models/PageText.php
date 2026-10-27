<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * A change to the text of one page ("/about") or of every page ("*"): each
 * occurrence of find is shown as replace, and with a link the first one that is
 * not already in a link becomes a link. See App\Support\PageTexts.
 */
class PageText extends Model
{
    public const ALL_PAGES = '*';

    protected $fillable = ['path', 'find', 'replace', 'is_html', 'link'];

    protected $casts = ['is_html' => 'boolean'];
}
