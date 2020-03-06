<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $table = 'offerings';

    protected $fillable = [
        'title',
        'price',
        'quantity'
    ];

    public function offering()
    {
        return $this->hasOne('App\Purchase', 'offeringID');
    }
}
