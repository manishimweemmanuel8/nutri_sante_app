<?php

namespace App\Http\Controllers;

use App\Production_store;
use Illuminate\Http\Request;
use App\product;
use App\StockBuckup;
use App\Product_store;
use App\ShopBuckup;
use App\Deliver;

class ProductionStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productions=Production_store::all();

        return view('storage.index', compact('productions'));
    }

      public function stock()
    {
        //
        $productions=Production_store::all();
        //   $stocks = Production_store::get()->toArray();
        //    StockBuckup::truncate();
        // foreach ($stocks as $stock) 
        // {
        //     //$item['id'] = null; (optional)
        //     StockBuckup::insert($stock);
        // }

        
        //   $shops = Product_store::get()->toArray();
        //   ShopBuckup::truncate();
        // foreach ($shops as $shop) 
        // {
        //     //$item['id'] = null; (optional)
        //     ShopBuckup::insert($shop);
        // }
        $backups=StockBuckup::all();
        return view('storage.stock', compact('productions','backups'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=product::all();
        return view('storage.create',compact('products'));
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
        ]);


        $product=Production_store::where('product_id',$request->input('product_id'))->value('product_id');
        

        if(!$product){
        $production=new Production_store;
        $production->product_id= $request->input('product_id');
        // $production->category= $request->input('category');
        $production->quantity= $request->input('quantity');
        // $production->amount= $request->input('amount');
        $production->user_id= auth('admin')->user()->name;
        $production->save(); 
        return redirect()->route('storage.index')->with('message','production stored saved Successfully');

        }else{

            $existQuanitity=Production_store::where('product_id',$request->input('product_id'))->value('quantity');

            $newQuantity=$existQuanitity+$request->input('quantity');

            Production_store::where('product_id',$request->input('product_id'))
            ->update(['quantity' => $newQuantity]);
        }

        $newStock = new Deliver();
        $newStock->product_id= $request->input('product_id');
        $newStock->quantity= $request->input('quantity');
        $newStock->status= 'In';
        $newStock->storage_user= auth('admin')->user()->name;
        $newStock->shop= auth('admin')->user()->shop;
        $newStock->save(); 

            return redirect()->route('storage.index')->with('message','production stored saved Successfully');
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Production_store  $production_store
     * @return \Illuminate\Http\Response
     */
    public function show(Production_store $production_store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production_store  $production_store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $production = Production_store::find($id);
          $products=product::all();
        return view('storage.edit',['production'=> $production],compact('products'));
    }

     public function increase($id)
    {
        //
        $production = Production_store::find($id);
        return view('storage.increase',['production'=> $production]);
    }


      public function increaseQuantity(Request $request)
    {
        //
        $request->validate([
            'quantity'=>'required',
        ]);

       $quantity = Production_store::where('id',$request->input('id'))->value('quantity');
        $total=$quantity+$request->input('quantity');
        Production_store::where('id',$request->input('id'))
            ->update(['quantity' => $total]);

            $product_id = Production_store::where('id',$request->input('id'))->value('product_id');

        $newStock = new Deliver();
        $newStock->product_id= $product_id;
        $newStock->quantity= $request->input('quantity');
        $newStock->status= 'In';
        $newStock->storage_user= auth('admin')->user()->name;
        $newStock->shop= auth('admin')->user()->shop;
        $newStock->save(); 

       return redirect()->route('storage.index');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production_store  $production_store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production_store $production_store)
    {
        //
        $request->validate([
          'product_id'=>'required',
            'quantity'=>'required',
        ]);

        $production = Production_store::find($request->input('id'));
        $production->product_id= $request->input('product_id');
        $production->quantity= $request->input('quantity');
        $production->user_id= auth('admin')->user()->name;
        $production->update(); 
        return redirect()->route('storage.index')->with('message','production store updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production_store  $production_store
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
         $production = Production_store::find($id);
        //delete
        $production->delete();
        return redirect()->route('storage.index')->with('message','production store deleted Successfully');
    }
}
