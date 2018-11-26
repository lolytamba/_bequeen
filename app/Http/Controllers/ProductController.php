<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::all(),200);
    }

    public function store(Request $request, $id)
    {
        $product = Product::create([
            'type' => $request->type,
            'paket' => $request->paket,
            'bookDate' => $request->bookDate,
            'arrivalDate' => $request->arrivalDate
        ]);

        $user = User::find($id);
        $user->product()->attach($product);


        return response()->json([
            'status' => (bool) $product,
            'data' => $product,
            'message' => $product ? 'Booked' : 'Error Booking'
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $product = $user->product;
        return response()->json($product,200);
    }

    public function showbyID($id)
    {
        $product = Product::find($id);
        return response()->json($product,200);
    }

    public function update(Request $request, $id)
    {   
        $product = Product::find($id);

        if(!is_null($request->arrivalDate)){
            $product->arrivalDate = $request->arrivalDate;
        }

        if(!is_null($request->bookDate)){
            $product->bookDate = $request->bookDate;
        }

        $success = $product->save();
        if(!$success){
            return response()->json('Error Updating',500);
        }else   
            return response()->json('Success',200);

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $status = $product->delete();
        
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Deleted' : 'Error Deleting Product'
        ]);
    }

   
}
