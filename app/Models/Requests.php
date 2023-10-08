<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';

    protected $fillable = ['username', 'email', 'phone', 'message', 'service_id'];
}
