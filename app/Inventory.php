<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [ 'product_id', 'supplier_id'];


    public function supplier()
    {
        return $this->belongsTo('App\User', 'supplier_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
