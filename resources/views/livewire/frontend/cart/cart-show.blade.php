<div class="page-content">
    <div class="cart">
        <div id="notification-container">
            @if(session()->has('message'))
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header" style="justify-content: space-between;">
                    <img src="{{asset('frontend/assets/images/demos/demo-4/logo.png')}}" width="70px" alt="brand-logo" height="12" class="me-1">
                    <small style="">11 giây trước</small>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
            @endif
            @if(session()->has('message1'))
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header" style="justify-content: space-between;">
                    <img src="{{asset('frontend/assets/images/demos/demo-4/logo.png')}}" width="70px" alt="brand-logo" height="12" class="me-1">
                    <small>11 giây trước</small>
                </div>
                <div class="toast-body">
                    {{ session('message1') }}
                </div>
            </div>
            @endif
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-borderless table-centered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-right">Giá</th>
                                        <th class="text-center" style="    width: 150px; max-width: 100%;">Số lượng</th>
                                        <th class="text-right">Tổng</th>
                                        <th class="text-center" style="max-width: 70px;">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart as $cartItem)
                                    @if($cartItem->product)
                                    <tr>
                                        <td>
                                            <img src="{{asset($cartItem->product->productImages[0]->image)}}" width="74px" alt="contact-img" title="contact-img" class="rounded mr-3 d-inline-block">
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="apps-ecommerce-products-details.html" class="text-body">{{$cartItem->product->name}}</a>
                                                <br>
                                                <small class="me-2"><b>Size:</b> XL </small>
                                                <small><b>Màu:</b>
                                                     @if($cartItem->productColor)
                                                    {{$cartItem->productColor->color->name}}
                                                    @else
                                                    @endif

                                                </small>
                                            </p>
                                        </td>
                                        <td class="text-right">
                                            @if($cartItem->product->selling_price < $cartItem->product->original_price || $cartItem->product->selling_price == '')

                                                {{ str_replace(',', '.', number_format($cartItem->product->selling_price)) }}₫
                                                @else

                                                {{ str_replace(',', '.', number_format($cartItem->product->selling_price)) }}₫

                                                @endif



                                        </td>
                                        <td>
                                            <div class="input-group d-flex justify-content-center">
                                                <span class=" btn-danger d-flex w-25 justify-content-center" wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})" style="    align-items: center;">
                                                    <span>-</span>
                                                </span>
                                                <input type="text" value="{{$cartItem->quantity}}" readonly class=" text-center d-flex w-25" style="font-weight: 300; color: #777; background-color: #fafafa; border: 1px solid #ebebeb; border-radius: 0; transition: all 0.3s; box-shadow: none;">

                                                <span class=" btn-success w-25 d-flex justify-content-center" wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})" style="    align-items: center;">
                                                    <span>+</span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            {{ str_replace(',', '.', number_format(($cartItem->product->selling_price) * ($cartItem->quantity))) }}₫
                                        </td>
                                        @php
                                        $subtotal = ($cartItem->product->selling_price) * ($cartItem->quantity); // tính tổng giá trị sản phẩm trong giỏ hàng
                                        $totalPrice += $subtotal; // cộng giá trị sản phẩm vào tổng giá trị đơn hàng
                                        @endphp
                                        <td class="text-center">


                                            <button wire:click="buttonCart({{$cartItem->id}})" class="btn-remove">

                                                <span wire:loading.remove wire:target="buttonCart({{$cartItem->id}})" style="color: black;"><i style="font-size: 17px;" class="mdi mdi-delete    "></i>X</i>
                                                </span>
                                                <span wire:loading wire:target="buttonCart({{$cartItem->id}})"> <i class=" spinner-border"></i>

                                                </span>
                                            </button>
                                            <a href="" class="action-icon"> </a>
                                        </td>
                                    </tr>

                                    @endif

                                    @empty
                                    <p>hãy thêm sản phẩm vô giỏ hàng</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                    <div class="summary summary-cart">



                        @if(count($cart) > 0)
                        <div class="  mt-lg-0 rounded">
                            <h4 class="header-title mb-2 " style="font-size: 16px;">Giỏ hàng</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Tổng thu :</td>
                                            <td class="text-right">{{ str_replace(',', '.', number_format($totalPrice)) }}₫</td>
                                        </tr>
                                        <tr>
                                            <td>Giảm giá : </td>
                                            <td class="text-right">- 10.000₫</td>
                                        </tr>
                                        <tr>
                                            <td>Phí vận chuyển :</td>
                                            <td class="text-right">30.000₫</td>
                                        </tr>
                                        <tr>
                                            <td>Thuế 5% : </td>
                                            <td class="text-right">{{ str_replace(',', '.', number_format(  round($totalPrice * 0.05))) }}₫</td>
                                        </tr>
                                        <tr style="color: black;">
                                            <th style="color: black;">Tổng cộng :</th>
                                            <th style="color: black;" class="text-right">{{ str_replace(',', '.', number_format($totalPrice - 10000 + 30000 + round($totalPrice * 0.05))) }}₫</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <a href="{{url('/checkout')}}" class="btn btn-outline-primary-2 mt-2 btn-order btn-block">TIẾN HÀNG THANH TOÁN</a>

                        @else
                        <div class="  mt-lg-0 rounded">
                            <h4 class="header-title mb-2 " style="font-size: 16px;">Giỏ hàng</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Tổng thu :</td>
                                            <td class="text-right">0₫</td>
                                        </tr>
                                        <tr>
                                            <td>Giảm giá : </td>
                                            <td class="text-right">0₫</td>
                                        </tr>
                                        <tr>
                                            <td>Phí vận chuyển :</td>
                                            <td class="text-right">0₫</td>
                                        </tr>
                                        <tr>
                                            <td>Thuế 5% : </td>
                                            <td class="text-right">0₫</td>
                                        </tr>
                                        <tr style="color: black;">
                                            <th style="color: black;">Tổng cộng :</th>
                                            <th style="color: black;" class="text-right">0₫</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <a href="{{url('/checkout')}}" class="btn btn-outline-primary-2 mt-2 btn-order btn-block">TIẾN HÀNG THANH TOÁN</a>
                        @endif


                    </div><!-- End .summary -->

                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->



    </div><!-- End .cart -->
</div>
