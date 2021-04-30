<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class AboutDataAndSeo extends Model
{
    use Translatable;
    protected $translatable = ["seo_title", "seo_description", "seo_keywords", "about_text", "barbers_first_title", "barbers_title", "panel_text"];
}
