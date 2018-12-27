<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'phone' => 'required|unique:customers|max:255',
        'address' => 'required',
        'photo' => 'required',
        'city' => 'required',
        ]);

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

        $image=$request->file('photo');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.customer')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
                
            }
        }else{
              return Redirect()->back();
        }
    	
    	
    }

    public function AllCustomer()
    {
        $customer=DB::table('customers')->get();
        return view('all_customer')->with('customer',$customer);
    }

    //view a single employee
    public function ViewCustomer($id)
    {
        $single=DB::table('customers')
                ->where('id',$id)
                ->first();
        return view('view_customer', compact('single'));     
    }

//delete a single customer
    public function DeleteCustomer($id)
    {
         $delete=DB::table('customers')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('customers')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Customer Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.customer')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }               
    }

    public function EditCustomer($id)
    {
        $cus=DB::table('customers')->where('id',$id)->first();
        return view('edit_customer', compact('cus'));
    }

    public function UpdateCustomer(Request $request ,$id)
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
        $image=$request->file('photo');

      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('customers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }

}
