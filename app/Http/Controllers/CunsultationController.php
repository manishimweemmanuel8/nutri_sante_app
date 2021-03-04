<?php

namespace App\Http\Controllers;

use App\Cunsultation;
use Illuminate\Http\Request;
use App\Payment;
use App\Customer;
use auth;
use App\product;
use App\Nutrition;
use App\Appointment;

class CunsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consultations=Cunsultation::all();
        return view('consultation.index', compact('consultations'));


    }

     public function customerCunsultation()
    {

        //
         $consultates = Payment::
                    where('status', 'start')->get();
                    // where('created_at', '>=', date('Y-m-d'). ' 00:00:00')->get();
        return view('consultation.customer', compact('consultates'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) 
    {
        //
        // return $id;
        $customer_id = Payment::where('id',$id)->value('customer_id');
        $payment=Payment::where('id',$id)->get();
        $customer=Customer::find($customer_id);
         // Payment::where('id',$id)
         //    ->update(['status' => 'start']);

        $consultation=Cunsultation::where('customer_id',$customer_id)->latest('id')->first();

        return view('consultation.create',['customer'=> $customer,],compact('id','consultation'));
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
            'customer_id'=>'required',
            'blood_type'=>'required',
            'payment_id'=>'required',
            'weight'=>'required',
            'height'=>'required',
            // 'ct_munda'=>'required',
            'ct_ukuboko'=>'required',
            // 'diagnosis'=>'required',
            'associated_deseases'=>'required',
            'reason'=>'required',
        ]);
        

        $consultation =new Cunsultation();
        $consultation->customer_id= $request->input('customer_id');
        $consultation->payment_id= $request->input('payment_id');
        $consultation->user_id= auth('admin')->user()->name;
        $consultation->blood_type= $request->input('blood_type');
        $consultation->weight= $request->input('weight');
        $consultation->height= $request->input('height');
        $consultation->ct_munda= $request->input('ct_munda');
        $consultation->ct_ukuboko= $request->input('ct_ukuboko');
        $consultation->associated_deseases= $request->input('associated_deseases');
        $consultation->reason= $request->input('reason');
        $consultation->bmi=$request->input('weight')/($request->input('height')*$request->input('height'));

        $consultation->save(); 

        Payment::where('id',$request->input('payment_id'))
            ->update(['status' => 'finish']);

        $cunsultation=Cunsultation::where('customer_id',$request->input('customer_id'))->latest('id')->first();

        return redirect()->route('consultation.create',['id'=>$request->input('payment_id'),'consultation'=>$consultation])->with('message','consultation store Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cunsultation  $cunsultation
     * @return \Illuminate\Http\Response
     */
    public function show(Cunsultation $cunsultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cunsultation  $cunsultation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $consultation = Cunsultation::find($id);
        return view('consultation.edit',['consultation'=> $consultation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cunsultation  $cunsultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cunsultation $cunsultation)
    {
        //

         $request->validate([
            'customer_id'=>'required',
            'bmi'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'waist_circumference'=>'required',
            'observation'=>'required',
            'blood_type'=>'required',
            'medical_conditions'=>'required',
        ]);

        $consultation = Cunsultation::find($request->input('id'));
        $consultation->customer_id= $request->input('customer_id');
        $consultation->user_id= auth('admin')->user()->name;;
        $consultation->bmi= $request->input('bmi');
        $consultation->weight= $request->input('weight');
        $consultation->height= $request->input('height');
        $consultation->waist_circumference= $request->input('waist_circumference');
        $consultation->observation= $request->input('observation');
        $consultation->blood_type= $request->input('blood_type');
        $consultation->medical_conditions= $request->input('medical_conditions');
        $consultation->update(); 
        return redirect()->route('consultation.index')->with('message','consultation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cunsultation  $cunsultation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $consultation = Cunsultation::find($id);
         $payment_id=Cunsultation::find($id)->value('payment_id');
        //delete
        $consultation->delete();


        Payment::where('id',$payment_id)
            ->update(['status' => 'start']);
        return redirect()->route('consultation.index');
    }


    public function saveNutrition(request $request){


        $consultation = Cunsultation::find($request->input('id'));

         $consultation->food_to_eat= $request->input('food_to_eat');
        $consultation->food_to_reduce= $request->input('food_to_reduce');
        $consultation->food_to_avoid= $request->input('food_to_avoid');
        $consultation->bad_nutritional_att= $request->input('bad_nutritional_att');
        $consultation->medication= $request->input('medication');
        $consultation->taget= $request->input('taget');
        $consultation->update(); 



        //schedule appointment

        // $date$date('Y-m-d', strtotime('+1 month'))


         $appointment = new Appointment();
  
        $appointment->customer= $consultation->customer->names;
        $appointment->phone= $consultation->customer->phone_no;
        $appointment->date= date('Y-m-d', strtotime('+1 month'));
        $appointment->time= date("H:i");
        $appointment->user_id= auth('admin')->user()->name;
        
        $appointment->save(); 



         return redirect()->route('consultation.report',['consultation'=>$consultation])->with('message','Nutritions saved Successfully');


    }

     public function report($id)
    {
        //
         $consultation = Cunsultation::find($id);
        return view('consultation.report',['consultation'=> $consultation]);
    }

       public function customer()
    {
        //
         $customers = Customer::all();
        return view('consultation/report.customer', compact('customers'));
        
    }

     public function history($customer_id)
    {
        //

        // return $customer_id;
         $consultations = Cunsultation::where('customer_id',$customer_id)->get();
         // return $consultations;
        return view('consultation/report.history',compact('consultations'));
    }


      public function daily(){


        $consultations = Cunsultation::
                    where('created_at', '>=', date('Y-m-d'). ' 00:00:00')
                    ->get();
                    // return $consultations;
        return view('consultation/report.daily', compact('consultations'));

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
           $consultations = Cunsultation::
                whereBetween('created_at', [$from. ' 00:00:00', $to. ' 00:00:00'])
                ->get();

            return view('consultation/report.daily', compact('consultations'));

        }else{
            return redirect()->route('report.daily')->with('message', 'to date is less than from data');

         }
        }

        

      public function moreInfo($id)
    {
    
        $consultation = Cunsultation::find($id);
        return view('consultation/report.moreInfo',['consultation'=> $consultation]);
   
    }



}
