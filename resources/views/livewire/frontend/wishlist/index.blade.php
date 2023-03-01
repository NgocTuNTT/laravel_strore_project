<div>
    <div class="page-content">
        <div class="container">


            <table id="alternative-page-datatable" class="table dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th class="text-right">Giá</th>
                        <th class="text-center">Danh mục</th>
                        <th class="text-center">Thao tác</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($wishlist as $itemWishlist)
                    @if($itemWishlist->products)

                    <tr>
                        <td>
                            <span> @if($itemWishlist->products->productImages->count() >0)
                                <img  src="{{asset($itemWishlist->products->productImages[0]->image)}}" style="max-width: 70px;" alt="product image">

                                @endif</span>
                            <span>{{$itemWishlist->products->name}}</span>
                        </td>
                        <td class="text-right"> @if($itemWishlist->products->selling_price < $itemWishlist->products->original_price || $itemWishlist->products->selling_price == '')

                                {{ number_format($itemWishlist->products->selling_price) }}₫
                                <span class="product-price12"> {{ number_format($itemWishlist->products->original_price) }}₫
                                </span>
                                @else

                                {{ number_format($itemWishlist->products->selling_price) }}₫

                                @endif</td>
                        <td class="text-center">In stock</td>
                        <td class="text-center"> <button wire:click="buttonWishlist({{$itemWishlist->id}})" class="btn-remove">
                                <span wire:loading.remove wire:target="buttonWishlist({{$itemWishlist->id}})"> <i style="color:black" class="icon-close"></i>
                                </span>
                                <span wire:loading wire:target="buttonWishlist({{$itemWishlist->id}})"> <i class="icon-close"></i>
                                </span>
                            </button></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
        </div><!-- End .container -->


    </div><!-- End .page-content -->


    </table>



</div>
