<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurWorkTranslation extends Model
{
    protected $table = 'our_work_translations';
    protected $fillable = [
        'title',
        'locale',
        'our_work_id',
        'description'
    ];
}
