<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }


    public function index()
    {
        $setting = $this->setting->first();

        return view('admin.setting.index', compact('setting'));
    }


    public function store(Request $request)
    {

        $setting = $this->setting->first();
        if ($setting) {

            $setting->update([
                'title' => $request->title,
                'textColor' => $request->textColor,
                'buttonColor' => $request->buttonColor,
                'backgroundColor' => $request->backgroundColor,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'email3' => $request->email3,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'phone3' => $request->phone3,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'address3' => $request->address3,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
            ]);
            return redirect()->back();
        } else {
            $this->setting::create([

                'title' => $request->title,
                'textColor' => $request->textColor,
                'buttonColor' => $request->buttonColor,
                'backgroundColor' => $request->backgroundColor,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'email3' => $request->email3,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'phone3' => $request->phone3,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'address3' => $request->address3,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,


            ]);
            return redirect()->back();
        }
    }
}
