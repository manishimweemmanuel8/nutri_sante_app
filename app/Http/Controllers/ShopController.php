<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cunsultation;
use App\Nutrition;
use App\product;
use App\Product_Request;
use App\Deliver;
use App\Product_store;
use App\ShopBuckup;

class ShopController extends Controller
{


     public function customerShop()
    {

        //
         $consultates = Cunsultation::
                    where('status','!=','shop')->get();
        return view('shop.customerProduct', compact('consultates'));
        
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product_store::where('shop',auth('admin')->user()->shop)->get();
        $backups=ShopBuckup::where('shop',auth('admin')->user()->shop)->get();
        $total=0;
        return view('shop.index', compact('products','backups','total'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create($id)
    {
       
       

         $products=Nutrition::where('cunsultation_id',$id)->get();
         $total=0;

         
        return view('shop.create',compact('products','total','id'));
        
       
    }

     public function requestProduct()
    {
       
         $products=product::all();
         $shopRequests=Product_Request::where('shop',auth('admin')->user()->shop)->get();
        return view('shop.requestProduct',compact('products','shopRequests'));
        
       
    }


    

     public function deleteRequest($id)
    {
        //
        $requestProduct = Product_Request::find($id);
        //delete
        $requestProduct->delete();
        return redirect()->route('shop.request');
    }


   

     public function approveProduct($id)
    {
        //

         $shopRequestQuantity=Product_Request::where('id',$id)->value('quantity');
         $stockQuantity=Product_store::where('product_id',Product_Request::where('id',$id)->value('product_id'))->value('quantity');
         
            $newQuantity= $stockQuantity+$shopRequestQuantity;


            $product=Product_store::where('product_id',Product_Request::where('id',$id)->value('product_id'))->value('product_id');
            if(!$product){

            $shopStock = new Product_store();
  
            $shopStock->product_id= Product_Request::where('id',$id)->value('product_id');
            $shopStock->quantity= $shopRequestQuantity;
            $shopStock->user_id= auth('admin')->user()->name;
            $shopStock->shop=Product_Request::where('id',$id)->value('shop');
            $shopStock->save(); 
        }else{

            Product_store::where('product_id',Product_Request::where('id',$id)->value('product_id'))
            ->update(['quantity' => $newQuantity]);

        }
             
             //update product request status

              Product_Request::where('id',$id)
            ->update(['status' => 'Received']);


           

            return redirect()->route('shop.request');

            // return redirect()->route('shopRequest.view',['shop'=>Product_Request::where('id',$id)->value('shop')])->with('info','nutrition Successfully');

      
            
        

       

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

        $shopRequest =new Product_Request();
        $shopRequest->product_id= $request->input('product_id');
        $shopRequest->quantity= $request->input('quantity');
        $shopRequest->shop_user= auth('admin')->user()->name;
        $shopRequest->shop= auth('admin')->user()->shop;
        $shopRequest->status= 'Pending';
        $shopRequest->save(); 

     

        return redirect()->route('shop.request')->with('info','consultation Updated Successfully');
    }

    public function payment(Request $request)
    {
        //
         $request->validate([
            'id'=>'required',
       
        ]);
         $id=$request->input('id');

     



        $shopQuantity=Nutrition::where('cunsultation_id',$id)->get();

        foreach ($shopQuantity as $shop) {
            # code...
            $quantity=Product_store::where('product_id',$shop->product_id)->value('quantity');
            if($quantity >= $shop->quantity ){
                $remain=$quantity-$shop->quantity;
                Product_store::where('product_id',$shop->product_id)
                ->update(['quantity' => $remain]);
            }
            else{
                echo 'product not in stock';
            }
             // $a=$shop->product_id;
             // echo $a;
        }

         

         //update paid
          Nutrition::where('cunsultation_id',$id)
            ->update(['status' => 'paid']);

            //add shop user
          Nutrition::where('cunsultation_id',$id)
            ->update(['shop_user' => auth('admin')->user()->name]);

             //add shop provide product
          Nutrition::where('cunsultation_id',$id)
            ->update(['shop' => auth('admin')->user()->shop]);



        

     

        return redirect()->route('shop.request')->with('message','consultation Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
