<?php

namespace App\Http\Controllers;

use App\Product_store;
use Illuminate\Http\Request;
use App\Deliver;
use App\Production_Store;

class ProductStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $damages=Deliver::where('status','null')->get();
        return view('storage/damage.index',compact('damages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $stocks=Production_Store::all();
        return view('storage/damage.create',compact('stocks'));
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
            'product_id'=>'required',
            'quantity'=>'required',
            'comment'=>'required',
            
        ]);

       

        $damage = new Deliver();
        $damage->product_id= $request->input('product_id');
        $damage->quantity= $request->input('quantity');
        $damage->comment= $request->input('comment');
        $damage->status= 'null';
        $damage->storage_user= auth('admin')->user()->name;
        // $damage->shop= auth('admin')->user()->shop;
        $damage->save(); 

         $existQuanitity=Production_store::where('after_production_id',$request->input('product_id'))->value('quantity');

            $newQuantity=$existQuanitity-$request->input('quantity');

            Production_store::where('after_production_id',$request->input('product_id'))
            ->update(['quantity' => $newQuantity]);

            
        return redirect()->route('damage.index')->with('message','Product shop Saved Successfully');

       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_store  $product_store
     * @return \Illuminate\Http\Response
     */
    public function show(Product_store $product_store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_store  $product_store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $damage = Deliver::find($id);
        $stocks=Production_Store::all();
        return view('storage/damage.edit',['damage'=> $damage],compact('stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_store  $product_store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_store $product_store)
    {
        //
        $request->validate([
          'product_id'=>'required',
            'quantity'=>'required',
            'comment'=>'required',
        ]);

        $damage = Deliver::find($request->input('id'));
        $damage->product_id= $request->input('product_id');
        $damage->quantity= $request->input('quantity');
        $damage->comment= $request->input('comment');
        $damage->status= 'null';
        $damage->storage_user= auth('admin')->user()->name;
        $damage->shop= auth('admin')->user()->shop;
        $damage->update(); 
        return redirect()->route('damage.index')->with('message','product shop Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_store  $product_store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          $damage = Deliver::find($id);
        //delete
        $damage->delete();
        return redirect()->route('damage.index')->with('message','product store deleted Successfully');
    }
}
