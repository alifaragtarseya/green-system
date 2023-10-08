<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $table = 'service_translations';
    protected $fillable = [
        'title',
        'locale',
        'service_id',
        'description',
        'meta_keywords',
        'meta_description',
        'slug',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = slug($value);
    }
}
