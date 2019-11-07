<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'quantity', 'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_products');
    }

    public function product_relation()
    {
        return $this->belongsTo(User_product::class, 'product_id', 'id');
    }
}
