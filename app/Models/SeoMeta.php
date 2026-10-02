<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** SEO overrides for one page, keyed by its path ("/", "/about", "/ar/course/pmp"). */
class SeoMeta extends Model
{
    protected $table = 'seo_meta';

    protected $fillable = ['path', 'title', 'description', 'keywords', 'og_image', 'robots', 'canonical'];
}
