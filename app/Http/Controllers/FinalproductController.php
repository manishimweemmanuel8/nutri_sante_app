<?php

namespace App\Http\Controllers;

use App\Finalproduct;
use Illuminate\Http\Request;
use App\Product;
use App\Production_store;
use App\Deliver;

class FinalproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $finalProducts=Finalproduct::all();
        return view('storage/finalproduct.index',compact('finalProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=Product::all();
         return view('storage/finalproduct/create',compact('products'));
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
            'supply_name'=>'required',
            'supply_phone'=>'required',
            'product_id'=>'required',
            'category'=>'required',
            'quantity'=>'required',
            'amount'=>'required',
          
            
        ]);

        

        $finalProduct = new Finalproduct();
  
        $finalProduct->supply_name= $request->input('supply_name');
        $finalProduct->supply_phone= $request->input('supply_phone');
        $finalProduct->product_id= $request->input('product_id');
        $finalProduct->category= $request->input('category');
        $finalProduct->quantity= $request->input('quantity');
        $finalProduct->amount= $request->input('amount');
        $finalProduct->user_id= auth('admin')->user()->name;
        $finalProduct->save(); 



        $product=Production_store::where('after_production_id',$request->input('product_id'))->value("after_production_id");
         if(!$product){
            $production=new Production_store;
            $production->after_production_id= $request->input('product_id');
            $production->quantity= $request->input('quantity');
            $production->stock= "Final Product";
            $production->user_id= auth('admin')->user()->name;
            $production->save(); 

            $newStock = new Deliver();
            $newStock->product_id= $request->input('product_id');
            $newStock->quantity= $request->input('quantity');
            $newStock->status= 'In';
            $newStock->storage_user= auth('admin')->user()->name;
            // $newStock->shop= auth('admin')->user()->shop;
            $newStock->save(); 

            return redirect()->route('finalProduct.index')->with('message','production stored saved Successfully');

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
            return redirect()->route('finalProduct.index')->with('message','production stored saved Successfully');       
        }
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
        $products=Product::all();
        $finalProduct=Finalproduct::find($id);
        return view ('storage/finalproduct.edit', ['finalProduct'=>$finalProduct],compact('products'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'supply_name'=>'required',
            'supply_phone'=>'required',
            'product_id'=>'required',
            'category'=>'required',
            'quantity'=>'required',
            'amount'=>'required',
        ]);

        $finalProduct = Finalproduct::find($request->input('id'));
        $finalProduct->supply_name= $request->input('supply_name');
        $finalProduct->supply_phone= $request->input('supply_phone');
        $finalProduct->product_id= $request->input('product_id');
        $finalProduct->category= $request->input('category');
        $finalProduct->quantity= $request->input('quantity');
        $finalProduct->amount= $request->input('amount');
        $finalProduct->user_id= auth('admin')->user()->name;
        $finalProduct->update(); 
        return redirect()->route('finalProduct.index')->with('message','Final Product Updated Successfully');
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
        $finalProduct=Finalproduct::find($id);
        $finalProduct->delete();

        return redirect()->route('finalProduct.index')->with('message ,Final Product deleted Successfully');
    }
}
