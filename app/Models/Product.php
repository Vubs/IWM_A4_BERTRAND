<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*protected $foreignKey = "prodcuts_type_id";*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'products_type_id');
    }


}
