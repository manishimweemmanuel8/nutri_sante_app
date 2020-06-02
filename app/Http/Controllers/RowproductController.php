<?php

namespace App\Http\Controllers;

use App\Rowproduct;
use Illuminate\Http\Request;
use App\Product;

class RowproductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $rowProducts=Rowproduct::all();
        return view('storage/rowproduct.index',compact('rowProducts'));
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
         return view('storage/rowproduct/create',compact('products'));
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
        $rowProduct = new Rowproduct();
  
        $rowProduct->supply_name= $request->input('supply_name');
        $rowProduct->supply_phone= $request->input('supply_phone');
        $rowProduct->product_id= $request->input('product_id');
        $rowProduct->category= $request->input('category');
        $rowProduct->quantity= $request->input('quantity');
        $rowProduct->amount= $request->input('amount');
        $rowProduct->user_id= auth('admin')->user()->name;
        $rowProduct->save(); 

        return redirect()->route('rowProduct.index')->with('message','Row Material Product registed Successfully');
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
        $rowProduct=Rowproduct::find($id);
        return view ('storage/rowproduct.edit', ['rowProduct'=>$rowProduct],compact('products'));

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

        $rowProduct = Rowproduct::find($request->input('id'));
        $rowProduct->supply_name= $request->input('supply_name');
        $rowProduct->supply_phone= $request->input('supply_phone');
        $rowProduct->product_id= $request->input('product_id');
        $rowProduct->category= $request->input('category');
        $rowProduct->quantity= $request->input('quantity');
        $rowProduct->amount= $request->input('amount');
        $rowProduct->user_id= auth('admin')->user()->name;
        $rowProduct->update(); 
        return redirect()->route('rowProduct.index')->with('message','Row Material Product Updated Successfully');
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
        $rowProduct=Rowproduct::find($id);
        $rowProduct->delete();

        return redirect()->route('rowProduct.index')->with('message ,Row Material Product deleted Successfully');
    }

    public function out(){

        $rowProducts=Rowproduct::all();
        return view('storage/rowproduct.out',compact('rowProducts'));

    }

    public function preparation( $id)
    {
        //
        $rowProduct=Rowproduct::find($id);
        return view ('storage/rowproduct.preparation', ['rowProduct'=>$rowProduct]);

    }
}
