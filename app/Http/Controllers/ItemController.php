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

    public function store(Request $request)
    {
        $item = Item::create([
            'name' => $request->name,
            'itemType' => $request->itemType,
            'itemName' => $request->itemName,
            'price' => $request->price
        ]);

        return response()->json([
            'status' => (bool) $item,
            'data' => $item,
            'message' => $item ? 'Dah dibeli' : 'Error Buying Item'
        ]);
    }
}
