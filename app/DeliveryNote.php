<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    public function deliveryNoteDetails()
    {
        return $this->hasMany('App\DeliveryNoteDetails');
    }
}
