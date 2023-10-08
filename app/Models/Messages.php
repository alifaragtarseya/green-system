<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';

    protected $fillable = ['username', 'email', 'phone', 'message', 'service_id', 'subject', 'view'];

    protected $with = ['service'];

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }
}
