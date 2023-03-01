<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Str;

use function Pest\Laravel\delete;

class Index extends Component
{


    public function buttonWishlist(int $id)
    {

        $wishlist = Wishlist::where('user_id', auth()->user()->id)->find($id);
        if ($wishlist) {
            $wishlist->delete();
        }
        $this->emit('wishlistUpdate');
    }
    public function render()
    {

        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();



        return view(
            'livewire.frontend.wishlist.index',
            [
                'wishlist' => $wishlist,
            ]
        );
    }
}
