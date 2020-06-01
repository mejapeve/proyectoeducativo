<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $table = "shopping_carts";

    public function kit()
    {

        return $this->belongsTo(Kit::class, 'kit_id', 'id');

    }

    public function rating_plan()
    {

        return $this->belongsTo(RatingPlan::class, 'rating_plan_id', 'id');

    }

    public function shopping_cart_product()
    {

        return $this->hasMany(ShoppingCartProduct::class, 'shopping_cart_id', 'id');

    }

    public function payment_status()
    {

        return $this->belongsTo(PaymentStatus::class, 'payment_status_id', 'id');

    }

}
