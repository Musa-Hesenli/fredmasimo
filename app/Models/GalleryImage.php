<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GalleryImage extends Model
{
    function filter(){
        return $this->belongsTo(GalleryCategory::class, 'category', 'id');
    }
}
