<?php

namespace App\Models;

use App\Support\Catalog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['slug', 'title_en', 'title_ar', 'days', 'summary_en', 'summary_ar', 'content_en', 'content_ar', 'photo'];

    protected function casts(): array
    {
        return [
            'days' => 'integer',
            'content_en' => 'array',
            'content_ar' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Catalog::flush());
        static::deleted(fn () => Catalog::flush());
        static::restored(fn () => Catalog::flush());
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withPivot('position');
    }
}
