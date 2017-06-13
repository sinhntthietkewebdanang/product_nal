<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$data = \App\Product::all();
       return view('product.index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HangHoaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add_or_update');
    }

    public function store(Request $request)
    {
    	
      $product = new Product;
      $product->name = $request->name;
      $product->category = $request->category;
      $product->code = $request->product_code;
      if(isset($request->status))
      	$product->status = $request->status;
  	  else
  	  	$product->status = 0;
      $product->quantity_on_hand = $request->qoh;

      $product->note = $request->note;
      $product->price = $request->price;
      $product->unit = $request->Unit;
      $product->save();
      return view('product.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$data=\App\Product::find($id);
        return view('product.add_or_update',compact('data'));
    }

    public function search(Request $request){
    	if($request->category=='all')
    		$data= \App\Product::where('name',trim($request->name))->get();
    	else
    		$data= \App\Product::where('name',trim($request->name))->where('category',$request->category)->get();
    	return view('product.index',compact('data'));
    }

    public function update(Request $request,$id)
    {

    	$data=\App\Product::find($id);

		$data->name = $request->name;
      	$data->category = $request->category;
      	$data->code = $request->product_code;
      	if(isset($request->status))
      		$data->status = $request->status;
  	  	else
  	  	$data->status = 0;
      	$data->quantity_on_hand = $request->qoh;

      	$data->note = $request->note;
      	$data->price = $request->price;
      	$data->unit = $request->Unit;

		$data->save();
		return view('product.add_or_update',compact('data'));
    }


}
