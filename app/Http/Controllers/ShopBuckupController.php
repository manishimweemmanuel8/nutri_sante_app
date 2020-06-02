<?php
namespace App\Http\Controllers;
use App\ShopBuckup;
use Illuminate\Http\Request;
use App\Product_store;

class ShopBuckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocks = Product_store::get()->toArray();
           ShopBuckup::truncate();
        foreach ($stocks as $stock) 
        {
            //$item['id'] = null; (optional)
            ShopBuckup::insert($stock);
        }
        $shopBackups=ShopBuckup::all();
        return view ('shop/backup.index',compact('shopBackups'));
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
     * @param  \App\ShopBuckup  $shopBuckup
     * @return \Illuminate\Http\Response
     */
    public function show(ShopBuckup $shopBuckup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopBuckup  $shopBuckup
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopBuckup $shopBuckup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopBuckup  $shopBuckup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopBuckup $shopBuckup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopBuckup  $shopBuckup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopBuckup $shopBuckup)
    {
        //
    }
}
