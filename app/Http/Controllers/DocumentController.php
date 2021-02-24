<?php

namespace App\Http\Controllers;

use App\document;
use Illuminate\Http\Request;
use Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $documents=document::all();
        return view('document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $documents=document::all();
       
        return view('document/create',compact('documents'));
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
            'file'=>'required', 
            'description'=>'required'
        ]);
        // return 10;
        // return  $file=$request->file('file');

        $document=new document();

        if($request->file('file')){
            // return 1;
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('documents/',$filename);
            $document->file=$filename;

        }
        $document->description= $request->input('description');
        $document->doctor = Auth::guard('admin')->user()->id;
        $document->save();
        return redirect()->route('document.create')->with('message','document saved Successfully');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $document=document::find($id);
        return view('document.edit',['document'=> $document,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $request->validate([
            'file'=>'required',
            'description'=>'required'
        ]);
        // return 1;


        $document = document::find($request->input('id'));

        // return $request->file;

        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('documents/',$filename);
            // return $filename;
            $document->file=$filename;

        }
        $document->description= $request->input('description');
        $document->doctor = Auth::guard('admin')->user()->id;
        $document->save();


        return redirect()->route('document.index')->with('info','Document Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $document=document::find($id);
        $document->delete();
        return redirect()->route('document.create')->with('info','Document deleted Successfully');
    }

    public function download($file){
        // return "hello";
        return response()->download('documents/'.$file);
    }
}
