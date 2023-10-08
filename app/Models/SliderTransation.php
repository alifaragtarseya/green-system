<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTransation extends Model
{
    protected $table = 'slider_transations';

    protected $fillable = ['locale', 'slider_id', 'title' , 'description'];

    public $timestamps = false;
}
