<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$data=array();
    	$data['id']=$request->id;
    	$data['name']=$request->name;
    	$data['qty']=$request->qty;
    	$data['price']=$request->price;
    	$add=Cart::add($data);
    	 if ($add) {
                 $notification=array(
                 'messege'=>'Product Added ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function CartUpdate(Request $request,$rowId)
    {
    	$qty=$request->qty;
    	$update=Cart::update($rowId, $qty);
    	if ($update) {
                 $notification=array(
                 'messege'=>'Update Successfully ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function CartRemove($rowId)
    {
    	$remove=Cart::remove($rowId);
    	if ($remove) {
                 $notification=array(
                 'messege'=>'Update Remove ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }

    }

    public function CreateInvoice(Request $request)
    {
    	//$contents=Cart::content();
    	$cus_id=$request->cus_id;
    	// echo "<pre>";
    	// print_r($contents);
    	// echo "<br>";
    	echo "$cus_id";
    }


}
