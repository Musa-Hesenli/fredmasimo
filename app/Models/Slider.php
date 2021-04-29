<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Slider extends Model
{
    use Translatable;
    protected $translatable = ['first_title', 'main_title', 'second_title'];
}
