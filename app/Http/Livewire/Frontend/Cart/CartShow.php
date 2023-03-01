<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart , $totalPrice = 0 ;



    public function buttonCart(int $id)
    {
            sleep(0.5);
        $Cart = Cart::where('user_id', auth()->user()->id)->find($id);
        if ($Cart) {

            $Cart->delete();
            session()->flash('message1', 'xóa sản phẩm thành công');
        }
        $this->emit('cartAddedUpdated');
    }

    public function decrementQuantity(int $CartID)
    {
        $cartData = Cart::where('id', $CartID)->where('user_id', auth()->user()->id)->first();
        if ($cartData ) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity >= $cartData->quantity &&  $cartData->quantity > 1) {
                    $cartData->decrement('quantity');
                    session()->flash('message1', 'Cập nhật số lượng sản phẩm thành công');
                } else {
                    session()->flash('message', 'Không thể giảm số lượng sản phẩm');
                }
            } else {

                if ($cartData->product->quantity >= $cartData->quantity && $cartData->quantity >1 ) {
                    $cartData->decrement('quantity');
                    session()->flash('message1', 'Cập nhật số lượng sản phẩm thành công');
                } else {
                    session()->flash('message', 'Không thể giảm số lượng sản phẩm ');
                }
            }
        } else {
            session()->flash('message', 'Không tìm thấy sản phẩm trong giỏ hàng');
        }
    }
    public function incrementQuantity(int $CartID)
    {
        $cartData = Cart::where('id', $CartID)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');

                    session()->flash('message1', 'Cập nhật số lượng thành công.');
                } else {
                    session()->flash('message', 'Số lượng đã đạt đến giới hạn.');
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message1', 'Cập nhật số lượng thành công.');
                } else {
                    session()->flash('message', 'Số lượng đã đạt đến giới hạn.');
                }
            }
        } else {
            session()->flash('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->latest('id')->get();

        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,
        ]);
    }
}
