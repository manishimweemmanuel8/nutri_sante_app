<?php

namespace App\Http\Controllers;

use App\AfterPreparation;
use Illuminate\Http\Request;
use App\Preparation;

class AfterPreparationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $afterPreparations=AfterPreparation::all();
        return view ('storage/afterPreparation.index',compact('afterPreparations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
         $preparation=Preparation::find($id);
        return view ('storage/afterPreparation.create', ['preparation'=>$preparation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation


         $request->validate([
         'employee_name'=>'required',
            'row_material_id'=>'required',
            'quantity'=>'required',
        ]);

         $preparationQuantity=Preparation::where('id',$request->input('row_material_id'))->value('quantity');
        $afterPreparationQuantity=$request->input('quantity');

         //check if product exist is great than the requested product
         if($preparationQuantity >= $afterPreparationQuantity){

              
              //save Product to be in preparation

            $afterPreparation = new AfterPreparation(); 
  
            $afterPreparation->preparation_id=$request->input('row_material_id') ;
            $afterPreparation->quantity= $request->input('quantity');
            $afterPreparation->missing= $preparationQuantity-$afterPreparationQuantity;
            $afterPreparation->user_id= auth('admin')->user()->name;
            $afterPreparation->employee_name=$request->input('employee_name');
            $afterPreparation->save(); 

            return redirect()->route('after.preparation.index')->with('message','data saved Successfully');

            
            
         }else{

            return redirect()->route('preparation.index')->with('message','quantity of preparation is less than the quantity after preparation');

             
          
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AfterPreparation  $afterPreparation
     * @return \Illuminate\Http\Response
     */
    public function show(AfterPreparation $afterPreparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AfterPreparation  $afterPreparation
     * @return \Illuminate\Http\Response
     */
    public function edit(AfterPreparation $afterPreparation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AfterPreparation  $afterPreparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AfterPreparation $afterPreparation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AfterPreparation  $afterPreparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(AfterPreparation $afterPreparation)
    {
        //
    }
}
