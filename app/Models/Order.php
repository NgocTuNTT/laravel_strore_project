<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'tracking_no',
        'name',
        'email',
        'phone',
        'pincode',
        'address',
        'status_message',
        'payment_id',
        'payment_mode',

    ];

    public function OrderItem(): HasMany{
            return $this->hasMany(OrderItem::class, 'order_id' ,'id');

    }
    public function payment()
{
    return $this->hasOne(Payment::class, 'order_id' ,'id');
}

}
