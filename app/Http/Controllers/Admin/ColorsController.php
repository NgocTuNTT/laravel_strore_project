<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsRequest;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    //
    protected $color;
    public function __construct(Colors $color)

    {
        $this->color = $color;
    }


    public function index()

    {

        $color = $this->color->latest('id')->get();
        return view('admin.color.index', compact('color'));
    }

    public function create()
    {

        return view('admin.color.create');
    }
    public function store(ColorsRequest $request)
    {

        $DataCreate = $request->validated();
        $this->color->create([
            'status' => $request->status,
            'name' => $DataCreate['name'],
            'code' => $DataCreate['code'],
        ]);
        return to_route('color.index')->with(['message' => 'Thêm quyền thành công']);
    }
    public function edit($id)
    {

        $color = $this->color->findOrFail($id);

        return view('admin.color.edit', compact('color'));
    }
    public function update(ColorsRequest $request, $id)
    {

        $DataCreate = $request->validated();

        $color = $this->color->findOrFail($id);
        $color->status = $request->status;
        $color->update($DataCreate);

        return to_route('color.index')->with(['message' => 'Thêm quyền thành công']);
    }

    public function destroy($id)
    {

        $color = $this->color->findOrFail($id);
        $color->destroy($id);
        return to_route('color.index');
    }
}
