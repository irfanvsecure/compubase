<?php

namespace App\Models;

use App\Support\Catalog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['slug', 'name_en', 'name_ar', 'group', 'position'];

    protected static function booted(): void
    {
        static::saved(fn () => Catalog::flush());
        static::deleted(fn () => Catalog::flush());
        static::restored(fn () => Catalog::flush());
    }

    /** The category's courses in listing order. */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)->withPivot('position')->orderByPivot('position');
    }
}
