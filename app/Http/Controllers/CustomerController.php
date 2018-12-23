<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //new customer form view
    public function index()
    {
    	return view('add_customer');
    }

    public function Store(Request $request)
    {
    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['shopname']=$request->shopname;
    	$data['account_holder']=$request->account_holder;
    	$data['account_number']=$request->account_number;
    	$data['bank_name']=$request->bank_name;
    	$data['bank_branch']=$request->bank_branch;
    	$data['city']=$request->city;

    	echo "<pre>";
    	print_r($data);
    	exit();
    	
    }


}
