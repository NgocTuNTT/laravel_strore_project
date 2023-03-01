<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{

    public $products, $category1, $products1, $quantityCount = 1, $prodColorSelectedQuantity, $productColorId,
        $selectedColorId;


    // ...

    public function addToWishList($productId)
    {
        sleep(1);

        if (Auth::check()) {

            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'sản phẩm đã có trong danh sách');
                return false;
            } else {
                if (Wishlist::where('user_id', auth()->user()->id)->count() < 5) {



                    $wishlist =  Wishlist::create(
                        [
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,

                        ]

                    );
                    $this->emit('wishlistUpdate');
                    session()->flash('message', 'thêm thành công');
                } else {
                    session()->flash('message', 'tối đa được thêm 5 sản phẩm');
                }
            }
        } else {
            session()->flash('message', 'vui longf ddawn nhap de them vao yeu thich');
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->selectedColorId = $productColorId;
        $this->productColorId = $productColorId;
        $productColor = $this->products->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity == 0)
            $this->prodColorSelectedQuantity = 'outOfStock';
    }
    public function decrementQuantity()
    {
        $this->quantityCount = max(1, $this->quantityCount - 1);
    }
    public function incrementQuantity()
    {
        $this->quantityCount = min(10, $this->quantityCount + 1);
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) { // kiểm tra xem người dùng đã đăng nhập hay chưa

            if ($this->products->where('id', $productId)->where('status', '0')->exists()) { // kiểm tra xem sản phẩm có tồn tại và đang bán không

                if ($this->products->productColors()->count() >= 1) { // kiểm tra xem sản phẩm có màu sắc không

                    if ($this->prodColorSelectedQuantity != NULL) { // kiểm tra xem người dùng đã chọn số lượng sản phẩm cần thêm vào giỏ hàng chưa

                        if (Cart::where('user_id', auth()->user()->id)->where('product_color_id', $this->productColorId)->exists()) { // kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
                            session()->flash('message', 'Sản phẩm đã có trong giỏ hàng.');
                        } else {
                            $productColor = $this->products->productColors()->where('id',  $this->productColorId)->first(); // lấy thông tin của sản phẩm có màu sắc được chọn

                            if ($productColor->quantity >= 1) { // kiểm tra xem sản phẩm có đủ số lượng để thêm vào giỏ hàng hay không

                                if ($productColor->quantity >= $this->quantityCount) { // kiểm tra xem số lượng sản phẩm cần thêm vào giỏ hàng có vượt quá số lượng sản phẩm còn lại hay không

                                    Cart::create([ // thêm sản phẩm vào giỏ hàng
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('cartAddedUpdated'); // gửi sự kiện cho phía client để cập nhật giỏ hàng

                                    session()->flash('message1', 'Thêm sản phẩm thành công.');
                                } else {
                                    session()->flash('message', 'Số lượng sản phẩm không đủ.');
                                }
                            } else {
                                session()->flash('message', 'Sản phẩm đã hết hàng.');
                            }
                        }
                    } else {
                        session()->flash('message', 'Vui lòng chọn màu sản phẩm.');
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) { // kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa

                        session()->flash('message', 'Sản phẩm đã có trong giỏ hàng.');
                    } else {
                        if ($this->products->quantity > 0) { // kiểm tra xem sản phẩm còn hàng hay đã hết hàng

                            if ($this->products->quantity > $this->quantityCount) { // kiểm tra xem số lượng sản phẩm cần thêm vào giỏ hàng có vượt quá số lượng sản phẩm còn lại hay không

                                Cart::create(
                                    [ // thêm sản phẩm vào giỏ hàng
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'quantity' => $this->quantityCount
                                    ]
                                );
                                $this->emit('cartAddedUpdated');
                                session()->flash('message1', 'Thêm sản phẩm thành công.');
                            } else {
                                session()->flash('message', 'Số lượng sản phẩm không đủ.');
                            }
                        } else {
                            session()->flash('message', 'Sản phẩm đã hết hàng.');
                        }
                    }
                }
            } else {
                session()->flash('message', 'Sản phẩm không tồn tại hoặc đã ngừng bán.');
            }
        } else {
            session()->flash('message', 'Vui lòng đăng nhập để mua hàng.');
        }
    }


    public function mount($products, $category1, $products1)
    {

        $this->products = $products;
        $this->products1 = $products1;
        $this->category1 = $category1;
    }


    public function render()
    {

        return view('livewire.frontend.product.view', [
            'products' => $this->products,
            'products1' => $this->products1,
            'category1' => $this->category1,


        ]);
    }
}
