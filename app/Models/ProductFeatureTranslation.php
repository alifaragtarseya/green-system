<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureTranslation extends Model
{
    protected $table = 'product_feature_translations';
    protected $fillable = [
        'title',
        'description',
        'locale',
        'product_feature_id'
    ];
}
