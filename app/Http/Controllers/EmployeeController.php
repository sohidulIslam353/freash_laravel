<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
class EmployeeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_employee');
    }

//insert employee
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'photo' => 'required',
        'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image =$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
              $employee=DB::table('employees')
                        ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('home')->with($notification);                      
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

//all employees return here
    public function AllEmployee()
    {
    	
    	$employees=Employee::all();
    	return view('all_employee', compact('employees'));
    }

}
