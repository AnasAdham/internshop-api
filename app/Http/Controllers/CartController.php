<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("whatjJA");
        $request->validate([
            'item_id' => 'required',
            'item_name' => 'required',
            'item_quantity' => 'required',
            'item_price' => 'required',
            'user_id' => 'required',
        ]);

       $cart = Cart::create($request->all());

        return Response::json([
            'message' => 'Successfully created',
            'cart' => $cart
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        // $cart = Cart::find($user);
        $cart = Cart::where('user_id', $user)->get();
        return Response::json([
            'cart' => $cart
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'item_quantity' => 'required',
            'user_id' => 'required',
        ]);
        $cart = Cart::find($id);
        $cart->update($request->all());

        return Response::json([
            'message' => 'Update successful'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Cart::destroy($id)){
            return Response::json([
                "message" => "Failed to remove item from cart"
            ]);
        };

        return Response::json([
            "message" => "Item successfully removed from cart"
        ]);
    }

}
