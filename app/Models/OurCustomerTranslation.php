<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurCustomerTranslation extends Model
{
    protected $table = 'our_customer_translations';
    protected $fillable = [
        'title',
        'locale',
        'our_customer_id',
        'description'
    ];
}
