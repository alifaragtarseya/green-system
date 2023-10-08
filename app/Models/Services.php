<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Services extends Model
{
    use Translatable;

    protected $table = 'services';

    protected $fillable = ['image', 'icon',  'hide'];

    public $translatedAttributes = ['title','description', 'meta_keywords', 'meta_description', 'slug'];
    protected $with = ['translations'];

    public $translationForeignKey = 'service_id';

    public $translationModel = ServiceTranslation::class;

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = slug($value);
    }
}
