<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_store;
use App\Nutrition;

class SaleController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        
        $products=Product_store::all();
        $customer_id=str_random(15);
        $nutritions=Nutrition::where('customer_id',$id)->get();
        return view('shop/sales.sale',compact('products','id','nutritions'));
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
            'id'=>'required',
             'customer_phone'=>'required',
            'customer_name'=>'required',
            
        ]);


        //chack if product quantity is there
    

        $nutrition = new Nutrition();

        $nutrition->product_id= $request->input('product_id');
        $nutrition->shop_user= auth('admin')->user()->name;
        $nutrition->quantity= $request->input('quantity');
        $nutrition->customer_id= $request->input('id');
        $nutrition->customer_name= $request->input('customer_name');
        $nutrition->customer_phone= $request->input('customer_phone');
        $nutrition->shop= auth('admin')->user()->shop;

        $nutrition->save(); 

        $nutritions=Nutrition::where('customer_id',$request->input('id'));

        return redirect()->route('sale.sales',['id'=>$request->input('id')])->with('message','nutrition Successfully');
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
        // $consultation_id=Nutrition::where('id',$id)->value('cunsultation_id');
         $customer_id=Nutrition::where('id',$id)->value('customer_id');

        $nutrition = Nutrition::find($id);
        //delete
        $nutrition->delete();
        return redirect()->route('sale.sales',['id'=>$customer_id])->with('message','delete Successfully');
    }

    public function receipt($id){

         $products=Nutrition::where('customer_id',$id)->get();
         $total=0;

         
        return view('shop/sales/receipt',compact('products','total','id'));
    }



    public function payment(Request $request)
    {
        //
         $request->validate([
            'id'=>'required',
       
        ]);
         $id=$request->input('id');

     



        $shopQuantity=Nutrition::where('customer_id',$id)->get();

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
          Nutrition::where('customer_id',$id)
            ->update(['status' => 'paid']);

 

        return redirect()->route('shop.index')->with('message','payment saccussful Successfully');
    }

    public function other(request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required',
            'comment'=>'required',
            
        ]);

       //chack if product quantity is there

        

        $nutrition = new Nutrition();
        $nutrition->product_id= $request->input('product_id');
        $nutrition->shop_user= auth('admin')->user()->name;
        $nutrition->quantity= $request->input('quantity');
        $nutrition->customer_id= $request->input('id');
        $nutrition->comment= $request->input('comment');
        $nutrition->status= "other";
        $nutrition->shop= auth('admin')->user()->shop; 
        $nutrition->save(); 

         $existQuanitity=Product_store::where('product_id',$request->input('product_id'))->value('quantity');

            $newQuantity=$existQuanitity-$request->input('quantity');

            Product_store::where('product_id',$request->input('product_id'))
            ->update(['quantity' => $newQuantity]);

            
        return redirect()->route('other.index')->with('message','production Updated Successfully');
    }

    public function viewOther()
    {
        $others=Nutrition::where('status','other')->get();
        return view('shop/sales.other',compact('others'));

    }

     public function destroyOther($id)
    {
        //
        // $consultation_id=Nutrition::where('id',$id)->value('cunsultation_id');
        


         $customer_id=Nutrition::where('id',$id)->value('customer_id');

        $nutrition = Nutrition::find($id);
        //delete
        $nutrition->delete();

        $product_id=Nutrition::where('id',$id)->value("product_id");

        $existQuanitity=Product_store::where('product_id',$product_id)->value('quantity');
        $deleteQuantity=Nutrition::where('id',$id)->value('quantity');
        $newQuantity=$existQuanitity+$deleteQuantity;
        
        Product_store::where('product_id',$product_id)
            ->update(['quantity' => $newQuantity]);


        return redirect()->route('sale.sales',['id'=>$customer_id])->with('message','delete Successfully');
    }

    public function viewSales()
    {
        $sales=Nutrition::where('status','paid')->get();
        return view('shop/report.sale',compact('sales'));

    }

}
