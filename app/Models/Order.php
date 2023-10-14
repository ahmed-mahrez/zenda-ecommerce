<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = ['user_id', 'tracking_no', 'fullname', 'email', 'phone', 'zip_code', 'address', 'status', 'payment_mode', 'payment_status', 'payment_id'];


    public function items(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }

}
