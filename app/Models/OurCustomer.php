<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class OurCustomer extends Model
{
    use Translatable;

    protected $table = 'our_customers';

    protected $fillable = ['image'];

    public $translatedAttributes = ['title','description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'our_customer_id';

    public $translationModel = OurCustomerTranslation::class;
}
