<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\User;

class FeedbackController extends Controller
{
    public function index()
    {
        return response()->json(Feedback::all(),200);
    }

    public function storeFeedback(Request $request, $id)
    {
        $feedback =Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'message' => $request->message,
            'user_id' => $id
        ]);

        $user = User::find($id);

        return response()->json([
            'status' => (bool) $feedback,
            'data' => $feedback,
            'message' => $feedback ? 'Thanks for your feedback :)' : 'Error Feedback'
        ]);
       
    }

    public function update(Request $request, $id)
    {   
        $feedback = Feedback::find($id);

        if(!is_null($request->message)){
            $feedback->message = $request->message;
        }

        $success = $feedback->save();
        if(!$success){
            return response()->json('Error Update Feedback',500);
        }else   
            return response()->json('Success',200);
    }

    public function show($id)
    {
        $user = User::find($id);
        $product = $user->product;
        return response()->json($product,200);
    }

    public function showbyID($id)
    {
        $user = User::find($id);
        $feedback = Feedback::find($id);
        return response()->json($feedback,200);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $status = $feedback->delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Feedback Deleted' : 'Error Deleting Feedback'
        ]);
    }
}
