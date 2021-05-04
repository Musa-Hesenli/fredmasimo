<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ProductsSeo extends Model
{
    use Translatable;
    protected $translatable = ['seo_title', 'seo_keywords', 'seo_description', 'panel_text', 'search_input_text', 'category_title', 'read_more_button', 'all_products'];
}
