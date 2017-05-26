<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayProducts()
    {

        return view('welcome');
    }

    public function index()
    {
        return view('home');
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
        $productName = $request->product_title;
        $productPrice = $request->product_price;
        $productImage = $request->product_image;

        $cart = [];
        $top = "cart.$productName";
        $cart = ['name' => $productName, 'image'=> $productImage, 'price' => $productPrice, 'quantity' => 1];

        if (\Session::has($top)){
            \Session::pull($top);
            $cart['quantity'] = $cart['quantity'] + 1;
            \Session::put($top, $cart);
        }else {
            \Session::put($top, $cart);
        }

        return redirect()->back();
        
    
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
    public function destroy()
    {
        \Session::forget('cart');
        return redirect()->back();
    }
}
