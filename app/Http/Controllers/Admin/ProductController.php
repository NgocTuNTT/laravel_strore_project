<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Colors;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    protected $product;
    protected $category;
    protected $brand;
    protected $productImage;
    protected $color;
    protected $productColor;


    public function __construct(ProductColor $productColor, Product $product, Category $category, Brand $brand, ProductImage $productImage, Colors $color)

    {
        $this->category = $category;
        $this->brand = $brand;
        $this->product = $product;
        $this->color = $color;
        $this->productImage = $productImage;
        $this->productColor = $productColor;
    }

    public function index()
    {

        $product = $this->product->latest('id')->get();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $category = $this->category->all();
        $brand = $this->brand->all();
        $color = $this->color->where('status', '0')->get();
        return view('admin.product.create', compact('category', 'brand', 'color'));
    }
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $category = $this->category->all();
        $brand = $this->brand->all();
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $color = $this->color->whereNotIn('id', $product_color)->get();

        return view('admin.product.edit', compact('category', 'brand', 'product', 'color'));
    }
    public function store(ProductRequest $request)

    {
        $DataCreate = $request->validated();

        $category = $this->category->findOrFail($DataCreate['category_id']);
        // $product =  $category->products()->create($DataCreate);
        $product =  $category->products()->create([
            'category_id' => $DataCreate['category_id'],
            'name' => $DataCreate['name'],
            'brand' => $DataCreate['brand'],
            'slug' => $DataCreate['slug'],
            'small_description' => $DataCreate['small_description'],
            'description' => $DataCreate['description'],
            'original_price' => $DataCreate['original_price'],
            'selling_price' => $DataCreate['selling_price'],
            'quantity' => $DataCreate['quantity'],
            'meta_title' => $DataCreate['meta_title'],
            'meta_keyword' => $DataCreate['meta_keyword'],
            'meta_description' => $DataCreate['meta_description'],
            'status' => $request->status,
            'discount' => $request->discount,
            'trending' => $request->trending,
        ]);

        if ($request->hasFile('image')) {

            $uploadPath = 'upload/image/product/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . '' . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image'  => $finalImagePathName,
                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([

                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,

                ]);
            }
        }

        return to_route('product.index')->with(['message' => 'Thêm quyền thành công']);
    }


    public function update(int $product_id, ProductRequest $request)
    {


        $DataCreate = $request->validated();

        $product = $this->category->findOrFail($DataCreate['category_id'])->products()->where('id', $product_id)->first();
        if ($product) {
            $product->update([
                'category_id' => $DataCreate['category_id'],
                'name' => $DataCreate['name'],
                'brand' => $DataCreate['brand'],
                'slug' => $DataCreate['slug'],
                'small_description' => $DataCreate['small_description'],
                'description' => $DataCreate['description'],
                'original_price' => $DataCreate['original_price'],
                'selling_price' => $DataCreate['selling_price'],
                'quantity' => $DataCreate['quantity'],
                'meta_title' => $DataCreate['meta_title'],
                'meta_keyword' => $DataCreate['meta_keyword'],
                'meta_description' => $DataCreate['meta_description'],
                'status' => $request->status,
                'discount' => $request->discount,
                'trending' => $request->trending,
            ]);
            if ($request->hasFile('image')) {

                $uploadPath = 'upload/image/product/';

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . '' . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image'  => $finalImagePathName,
                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([

                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0,

                    ]);
                }
            }
            return to_route('product.index')->with(['message' => 'no']);
        }
    }

    public function destroyIMG(int $id)
    {

        $productImage = $this->productImage::findOrFail($id);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();

        return  redirect()->back()->with(['message' => 'no']);
    }

    public function destroy($id)
    {

        $product = $this->product->findOrFail($id);
        if ($product->productImage) {

            foreach ($product->productImage as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }

            }
        }
        $product->destroy($id);

        return redirect()->back()->with(['message' => 'no']);
    }



    public function updateProductColor(Request $request, $prod_color_id)
    {
        $productColorData = $this->product::findOrFail($request->product_id)
            ->productColors()->where('id', $prod_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Thành công']);
    }
    public function deleteProductColor($prod_color_id)
    {
        $productcolor = $this->productColor::findOrFail($prod_color_id);
        $productcolor->delete();
        return response()->json(['message' => 'Thành công']);
    }
}
