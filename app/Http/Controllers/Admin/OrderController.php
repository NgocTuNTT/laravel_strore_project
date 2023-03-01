<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {

        $order = $this->order->latest('id')->get();
        return view('admin.order.index', compact('order'));
    }

    public function view($id)
    {

        $orderdetails = $this->order->where('id', $id)->first();

        return view('admin.order.view', compact('orderdetails'));
    }


    public function update($id, Request $request)
    {

        $orderdetails = $this->order->where('id', $id)->first();

        $orderdetails->update([
            'status_message' => $request->status_message,
        ]);
        return redirect()->back();
    }
}
