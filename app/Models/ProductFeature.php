<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class ProductFeature extends Model
{
    use Translatable;

    protected $table = 'product_features';
    protected $fillable = [
        'icon',
        'product_id'
    ];

    public $translatedAttributes = ['title', 'description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'product_feature_id';

    public $translationModel = ProductFeatureTranslation::class;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
