@extends('layouts.admin')
@section('title','Sửa' )
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="col-sm-4 mt-3">
                <a href="{{route('product.index')}}" class="btn btn-danger btn-rounded mb-3"><i class="dripicons-reply"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>
<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">

                <div class="card-body">


                    <div class="col-sm-12 text-left">
                        <label for="formFileMultiple" class="form-label">Thêm ảnh ở đây</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="image[]" value="{{ old('image')}}" multiple>
                    </div>
                    <div>
                        @foreach($product->productImages as $image1)
                        <div class="dropzone-previews mt-2" id="file-previews">
                            <div class="card mt-1 mb-0 shadow-none border dz-processing dz-error dz-complete dz-image-preview">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img src="{{asset($image1->image)}}" style="max-width: 60px;" alt="Img">
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                            <p class="mb-0" data-dz-size=""><strong>0.6</strong> MB</p>
                                        </div>
                                        <div class="col-auto">

                                            <a href="{{route('product.destroyIMG',$image1->id)}}" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="mb-3 mt-3" style="text-align: left;">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Trạng thái</font>
                            </font>
                        </label>
                        <div class=" col-lg-12">
                            <div class="card m-1 shadow-none    ">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col ps-0" style="    display: flex;gap: 30px;">
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="hien" {{ old('status', $product->status)  == 0 ? 'checked' : '' }} name="status" value="0">
                                                <label class="form-check-label" for="hien">Hiện</label>
                                            </div>
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="an" name="status" value="1" {{ old('status', $product->status)  == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="an">Ẩn</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 mt-3" style="text-align: left;">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Discount</font>
                            </font>
                        </label>
                        <div class=" col-lg-12">
                            <div class="card m-1 shadow-none    ">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col ps-0" style="    display: flex;gap: 30px;">
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="hien1" name="discount" value="0" {{ old('discount', $product->discount)  == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="hien1">Hiện</label>
                                            </div>
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="an1" name="discount" value="1" {{ old('discount', $product->discount)  == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="an1">Không</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3 mt-3" style="text-align: left;">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Trending</font>
                            </font>
                        </label>
                        <div class=" col-lg-12">
                            <div class="card m-1 shadow-none    ">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col ps-0" style="    display: flex;gap: 30px;">
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="hien3" name="trending" value="0" {{ old('trending', $product->trending)  == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="hien3">Hiện</label>
                                            </div>
                                            <div class="form-check form-check-success">
                                                <input type="radio" class="form-check-input" id="an3" name="trending" value="1" {{ old('trending', $product->trending)  == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="an3">Không</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div> <!-- end card-body -->


        </div>



        <div class="col-xl-8 col-lg-7">
            <div class="card">

                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                Thông tin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                                SEO Tags
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Giá
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#color" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Màu sắc
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="aboutme">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Tên sản phẩm</label>
                                        <input value="{{ old('name') ?? $product->name }}" name="name" type="text" class="form-control" id="firstname" placeholder="Enter tên sản phẩm">
                                        @error('name')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Đường dẫn</label>
                                        <input value="{{ old('slug') ?? $product->slug}}" name="slug" type="text" class="form-control" id="lastname" placeholder="Enter đường dẫn">
                                        @error('slug')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Danh mục</label>
                                        <select name="category_id" class="form-control select2" data-toggle="select2">
                                            <option>Chọn</option>
                                            @foreach($category as $cate)
                                            <option value="{{ old('id') ??$cate->id }}" {{ $cate->id ==$product->category_id  ? 'selected' : '' }}>{{$cate->name}}</option>
                                            @endforeach
                                        </select>


                                        @error('category_id')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Thương hiệu </label>
                                        <select name="brand" class="form-control select2" data-toggle="select2">
                                            <option>Chọn</option>
                                            @foreach($brand as $bra)
                                            <option value="{{$bra->id}}" {{ $bra->id ==$product->brand  ? 'selected' : '' }}>{{$bra->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mô tả ngắn</label>
                                        <textarea name="small_description" value="{{ old('small_description') ?? $product->small_description}}" class="form-control" id="" rows="4" placeholder="Write something...">{{ old('small_description') ?? $product->small_description}}</textarea>
                                        @error('small_description')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mô tả </label>
                                        <textarea name="description" value="{{ old('description') ?? $product->description}}" class="form-control" id="" rows="3" placeholder="Write something...">{{ old('description') ?? $product->description}}</textarea>

                                        @error('description')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
                        <div class="tab-pane show " id="timeline">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Meta Title</label>
                                        <input value="{{ old('meta_title') ?? $product->meta_title}}" name="meta_title" type="text" class="form-control" id="firstname" placeholder="Enter tên sản phẩm">
                                        @error('meta_title')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Meta Keyword</label>
                                        <input value="{{ old('meta_keyword') ?? $product->meta_keyword}}" name="meta_keyword" type="text" class="form-control" id="lastname" placeholder="Enter đường dẫn">
                                        @error('meta_keyword')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" value="{{ old('meta_description') ?? $product->meta_description}}" class="form-control" id="" rows="4" placeholder="Write something...">{{ old('meta_description') ?? $product->meta_description}}</textarea>
                                        @error('meta_description')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>

                        <div class="tab-pane" id="settings">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Original Price</label>
                                        <input name="original_price" value="{{ old('original_price') ?? $product->original_price}}" type="text" class="form-control" data-reverse="true">
                                        @error('original_price')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Selling Price</label>
                                        <input name="selling_price" value="{{ old('selling_price') ?? $product->selling_price}}" type="text" class="form-control" data-reverse="true">
                                        @error('selling_price')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input name="quantity" value="{{ old('quantity') ?? $product->quantity}}" type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000" data-reverse="true">
                                        @error('quantity')
                                        <span class="text-danger"> {{$message}}
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                            </div> <!-- end row -->


                        </div>
                        <div class="tab-pane" id="color">
                            <div class="row">
                                <h5 class="mb-2">Màu chưa thêm</h5>
                                @foreach($color as $col)
                                <div class="col-md-2 ">
                                    <div class="form-check form-check-success">

                                        <input type="checkbox" class="form-check-input" id="{{$col->id}}" name="colors[{{$col->id}}]" value="{{$col->id}}">
                                        <label class="form-check-label" for="{{$col->id}}"> {{$col->name}}</label>


                                    </div>
                                    <div class="mb-1">
                                        <input name="colorquantity[{{$col->id}}]" value="{{ old('quantity')}}" placeholder="Quantity" type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000" data-reverse="true">

                                    </div>


                                </div>
                                @endforeach




                            </div>
                            <h5 class="mb-2 mt-4">Màu đã thêm</h5>
                            @foreach($product->productColors as $prodColor)

                            <div class="row ad-as-da">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <input disabled value="{{ $prodColor->color->name}}" name="color_id" type="text" class="form-control" id="firstname" placeholder="Enter tên sản phẩm">

                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <div class="mb-3  col-md-6">
                                        <input value="{{ old('quantity') ?? $prodColor->quantity}}" name="$prodColor->quantity" type="text" class="form-control productColorQuantity" id="lastname" placeholder="Quantity" data-toggle="input-mask" data-mask-format="00000" data-reverse="true">

                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <button type="button" class="btn btn-success updateProductColorBtn" value="{{$prodColor->id}}">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Cập nhập</font>
                                            </font>
                                        </button>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-3" style="text-align: end;">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-danger deleteProductColorBtn" value="{{$prodColor->id}}">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Xóa</font>
                                            </font>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div> <!-- end tab-content -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Cập Nhập</font>
                            </font>
                        </button>
                    </div>

                </div> <!-- end card body -->

            </div> <!-- end card -->
        </div>

    </div>

</form>
@section('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.updateProductColorBtn', function() {
            var product_id = "{{$product->id}}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.ad-as-da').find('.productColorQuantity').val();

            if (qty <= 0) {
                alert('quantity is required')
                return false;
            }
            var data = {
                'product_id': product_id,
                'qty': qty
            };
            $.ajax({
                type: "POST",
                url: "/admin/product/product-color/" + prod_color_id,
                data: data,
                success: function(response) {
                    alert(response.message)
                    location.reload();

                }

            });

        });


        $(document).on('click', '.deleteProductColorBtn', function() {
            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product/product-color/" + prod_color_id+"/delete",
                success: function(response) {

                    thisClick.closest('.ad-as-da').remove();
                }
            });
        });
    });
</script>

@endsection
@endsection
