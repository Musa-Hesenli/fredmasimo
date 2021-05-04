<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class GalleryDataSeo extends Model
{
    use Translatable;
    protected $translatable = ['seo_title', 'seo_keywords', 'seo_description'];
}
