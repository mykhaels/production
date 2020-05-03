<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryNoteDetails extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function uoms()
    {
        return $this->belongsTo('App\Uom', 'uom_id');
    }

    public function deliveryNotes()
    {
        return $this->belongsTo('App\DeliveryNote', 'delivery_note_id');
    }
}
