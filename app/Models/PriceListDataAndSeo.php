<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class PriceListDataAndSeo extends Model
{
    use Translatable;
    protected $translatable = ['seo_title', 'seo_description', 'seo_keywords', 'panel_text', 'section_title'];
}
