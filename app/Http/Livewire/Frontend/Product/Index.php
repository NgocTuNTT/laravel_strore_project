<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    protected $products, $category1;
    protected $products1, $category;
    public $priceInput;
    protected $queryString = [

        'priceInput' => ['except' => '', 'as' => 'price'],
    ];


    public function mount($products, $category1, $products1, $category)
    {

        $this->products = $products;
        $this->category1 = $category1;
        $this->products1 = $products1;
        $this->category = $category;
    }


    public function addToWishList($productId)
    {


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
                    session()->flash('message', 'thêm thành công');
                }
                else{
                    session()->flash('message', 'tối đa được thêm 5 sản phẩm');

                }
            }
        } else {
            session()->flash('message', 'vui longf ddawn nhap de them vao yeu thich');
            return false;
        }


        dd($wishlist);
    }




    public function render()
    {
        // $this->products =  Product::when($this->priceInput, function ($q) {
        //     $q->when($this->priceInput == 'high-to-low', function ($q2) {
        //         $q2->orderBy('selling_price', 'DESC');
        //     })
        //         ->when($this->priceInput == 'low-to-high', function ($q2) {
        //             $q2->orderBy('selling_price', 'ASC');
        //         });
        // })->where('status', '0')->get();



        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category1' => $this->category1,
            'category' => $this->category,
            'products1' => $this->products1,


        ]);
    }
}
