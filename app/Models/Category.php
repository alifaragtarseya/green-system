<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use Translatable;

    protected $table = 'categories';

    protected $fillable = ['id', 'created_at', 'updated_at'];

    public $translatedAttributes = ['title'];
    protected $with = ['translations'];

    public $translationForeignKey = 'category_id';

    public $translationModel = CategoryTranslation::class;


    public function ProductCategory(){
        return $this->HasMany(ProductCategory::class);
    }

}
