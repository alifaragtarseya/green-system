<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class OurWork extends Model
{
    use Translatable;

    protected $table = 'our_works';

    protected $fillable = ['image', 'category_id'];

    public $translatedAttributes = ['title','description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'our_work_id';

    public $translationModel = OurWorkTranslation::class;
}
