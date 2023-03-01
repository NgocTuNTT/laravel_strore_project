<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckountShow extends Component
{
    public $totalProductAmount = 0, $taxAmount = 0, $totalAmount = 0, $vnd = 23000, $vndtotal =0;
    public  $carts, $name, $email, $phone, $address, $payment_id = NULL, $payment_mode = NULL;


    protected $listeners = [
        'validationForALL',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function validationForALL()
    {
        $this->validate();
    }
    public function paidOnlineOrder($value, $amount)
    {

        $this->totalAmount = $amount /23000 ;
        $this->payment_id = $value;
        $this->payment_mode = 'Paypal';
        $codOrder = $this->placeOrder();
        if ($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();
            $this->emit('cartAddedUpdated');
            session()->flash('message1', 'đã đặt hàng');
        } else {
            session()->flash('message1', 'không có sản phẩm trong giỏ hàng');
        }
    }

    public function placeOrder()
    {

        $this->validate();

        if (Cart::where('user_id', auth()->user()->id)->exists()) {

            $order = Order::create(
                [
                    'user_id' => auth()->user()->id,
                    'tracking_no' => 'ord-' . mt_rand(100000, 999999),
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'pincode' => $this->phone,
                    'address' => $this->address,
                    'status_message' => 'Đang chờ xử lý',
                    'payment_id' => $this->payment_id,
                    'payment_mode' => $this->payment_mode,
                ]
            );

            $payment = Payment::create([

                'order_id' => $order->id,
                'payment_method' => $this->payment_mode,
                'transaction_id' => $this->payment_id,
                'amount' => $this->totalAmount,
            ]);

            $this->carts = Cart::where('user_id', auth()->user()->id)->get();

            foreach ($this->carts as $cartItem) {

                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'name' => $cartItem->product->name,
                    'product_color_id' => $cartItem->product_color_id,
                    'quantity' => $cartItem->quantity,
                    'price' =>  $cartItem->product->selling_price,
                ]);
                if ($cartItem->product_color_id != NULL) {
                    $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
                } else {
                    $cartItem->product()->where('id', $cartItem->product)->decrement('quantity', $cartItem->quantity);
                }
            }
            return $order;
        }
    }


    public function codOrder()
    {
        sleep(1);
        $this->payment_id = mt_rand(100000, 999999);
        $this->payment_mode = 'Tiền mặt';
        $codOrder = $this->placeOrder();
        if ($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();
            $this->emit('cartAddedUpdated');
            session()->flash('message1', 'đã đặt hàng');
        } else {
            session()->flash('message1', 'không có sản phẩm trong giỏ hàng');
        }
    }

    public function  totalProductAmount()
    {

        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        $this->taxAmount = $this->totalProductAmount * 0.05;

        $this->totalAmount = $this->totalProductAmount + $this->taxAmount + 30000 - 10000; // cộng phí ship 30k vào tổng giá trị đơn hàng
        return $this->totalAmount;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
        ];
    }

    public function render()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkount-show', [
            'totalAmount'   => $this->totalAmount,
            'vnd' => $this->vnd,
        ]);
    }
}
