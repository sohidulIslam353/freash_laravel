<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
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

    public function AddAdvancedSalary()
    {
      return view('advanced_salary');
    }

    public function AllSalary()
    {
    	return view('all_salary');
    }

    public function InsertAdvanced(Request $request)
    {
    	$data=array();
    	$data['emp_id']=$request->emp_id;
    	$data['month']=$request->month;
    	$data['advanced_salary']=$request->advanced_salary;
    	$data['year']=$request->year;

    	$advanced=DB::table('advance_salaries')->insert($data);
    	 if ($advanced) {
                 $notification=array(
                 'messege'=>'Successfully Advanced Paid ',
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
}
