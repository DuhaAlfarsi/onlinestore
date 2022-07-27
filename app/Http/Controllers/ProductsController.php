<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Product;
        $record->name=$request->name;
        $record->price=$request->price;
        $record->category_id=$request->category_id;
        if($request->hasFile('image'))
    {
        $photo = $request->file('image');
        $path = 'uploads/products/'.time().'.'.$photo->extension();
        $photo->move(public_path('uploads/products/'), $path);
        $record->image_path = $path;
    }
    $record->save();
        return "recored added successfly";
    
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
        $data['products']= Product::findOrfail($id);
        return view('products.edit', $data);
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
            $record = Product::findOrfail($id);
            $record->name=$request->name;
            $record->price=$request->price;
            $record->category_id=$request->category_id;
            if($request->hasFile('image'))
        {
            $photo = $request->file('image');
            $path = 'uploads/products/'.time().'.'.$photo->extension();
            $photo->move(public_path('uploads/products/'), $path);
            $record->image_path = $path;
        }
        $record->save();
            return "recored update successfly";
        
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Product::findOrfail($id);
        $record->delete();
        return back();
    }
}
