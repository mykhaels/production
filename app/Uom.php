<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    /**
     * The Uom that belong to the Product.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function deliveryNoteDetails()
    {
        return $this->hasMany('App\DeliveryNoteDetails');
    }
}
