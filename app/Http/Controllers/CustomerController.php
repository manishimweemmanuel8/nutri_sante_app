<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Payment;
use auth;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers=Customer::all();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $districts = DB::table("districts")->pluck("name","id");
       
        return view('customer/create',compact('districts'));
    
    }

     public function getSectorList(Request $request)
        {
            $sectors = DB::table("sectors")
            ->where("district_id",$request->district_id)
            ->pluck("name","id");
            return response()->json($sectors);
        }

      

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'names'=>'required',
            'sex'=>'required',
            'maritial_Status'=>'required',
           
            'dob'=>'required',
            'phone_no'=>'required',
        ]);
        $customer = new Customer();
  
        $customer->names= $request->input('names');
        $customer->sex= $request->input('sex');
        $customer->maritial_Status= $request->input('maritial_Status');
        $customer->occupation= $request->input('occupation');
        $customer->district_id= $request->input('district_id');
        $customer->sector_id= $request->input('sector_id');
        $customer->country= $request->input('country');
        $customer->email= $request->input('email');
        $customer->dob= $request->input('dob');
        $customer->phone_no= $request->input('phone_no');
        $customer->save(); 

        // $payment = new Payment();

        // $payment->customer_id=Customer::where('phone_no',$request->input('phone_no'))->value('id');
        // $payment->user_id=auth('admin')->user()->name;
        // $payment->amount=11000;

        // $payment->save(); 



        return redirect()->route('customer.index')->with('message','customer registed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //
        

        $customer = Customer::find($id);
        return view('customer.edit',['customer'=> $customer,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $request->validate([
            'names'=>'required',
            'sex'=>'required',
            'maritial_Status'=>'required',
            'occupation'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
        ]);

        $customer = Customer::find($request->input('id'));
        $customer->names= $request->input('names');
        $customer->sex= $request->input('sex');
        $customer->maritial_Status= $request->input('maritial_Status');
        $customer->occupation= $request->input('occupation');
        $customer->email= $request->input('email');
        $customer->dob= $request->input('dob');
        $customer->phone_no= $request->input('phone_no');
        $customer->update(); 
        return redirect()->route('customer.index')->with('message','customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        //delete
        $customer->delete();
        return redirect()->route('customer.index')->with('message','customer deleted Successfully');
    }
}
