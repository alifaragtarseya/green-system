<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'sliders';

    protected $fillable = [
        'image',
        'link',
        'hide'
    ];

    public $translatedAttributes = ['title' , 'description'];

    protected $with = ['translations'];

    public $translationForeignKey = 'slider_id';

    public $translationModel = SliderTransation::class;


    protected $hidden = ['created_at', 'updated_at'];

    public function scopePublished($query, $status = 0)
    {
        $query->whereHide($status);
    }

}
