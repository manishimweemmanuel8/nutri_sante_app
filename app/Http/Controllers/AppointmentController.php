<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $appointments=Appointment::all();
        // return view('appointment.create',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $appointments=Appointment::all();
         return view('appointment/create',compact('appointments'));
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
            'customer'=>'required',
            'phone'=>'required|max:10',
            'date'=>'required|after:now',
            'time'=>'required',
          
            
        ]);
        $appointment = new Appointment();
  
        $appointment->customer= $request->input('customer');
        $appointment->phone= $request->input('phone');
        $appointment->date= $request->input('date');
        $appointment->time= $request->input('time');
        $appointment->user_id= auth('admin')->user()->name;
        
        $appointment->save(); 

       



        return redirect()->route('appointment.create')->with('message','Appointment registed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $appointment=Appointment::find($id);
        return view ('appointment.edit', ['appointment'=>$appointment]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
        $request->validate([
            'customer'=>'required',
            'phone'=>'required|max:10',
            'date'=>'required|after:now',
            'time'=>'required',
        ]);

        $appointment = Appointment::find($request->input('id'));
        $appointment->customer= $request->input('customer');
        $appointment->phone= $request->input('phone');
        $appointment->date= $request->input('date');
        $appointment->time= $request->input('time');
        $appointment->user_id= auth('admin')->user()->name;
        $appointment->update(); 
        return redirect()->route('appointment.create')->with('message','Appointment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $appointment=Appointment::find($id);
        $appointment->delete();

        return redirect()->route('appointment.create')->with('message ,Appointment deleted Successfully');
    }
}
