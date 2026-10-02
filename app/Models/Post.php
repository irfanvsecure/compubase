<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['locale', 'slug', 'title', 'excerpt', 'body', 'cover_image', 'status', 'published_at', 'author_id'];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    /** Posts visitors may see: published, with a publish date that has arrived. */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published')->where('published_at', '<=', now());
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function url(): string
    {
        return url(($this->locale === 'ar' ? 'ar/' : '').'blog/'.$this->slug);
    }

    /** The body, written in Markdown, as HTML. Raw HTML in the body is stripped. */
    public function html(): string
    {
        return Str::markdown($this->body, ['html_input' => 'strip', 'allow_unsafe_links' => false]);
    }

    public function isLive(): bool
    {
        return $this->status === 'published' && $this->published_at !== null && $this->published_at->lte(now());
    }
}
