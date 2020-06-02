<?php

namespace App\Http\Controllers;

use App\Production;
use Illuminate\Http\Request;
use App\AfterPreparation;

class ProductionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $productions=Production::all();
        return view ('storage/production.index',compact('productions'));

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
         $afterPreparation=AfterPreparation::find($id);
        return view ('storage/production.create', ['afterPreparation'=>$afterPreparation]);
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
            'after_preparation_id'=>'required',
            'quantity'=>'required',
        ]);

        $afterPreparationQuantity=AfterPreparation::where('id',$request->input('after_preparation_id'))->value('quantity');
        $productionQuantity=$request->input('quantity');

         //check if product exist is great than the requested product
         if($afterPreparationQuantity >= $productionQuantity){
            $remainAfterPreparationQuantity= $afterPreparationQuantity-$productionQuantity;

              
              //save Product to be in preparation

            $production = new Production(); 
  
            $production->after_preparation_id=$request->input('after_preparation_id') ;
            $production->quantity= $request->input('quantity');
            $production->user_id= auth('admin')->user()->name;
            $production->employee_name=$request->input('employee_name');
            $production->save(); 


              //update row material product Quantity

              AfterPreparation::where('id',$request->input('after_preparation_id'))
            ->update(['quantity' => $remainAfterPreparationQuantity]);
             
            

            

            return redirect()->route('production.index')->with('message','Production go in production room Successfully');

            
            
         }else{

            return redirect()->route('production.index')->with('message','quantity of after Production is less than the quantity you went');

             
          
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
    }
}
