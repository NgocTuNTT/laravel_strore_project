<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    //

    protected $slide;

    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    public function index()
    {

        $slide = $this->slide->latest('id')->get();
        return view('admin.slide.index', compact('slide'));
    }
    public function create()
    {

        return view('admin.slide.create');
    }
    public function store(SliderRequest $request)
    {

        $dataCreate = $request->validated();
        if ($request->hasFile('image')) {
            $uploadPath = 'upload/image/slide/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . '' . $filename;
            $dataCreate['image'] = $finalImagePathName;
        }
        $this->slide->create($dataCreate);
        // $dataCreate = $request->all();
        // $brand = $this->brand->create($dataCreate);
        return to_route('slide.index')->with(['message' => 'Thêm quyền thành công']);
    }
    public function edit( $id)
    {
        $slide = $this->slide->FindOrFail($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function update(SliderRequest $request, $id)
    {
        $dataUpdate = $request->all();
        $slide = $this->slide->FindOrFail($id);

        if ($request->hasFile('image')) {
            $uploadPath = 'upload/image/slide/';
            if(File::exists($slide->image))
            {
                File::delete($slide->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . '' . $filename;
            $dataUpdate['image'] ?? $slide->name = $finalImagePathName;

        }
        $slide->update($dataUpdate);
        return to_route('slide.index');

    }
    public function destroy($id)
    {
        $slide = $this->slide->findOrFail($id);

        $path =  $slide->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slide->destroy($id);
        return to_route('slide.index');
    }
}
