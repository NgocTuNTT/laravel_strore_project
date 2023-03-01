<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permisson;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    //

    public function create()
    {
        $permmissons = Permisson::all()->groupBy('ground');

        return view('admin.permissions.create', compact('permmissons'));
    }


    public function store(Request $request)
    {

        // $dataCreate = $request->all();
        $request->validate([
            'input.*name'=>'required'
        ]);

        foreach($request->inputs as $key => $value)
        {
            $dataCreate['guard_name'] = 'web';

            $permissions = Permisson::create($value);

        }

                // $name = $request->name;
                // $display_name = $request->display_name;
                // $ground = $request->ground;
                // $guard_name = $request->guard_name;

                // $datasave = [
                //     'name'=>$name,
                //     'display_name'=>$display_name,
                //     'ground'=>$ground,
                //     'guard_name'=>$guard_name,
                // ];
                // dd( $datasave);

    return redirect()->back()->with(['message' => 'Thêm quyền thành công']);
    }

    public function destroy($id)
    {
        //
        Permisson::destroy($id);
        return redirect()->back();
    }
}
