<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
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

    public function AddExpense()
    {
    	return view('add_expense');
    }

    public function InserExpense(Request $request)
    {
    	$data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
    	$data['year']=$request->year;

    	$exp=DB::table('expenses')->insert($data);
    	if ($exp) {
                 $notification=array(
                 'messege'=>'Successfully Expense Inserted ',
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

    public function TodayExpense()
    {
    	$date= date("d/m/y");
    	$today=DB::table('expenses')->where('date',$date)->get();
    	return view('today_expense', compact('today'));
    }

    public function EditTodayExpense($id)
    {
    	$tdy=DB::table('expenses')->where('id',$id)->first();
    	return view('edit_today_expense', compact('tdy'));
    }

    public function UpdateExpense(Request $request,$id)
    {
    	$data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
    	$data['year']=$request->year;

    	$exp=DB::table('expenses')->where('id',$id)->update($data);
    	if ($exp) {
                 $notification=array(
                 'messege'=>'Successfully Expense updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('today.expense')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }

}
