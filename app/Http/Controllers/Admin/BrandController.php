<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    //
    protected $brand;


    public function __construct(Brand $brand)

    {
        $this->brand = $brand;
    }
    public function index()
    {

        $brand = $this->brand->latest('id')->get();

        return view('admin.brand.index', compact('brand'));
    }


    public function create(Request $request)
    {
        return view('admin.brand.create');

    }

    public function edit($id)
    {

            $brand = $this->brand->FindOrFail($id);

        return view('admin.brand.edit', compact('brand'));

    }

    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $brand = new $this->brand;

        $brand->name = $dataCreate['name'];
        $brand->slug = Str::slug($dataCreate['slug']);
        $brand->description = $dataCreate['description'];
        $brand->status = $request->status;
        $brand->meta_title = $dataCreate['meta_title'];
        $brand->meta_keyword = $dataCreate['meta_keyword'];
        $brand->meta_description = $dataCreate['meta_description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/image/brand', $filename);
            $brand->image = $filename;
        }
        $brand->save();
        // $dataCreate = $request->all();
        // $brand = $this->brand->create($dataCreate);
        return to_route('brand.index')->with(['message' => 'Thêm quyền thành công']);
    }

    public function update(Request $request, $id)
    {
        $brand = $this->brand->findOrFail($id);
        $dataCreate = $request->all();
        $brand->name = $dataCreate['name'];
        $brand->slug = Str::slug($dataCreate['slug']);
        $brand->description = $dataCreate['description'];
        $brand->meta_title = $dataCreate['meta_title'];
        $brand->meta_keyword = $dataCreate['meta_keyword'];
        $brand->meta_description = $dataCreate['meta_description'];
        $brand->status = $request->status;
        if ($request->hasFile('image')) {
            $path='upload/image/brand/'.$brand->image;

            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/image/brand', $filename);
            $brand->image = $filename;
        }
        $brand->update();
        // $dataCreate = $request->all();
        // $brand = $this->brand->create($dataCreate);
        return to_route('brand.index')->with(['message' => 'Thêm quyền thành công']);
    }


    public function destroy($id){

        $brand = $this->brand->findOrFail($id);
        $path='upload/image/brand/'.$brand->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $brand->destroy($id);
        return to_route('brand.index' );



    }
}
