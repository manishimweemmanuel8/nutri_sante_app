<?php

namespace App\Http\Controllers;

use App\Preparation;
use Illuminate\Http\Request;
use App\Rowproduct;

class PreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $preparations=Preparation::all();
        return view ('storage/preparation.index',compact('preparations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
         $rowProduct=Rowproduct::find($id);
        return view ('storage/preparation.create', ['rowProduct'=>$rowProduct]);
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

        $rowMaterialQuantity=Rowproduct::where('id',$request->input('row_material_id'))->value('quantity');
        $rowMaterialRequestQuantity=$request->input('quantity');

         //check if product exist is great than the requested product
         if($rowMaterialQuantity >= $rowMaterialRequestQuantity){
            $remainRowMaterialQuantity= $rowMaterialQuantity-$rowMaterialRequestQuantity;

              
              //save Product to be in preparation

            $preparation = new Preparation(); 
  
            $preparation->row_product_id=$request->input('row_material_id') ;
            $preparation->quantity= $request->input('quantity');
            $preparation->user_id= auth('admin')->user()->name;
            $preparation->employee_name=$request->input('employee_name');
            $preparation->save(); 


              //update row material product Quantity

              Rowproduct::where('id',$request->input('row_material_id'))
            ->update(['quantity' => $remainRowMaterialQuantity]);
             
            

            

            return redirect()->route('preparation.index')->with('message','row material go in preparation room Successfully');

            
            
         }else{

            return redirect()->route('preparation.index')->with('message','quantity of row material is less than the quantity you went');

             
          
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function show(Preparation $preparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function edit(Preparation $preparation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preparation $preparation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preparation  $preparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preparation $preparation)
    {
        //
    }
}
