@extends('layouts.app')

@section('title')
{{$category1->meta_title}}
@endsection

@section('description')
{{$category1->meta_description}}
@endsection

@section('keywords')
{{$category1->meta_keyword}}
@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('frontend/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Grid 3 Columns<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$category1->name}}</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <livewire:frontend.product.index :products="$products" :category1="$category1" :category="$category" :products1="$products1" />

</main><!-- End .main -->


@endsection
