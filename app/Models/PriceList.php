<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class PriceList extends Model
{
    use Translatable;
    protected $translatable = ['title', 'description', 'price'];
}
