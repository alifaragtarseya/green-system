<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use Translatable;

    protected $table = 'products';

    protected $fillable = ['image', 'link'];

    public $translatedAttributes = ['title', 'description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'product_id';

    public $translationModel = ProductTranslation::class;




    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'product_id', 'id');
    }

    public function ProductCategory(){
        return $this->HasMany(ProductCategory::class);
    }



    public static function scopeFilter($query,$request)
    {
        return $query->where(function ($q) use ($request) {
            if ($request->search) {
                $q->whereHasTranslate('title', 'like', '%' . $request->search . '%');

            }


            if ($request->category_id) {
                $productIds = ProductCategory::where('category_id' , $request->category_id)->pluck('product_id')->toArray();
                $q->whereIn('id', $productIds);
            }
        });
    }

    public function getCategoryName($product_id){
        $categorIds = $this->ProductCategory()->where('product_id' , $product_id)->pluck('category_id')->toArray();
        return Category::whereIn('id', $categorIds)->get();
    }
}
