<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Production_store;
use App\StockBuckup;

class StockBuckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocks = Production_store::get()->toArray();
           StockBuckup::truncate();
        foreach ($stocks as $stock) 
        {
            //$item['id'] = null; (optional)
            StockBuckup::insert($stock);
        }
        $stockBackups=StockBuckup::all();
        return view ('storage/backup.index',compact('stockBackups'));


    }

    public function dailyBackup(){

             
       
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
     * @param  \App\StockBuckup  $stockBuckup
     * @return \Illuminate\Http\Response
     */
    public function show(StockBuckup $stockBuckup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockBuckup  $stockBuckup
     * @return \Illuminate\Http\Response
     */
    public function edit(StockBuckup $stockBuckup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockBuckup  $stockBuckup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockBuckup $stockBuckup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockBuckup  $stockBuckup
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockBuckup $stockBuckup)
    {
        //
    }
}
