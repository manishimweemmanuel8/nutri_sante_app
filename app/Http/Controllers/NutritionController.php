<?php

namespace App\Http\Controllers;

use App\Nutrition;
use Illuminate\Http\Request;
use App\Cunsultation;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nutritions=Nutrition::all();
        return view('nutrition.index', compact('nutritions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        

        // $request->validate([
        //     'product_id'=>'required',
        //     'quantity'=>'required',
        //      'payment_id'=>'required',
        //     'customer_id'=>'required',

        // ]);

        $nutrition = new Nutrition();

       
    
        $nutrition->cunsultation_id= Cunsultation::where('payment_id',$request->input('payment_id'))->value('id');
        $nutrition->product_id= $request->input('product_id');
        $nutrition->user_id= auth('admin')->user()->name;
        $nutrition->quantity= $request->input('quantity');
        $nutrition->customer_id= $request->input('customer_id');
        $nutrition->save(); 

        $nutritions=Nutrition::all();

        return redirect()->route('consultation.create',['id'=>$request->input('payment_id')])->with('message','nutrition saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function show(Nutrition $nutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutrition $nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nutrition $nutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
         $consultation_id=Nutrition::where('id',$id)->value('cunsultation_id');
         $payment_id=Cunsultation::where('id',$consultation_id)->value('payment_id');

        $nutrition = Nutrition::find($id);
        //delete
        $nutrition->delete();
        return redirect()->route('consultation.create',['id'=>$payment_id]);
        
    }
}
