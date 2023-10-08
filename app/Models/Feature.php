<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Feature extends Model
{
    use Translatable;

    protected $table = 'features';

    protected $fillable = ['image', 'type'];

    public $translatedAttributes = ['title','description', 'meta_keywords', 'meta_description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'feature_id';

    public $translationModel = FeatureTranslation::class;
}
