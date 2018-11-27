<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::all(),200);
    }

    public function store(Request $request, $id)
    {
        $item = Item::create([
            'name' => $request->name,
            'itemType' => $request->itemType,
            'itemName' => $request->itemName,
            'price' => $request->price,
            'color' => $request->color,
            'user_id' => $id
        ]);

        $user = User::find($id);

        return response()->json([
            'status' => (bool) $item,
            'data' => $item,
            'message' => $item ? 'Dah dibeli' : 'Error Buying Item'
        ]);
    }

    public function update(Request $request, $id)
    {   
        $item = Item::find($id);

        if(!is_null($request->color)){
            $item->color = $request->color;
        }

        $success = $item->save();
        if(!$success){
            return response()->json('Error Update Item',500);
        }else   
            return response()->json('Success',200);

    }

    public function show($id)
    {
        $user = User::find($id);
        $item = $user->item;
        return response()->json($item,200);
    }

    public function showbyID($id)
    {
        $user = User::find($id);
        $item = Item::find($id);
        return response()->json($item,200);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $status = $item->delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Item Deleted' : 'Error Deleting Item'
        ]);
    }
}
