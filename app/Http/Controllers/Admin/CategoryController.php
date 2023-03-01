<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use function Pest\Laravel\delete;

class CategoryController extends Controller
{

  protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
         $category = $this->category->latest('id')->get();

        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryRequest $request)
    {

        $dataCreate = $request->validated();
        $category = new $this->category;
        $category->name = $dataCreate['name'];
        $category->slug = Str::slug($dataCreate['slug']);
        $category->description = $dataCreate['description'];
        $category->meta_title = $dataCreate['meta_title'];
        $category->meta_keyword = $dataCreate['meta_keyword'];
        $category->meta_description = $dataCreate['meta_description'];
        $category->status = $request->status ;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/image/category',$filename);
            $category->image = $filename;

        }
        $category->save();
        return to_route('category.index')->with(['message' => 'Thêm quyền thành công']);



    }
    public function edit($id){

        $category = $this->category->findOrFail($id);

        return view('admin.category.edit', compact('category'));

    }

    public function update($id , CategoryRequest $request){


        // $category = $this->category->findOrFail($id);
        // $dataUpdate = $request->all();
        // $category->update($dataUpdate);

        $category = $this->category->findOrFail($id);
        $dataCreate = $request->validated();
        $category->name = $dataCreate['name'];
        $category->slug = Str::slug($dataCreate['slug']);
        $category->description = $dataCreate['description'];
        $category->meta_title = $dataCreate['meta_title'];
        $category->meta_keyword = $dataCreate['meta_keyword'];
        $category->meta_description = $dataCreate['meta_description'];
        $category->status = $request->status ;
        if($request->hasFile('image')){
            $path='upload/image/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/image/category/',$filename);
            $category->image = $filename;

        }
        $category->update();
        return to_route('category.index')->with(['message' => 'Thêm quyền thành công']);

    }
    public function destroy($id){

        $category = $this->category->findOrFail($id);
        $path='upload/image/category/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $category->destroy($id);
        return to_route('category.index' );

    }
}
