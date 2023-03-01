@extends('layouts.app')
@section('content')
@section('title','Danh mục')

<main class="main">
    <div class="page-header text-center" style="background-image: url('frontend/assets/images/demos/demo-4/surfing-board-rental-care-web-banner-template-concept_141928-149.avif')">
        <div class="container">
            <h1 class="page-title" style="margin: 100px;"></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Sản phẩm</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <livewire:frontend.product.index :products="$products" :category1="$category1" :category="$category" :products1="$products1"/>


</main><!-- End .main -->


@endsection
