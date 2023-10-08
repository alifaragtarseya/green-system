<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class CategoryTranslation extends Model
{
    protected $table = 'category_translations';
    protected $fillable = [
        'title',
        'locale',
        'category_id'
    ];
}
