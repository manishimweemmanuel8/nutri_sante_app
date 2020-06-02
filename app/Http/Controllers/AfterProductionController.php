<?php

namespace App\Http\Controllers;

use App\AfterProduction;
use Illuminate\Http\Request;
use App\Production;
use App\Production_store;
use App\Deliver;

class AfterProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $afterProductions=AfterProduction::all();
        // return $afterProductions->production_id;
        return view ('storage/afterProduction.index',compact('afterProductions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
         $production=Production::find($id);
        return view ('storage/afterProduction.create', ['production'=>$production]);
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
            'production_id'=>'required',
            'quantity'=>'required',
            'product_id'=>'required',
        ]);

        

         $productionQuantity=Production::where('id',$request->input('production_id'))->value('quantity');
        $afterProductionQuantity=$request->input('quantity');

       

         //check if product exist is great than the requested product
         if($productionQuantity >= $afterProductionQuantity){

              
              // save Product to be in preparation

            $afterProduction = new AfterProduction(); 
  
            $afterProduction->production_id=$request->input('production_id') ;
            $afterProduction->quantity= $request->input('quantity');
            $afterProduction->missing= $productionQuantity - $afterProductionQuantity;
            $afterProduction->user_id= auth('admin')->user()->name;
            $afterProduction->employee_name=$request->input('employee_name');
            $afterProduction->save();

             

           $product=Production_store::where('after_production_id',$request->input('product_id'))->value("after_production_id");
         if(!$product){
            $production=new Production_store;
            $production->after_production_id= $request->input('product_id');
            $production->quantity= $request->input('quantity');
            $production->stock= "Production";
            $production->user_id= auth('admin')->user()->name;
            $production->save(); 



             $newStock = new Deliver();
            $newStock->product_id= $request->input('product_id');
            $newStock->quantity= $request->input('quantity');
            $newStock->status= 'In';
            $newStock->storage_user= auth('admin')->user()->name;
            // $newStock->shop= auth('admin')->user()->shop;
            $newStock->save();  
            return redirect()->route('after.production.index')->with('message','production stored saved Successfully');


         }else{
             $existQuanitity=Production_store::where('after_production_id',$request->input('product_id'))->value('quantity');

            $newQuantity=$existQuanitity+$request->input('quantity');

            Production_store::where('after_production_id',$request->input('product_id'))
            ->update(['quantity' => $newQuantity]);  


            $newStock = new Deliver();
            $newStock->product_id= $request->input('product_id');
            $newStock->quantity= $request->input('quantity');
            $newStock->status= 'In';
            $newStock->storage_user= auth('admin')->user()->name;
            // $newStock->shop= auth('admin')->user()->shop;
            $newStock->save();  


            return redirect()->route('after.production.index')->with('message','production stored saved Successfully');       
        }
            

        //     if($production){
        // $product=Production_store::where('product_id',$request->input('product_id'))->value('product_id');
        

        // if(!$product){
        // $production=new Production_store;
        // $production->product_id= $request->input('product_id');
        // $production->quantity= $request->input('quantity');
        // $production->user_id= auth('admin')->user()->name;
        // $production->save(); 
       

      

        //     return redirect()->route('storage.index')->with('message','production stored saved Successfully');
        // }

        //  
           }
            else{
                 return redirect()->route('production.index')->with('message','Product does not saved in final stock Successfully');
            }



         //    return redirect()->route('after.production.index')->with('message','data saved Successfully');

            
            
         // }else{

         //    return redirect()->route('after.production.index')->with('message','quantity of preparation is less than the quantity after preparation');

             
          
         // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AfterProduction  $afterProduction
     * @return \Illuminate\Http\Response
     */
    public function show(AfterProduction $afterProduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AfterProduction  $afterProduction
     * @return \Illuminate\Http\Response
     */
    public function edit(AfterProduction $afterProduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AfterProduction  $afterProduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AfterProduction $afterProduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AfterProduction  $afterProduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(AfterProduction $afterProduction)
    {
        //
    }
}
