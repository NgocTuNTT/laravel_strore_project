<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public $totalPrice = 0;

    public function index()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest('id')->paginate(6);
        return view('frontend.profile.index', compact('order'));
    }
    public function order($id)
    {
        $order = Order::where('user_id', auth()->user()->id)->where('id', $id)->first();
        $paymentAmount = $order->payment;
        return view('frontend.profile.order.view', compact('order', 'paymentAmount'));
    }
}
