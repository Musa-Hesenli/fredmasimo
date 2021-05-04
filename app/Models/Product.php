<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use Translatable;
    protected $translatable = ['seo_title', 'seo_description', 'seo_keywords', 'available_text','ingredients' ,'name', 'description', 'slug'];
    function category_data() {
        return $this->belongsTo(ProductCategory::class, 'category', 'id');
    }
}
