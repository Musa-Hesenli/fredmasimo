<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ContactDataAndSeo extends Model
{
    use Translatable;
    protected $translatable = [
        "seo_title",
        "seo_description",
        "seo_keywords",
        "about_title",
        "about_content",
        "contact_info"
    ];
}
