@extends('layouts.app')

@section('title','Giỏ hàng')


@section('content')

<main class="main">

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <livewire:frontend.cart.cart-show/>

</main><!-- End .main -->


@endsection

