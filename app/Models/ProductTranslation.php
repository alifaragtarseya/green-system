<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $table = 'product_translations';
    protected $fillable = [
        'title',
        'description',
        'locale',
        'product_id'
    ];
}
