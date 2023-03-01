@extends('layouts.app')

@section('title')
{{$products->meta_title}}
@endsection

@section('description')
{{$products->meta_description}}
@endsection

@section('keywords')
{{$products->meta_keyword}}
@endsection
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('/danh-muc/'.$products->category->slug)}}">{{$products->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$products->name}}</li>
            </ol>


        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <livewire:frontend.product.view :products="$products" :category1="$category1" :products1="$products1" />

</main><!-- End .main -->
@section('scripts')
<script>
    document.querySelector('.product-variation').addEventListener('click', function() {
        this.classList.toggle('selected');
    });
</script>

<script>
    setTimeout(function() {
        $('.alert123').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 2000);
</script>

@endsection
@endsection
