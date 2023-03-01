<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Count extends Component
{
    public $countWishlist;
    protected $listeners =['wishlistUpdate'=> 'checkWishlistCount'];

    public function checkWishlistCount()
    {



        if (Auth::check()) {
            return  $this->countWishlist = Wishlist::where('user_id', Auth()->user()->id)->count();
        } else {
            return  $this->countWishlist = 0;
        }
    }


    public function render()

    {

        $this->countWishlist = $this->checkWishlistCount();
        return view(


            'livewire.frontend.wishlist.count',
            [

                'countWishlist' => $this->countWishlist,
            ]

        );
    }
}
