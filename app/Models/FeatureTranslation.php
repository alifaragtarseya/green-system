<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    protected $table = 'feature_translations';
    protected $fillable = [
        'title',
        'locale',
        'feature_id',
        'description',
        'meta_keywords',
        'meta_description',
    ];
}
