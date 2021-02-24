<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Customer;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments=Payment::all();
        return view('payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create($id)
    {
       
        $customer=Customer::find($id);
        
         $customer = Customer::find($id);

         $name=$customer->names;
         $id=$customer->id;

         $count=Payment::where('customer_id',$id)->count();
        // $times=Payment::where('customer_id',$id)->value("count");



         if($count==0){

            $amount=11000;
             return view('payment.create',compact('amount','id','count'));



         }elseif ($count==1) {
            $amount=5000;
            return view('payment.create',compact('amount','id','count'));
         }else{
            $amount=3000;
           return view('payment.create',compact('amount','id','count'));
         }
       
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'customer_id'=>'required',
            'amount'=>'required',

           
        ]);



                $payment = new Payment();
                $payment->customer_id=$request->input('customer_id');
                $count=Payment::where('customer_id',$request->input('customer_id'))->count();
                $payment->count=$count+1;
                $payment->user_id=auth('admin')->user()->name;
                $payment->amount=$request->input('amount');
                $payment->save(); 
                return redirect()->route('payment.index')->with('message','payment Successfully');

    }

    public function dailySalesReport(){

        $payments = Payment::
                    where('created_at', '>=', date('Y-m-d'). ' 00:00:00')
                    ->get();
        return view('payment.daily', compact('payments'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

     public function receipt(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $payment = Payment::find($id);
        //delete
        $payment->delete();
        return redirect()->route('payment.index')->with('message', 'payment delete Successfully');
    }

     public function first(){

        $total=0;



        $payments = Payment::
                    where('created_at', '>=', date('Y-m-d'). ' 00:00:00')
                    ->where('count',1)
                    ->get();

                    
        return view('payment.first', compact('payments','total'));

    }

    public function second(){

        $total=0;



        $payments = Payment::
                    where('created_at', '>=', date('Y-m-d'). ' 00:00:00')
                    ->where('count',2)
                    ->get();

                    
        return view('payment.second', compact('payments','total'));

    }

      public function more(){

        $total=0;



        $payments = Payment::
                    where('created_at', '>=', date('Y-m-d'). ' 00:00:00')
                    ->where('count','>',2)
                    ->get();

                    
        return view('payment.more', compact('payments','total'));

    }

      public function daily(){

        $total=0;

        $payments = Payment::
                    where('created_at', '>=', date('Y-m-d'). ' 00:00:00')
                    ->get();

                    
        return view('payment.daily', compact('payments','total'));

    }


     public function betweenDateSalesReport(Request $request){

        $request->validate([
            'from'=>'required|before:now',
            'to'=>'required',

        ]);



         $total=0;
         $from = $request->get('from');
        $to = $request->get('to');
        $todayDate = date("Y-m-d");

         // session
         if($to > $from){
           $payments = Payment::
                whereBetween('created_at', [$from. ' 00:00:00', $to. ' 00:00:00'])
                ->get();

            return view('payment.daily', compact('payments','total'));
         }else{
            return redirect()->route('report.daily.payment')->with('message', 'to date is less than from data');

         }

        }

 
}
