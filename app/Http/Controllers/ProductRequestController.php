<?php

namespace App\Http\Controllers;

use App\Product_Request;
use Illuminate\Http\Request;
use App\Production_store;
use auth;
use App\Deliver;

class ProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

     public function shopRequest()
    {
        //
        $shopRequests=Product_Request::whereIn('status',['Pending','Approved'])->distinct()->get(['shop','shop_user']);
        return view('storage.shopRequest',compact('shopRequests'));

    }

     public function viewProduct($shop)
    {
        //
        $shopRequests=Product_Request::where('shop',$shop)->get();
        return view('storage.shopProduct',compact('shopRequests'));

    }

    public function approveProduct($id){

         //update product request status

              Product_Request::where('id',$id)
            ->update(['status' => 'Approved']);
             return redirect()->route('shopRequest.view',['shop'=>Product_Request::where('id',$id)->value('shop')])->with('message','nutrition Successfully');

    }

      public function deliverProduct($id)
    {
        //

         $shopRequestQuantity=Product_Request::where('id',$id)->value('quantity');
         $stockQuantity=Production_store::where('after_production_id',Product_Request::where('id',$id)->value('product_id'))->value('quantity');

         //check if product exist is great than the requested product
         if($stockQuantity >= $shopRequestQuantity){
             $remainQuantity= $stockQuantity-$shopRequestQuantity;

              
              //update product request status

              Product_Request::where('id',$id)
            ->update(['status' => 'Deliver']);
             
            

            //update product request production man who work on it 


             Product_Request::where('id',$id)
            ->update(['storage_user' => auth('admin')->user()->name]);

            //update stock on production_Stock

            Production_store::where('after_production_id',Product_Request::where('id',$id)->value('product_id'))
            ->update(['quantity' => $remainQuantity]);


            //store deliver product

            $deliver = new Deliver(); 
  
            $deliver->product_id= Product_Request::where('id',$id)->value('product_id');
            $deliver->quantity= $shopRequestQuantity;
            $deliver->storage_user= auth('admin')->user()->name;
            $deliver->status='deliver';
            $deliver->shop=Product_Request::where('id',$id)->value('shop');
            $deliver->save(); 

            return redirect()->route('shopRequest.view',['shop'=>Product_Request::where('id',$id)->value('shop')])->with('message','stock deliver Successfully');

            
            
         }else{

            return redirect()->route('shopRequest.view',['shop'=>Product_Request::where('id',$id)->value('shop')])->with('message','no quantity in stock you must increase stock first');
            // return $message= 'no quantity in stock you must increase stock first';

             
          
         }

        // return view('storage.shopProduct',compact('shopRequests'));

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_Request  $product_Request
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Request $product_Request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_Request  $product_Request
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Request $product_Request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_Request  $product_Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_Request $product_Request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_Request  $product_Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Request $product_Request)
    {
        //
    }
}
