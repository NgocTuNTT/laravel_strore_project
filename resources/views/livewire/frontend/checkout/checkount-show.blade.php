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
                <div class="col-lg-7">
                    <div class="summary">
                        <h4 class="">
                            <font style="vertical-align: inherit;font-size: 16px;">Thông tin thanh toán</font>
                        </h4>

                        <div class="row">


                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="billing-first-name" class="form-label">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Name</font>
                                        </font>
                                    </label>
                                    <input wire:model.defer="name" class="form-control" type="email" placeholder="Nhập tên của bạn" id="name">
                                    @error('name')
                                    <span style="color:red; font-size: 12px;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="billing-last-name" class="form-label">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Phone</font>
                                        </font>
                                    </label>
                                    <input wire:model.defer="phone" class="form-control" type="text" placeholder="Nhập họ của bạn" id="phone">
                                    @error('phone')
                                    <span style="color:red; font-size: 12px;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="billing-first-name" class="form-label">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Email</font>
                                        </font>
                                    </label>
                                    <input wire:model.defer="email" class="form-control" type="email" placeholder="Nhập tên của bạn" id="email">
                                    @error('email')
                                    <span style="color:red; font-size: 12px;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="billing-last-name" class="form-label">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Address</font>
                                        </font>
                                    </label>
                                    <input wire:model.defer="address" class="form-control" type="text" placeholder="Nhập họ của bạn" id="address">
                                    @error('address')
                                    <span style="color:red; font-size: 12px;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>


                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-5">
                    <div class="summary summary-cart">
                        <h4 class="">
                            <font style="vertical-align: inherit;font-size: 16px;">Hình thức thanh toán </font>
                        </h4>
                        <div class="table-responsive">
                            <table class="table mb-2">
                                <tbody>
                                <tr>
                                        <th style="color: black;">Tổng thu : </th>
                                        <th style="color: black;" class="text-right">{{ str_replace(',', '.', number_format(  round($totalProductAmount))) }}₫</th>
                                    </tr>
                                    <tr>
                                        <th style="color: black;">Giảm giá : </th>
                                        <th  style="color: black;"  class="text-right">10.000₫</th>
                                    </tr>
                                    <tr>
                                        <th style="color: black;">Phí vận chuyển :</th>
                                        <th style="color: black;" class="text-right">30.000₫</th>
                                    </tr>
                                    <tr>
                                        <th style="color: black;">Thuế 5% : </th>
                                        <th style="color: black;" class="text-right">{{ str_replace(',', '.', number_format(  round($taxAmount))) }}₫</th>

                                    </tr>
                                    <tr>
                                        <th style="color: black;">Tổng cộng :</th>
                                        <th style="color: black;" class="text-right">{{ str_replace(',', '.', number_format(  $this->totalAmount)) }}₫</th>



                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="accordion-summary" id="accordion-payment">
                            <div wire:ignore class="card border mb-1 rounded-5" style="border-radius: 5px;">
                                <div class="card-header" id="heading-1" style="height: 65px;">
                                    <h2 class="card-title">
                                        <div data-toggle="collapse" href="#collapse-1" class=" p-3 pt-2 pb-2 mb-1 rounded" onclick="document.getElementById('BillingOptRadio23').checked=true;">
                                            <div class="row " style="      align-items: center;  ">
                                                <div class="col-sm-8 col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="billingOptions" id="BillingOptRadio23">
                                                        <label class="form-check-label font-16 fw-bold" for="BillingOptRadio23">
                                                            Thanh toán bằng PayPal
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4 col-6 d-flex align-items-center justify-content-end mt-sm-0">
                                                    <img src="{{asset('frontend/assets/images/paypal.png')}}" style="max-height: 25px;" height="25" alt="paypal-img">
                                                </div>
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion-payment" style="">
                                    <p class="mb-0 ps-3  pl-5 pr-2" style="font-size:  13px;">
                                    <div style="margin: 15px; " id="paypal-button-container"></div>

                                    </p>
                                </div><!-- End .collapse -->
                            </div><!-- End .card -->
                            <div class="card border mb-1 rounded-5" style="border-radius: 5px;">
                                <div class="card-header" id="heading-1" style="height: 65px;">
                                    <h2 class="card-title">
                                        <div data-toggle="collapse" href="#Credit" class=" p-3 pt-2 pb-2 mb-1 rounded" onclick="document.getElementById('Credit123').checked=true;">
                                            <div class="row " style="      align-items: center;  ">
                                                <div class="col-sm-8 col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="billingOptions" id="Credit123">
                                                        <label class="form-check-label font-16 fw-bold" for="Credit123">
                                                            Thẻ tín dụng / Thẻ ghi nợ
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4 col-6 d-flex align-items-center justify-content-end mt-sm-0">
                                                    <img src="{{asset('admin/assets/images/payments/master.png')}}" style="max-height: 24px;" height="24" alt="master-card-img">
                                                    <img src="{{asset('admin/assets/images/payments/discover.png')}}" style="max-height: 24px;" height="24" alt="master-card-img">
                                                    <img src="{{asset('admin/assets/images/payments/visa.png')}}" style="max-height: 24px;" height="24" alt="master-card-img">
                                                    <img src="{{asset('admin/assets/images/payments/stripe.png')}}" style="max-height: 24px;" height="24" alt="master-card-img">



                                                </div>
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <div id="Credit" class="collapse" aria-labelledby="heading-1" data-parent="#accordion-payment" style="">
                                    <p class="mb-0 ps-3  pl-5 pr-2" style="font-size:  13px;">
                                        Chuyển tiền an toàn bằng tài khoản ngân hàng của bạn. Chúng tôi hỗ trợ Mastercard, Visa, Discover và Stripe.

                                    </p>
                                </div><!-- End .collapse -->
                            </div><!-- End .card -->


                            <div wire:ignore class="card border mb-1 rounded-5" style="border-radius: 5px;">
                                <div class="card-header" id="heading-1" style="height: 65px;">
                                    <h2 class="card-title">
                                        <div data-toggle="collapse" href="#collapse-2" class=" p-3 pt-2 pb-2 mb-1 rounded" onclick="document.getElementById('BillingOptRadio13').checked=true;">
                                            <div class="row " style="      align-items: center;  ">
                                                <div class="col-sm-8 col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="billingOptions" id="BillingOptRadio13">
                                                        <label class="form-check-label font-16 fw-bold" for="BillingOptRadio13">
                                                            Thanh toán bằng tiền mặt
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4 col-6 d-flex align-items-center justify-content-end mt-sm-0">
                                                    <img src="{{asset('frontend/assets/images/cod.png')}}" style="max-height: 25px;" height="25" alt="paypal-img">
                                                </div>
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <div id="collapse-2" class="collapse" aria-labelledby="heading-1" data-parent="#accordion-payment" style="">
                                    <p class="mb-0 ps-3  pl-5 pr-2" style="font-size:  13px;">
                                    <div style="display: block; margin: 15px;    border-radius: 5px;" wire:click="codOrder" class="btn btn-danger">

                                        <span wire:loading.remove wire:target="codOrder">Xác nhận
                                        </span>
                                        <span wire:loading wire:target="codOrder"> <span class="spinner-border" style="font-size: 14px;"></span>

                                        </span>




                                    </div>
                                    </p>
                                </div><!-- End .collapse -->
                            </div><!-- End .card -->
                        </div>
                    </div><!-- End .summary -->

                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->



    </div><!-- End .cart -->
</div>


@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AS9sBohG02L2whxSfT1aJ1TBmVeSepB-8E01RxX-DGw6ubN4vt1BB6sCeha2Be5bqhuEi0hEt9MEgo6l"></script>
<script>
    paypal.Buttons({

        onClick() {


            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('name').value ||
                !document.getElementById('email').value ||
                !document.getElementById('phone').value ||
                !document.getElementById('address').value


            ) {
                Livewire.emit('validationForALL');
                return false;
            } else {
                @this.set('name', document.getElementById('name').value);
                @this.set('email', document.getElementById('email').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('address', document.getElementById('address').value);
            }
        },
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{$this->totalAmount}}'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {


                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                if (transaction.status == "COMPLETED") {

                    Livewire.emit('transactionEmit', transaction.id, transaction.amount.value);

                }

            });





        }
    }).render('#paypal-button-container');
</script>




@endpush
