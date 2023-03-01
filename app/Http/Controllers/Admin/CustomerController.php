<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    protected $user;


    public function __construct(User $user){

            $this->user = $user;
    }


    public function index(){

        $customer = $this->user->where('role_as', '0')->latest('id')->paginate(10);

        return view('admin.customer.index', compact('customer'));
    }
}
