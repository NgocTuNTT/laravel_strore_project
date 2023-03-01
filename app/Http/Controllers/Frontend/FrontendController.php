<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public $product;
    public $slide;
    public $category;


    public function __construct(Product $product, Slide $slide, Category $category)

    {
        $this->product = $product;
        $this->slide = $slide;
        $this->category = $category;
    }
    public function index()
    {
        $category = $this->category->where('status', ' 0')->get();
        $product = $this->product->where('status', '0')->inRandomOrder()->paginate(8);
        // sản phẩm silde all
        $products1 = $this->product->where('status', '0')->latest('id')->get();

        $slide = $this->slide->where('status', '0')->paginate(8);
        return view('frontend.index', compact('product','products1',  'slide', 'category'));
    }

    public function categories()
    {

        $category = $this->category->where('status', ' 0')->get();
        $category1 = $this->category->where('status', ' 0')->get();

        $products1 = $this->product->where('status', '0')->latest('id')->paginate(9);


        $products = $this->product->where('status', '0')->paginate(9);
        return view('frontend.collections.category.index', compact('category1','category','products','products1'));
    }


    public function products($category_slug)
    {

        $category = $this->category->where('status', ' 0')->get();

        $category1 = $this->category->where('slug', $category_slug)->first();
        if ($category1) {
            $products = $category1->products()->where('status', ' 0')->paginate(9);
            /// đếm tất cả sản phẩm
            $products1 = $this->product->where('status', '0')->paginate(9);

            return view('frontend.collections.products.index', compact('category', 'products','products1', 'category1'));
        } else {
            return redirect()->back();
        }
    }
    public function details(string $category_slug, string $product_slug)
    {

        $category1 = $this->category->where('slug', $category_slug)->first();
        if ($category1) {

            $products = $category1->products()->where('slug', $product_slug)->where('status', ' 0')->first();
            $products1 = $category1->products()->where('slug','<>', $product_slug)->where('status', ' 0')->get();

            if ($products) {
                return view('frontend.collections.details.index', compact('products','products1', 'category1'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
