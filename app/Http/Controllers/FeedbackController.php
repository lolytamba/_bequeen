<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return response()->json(Feedback::all(),200);
    }

    public function storeFeedback(Request $request)
    {
        $feedback =Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => (bool) $feedback,
            'data' => $feedback,
            'message' => $feedback ? 'Thanks for your feedback :)' : 'Error Feedback'
        ]);
       
    }
    public function show(Feedback $feedback)
    {
        return response()->json($feedback,200);
    }

    public function destroy(Feedback $feedback)
    {
        $status = $feedback->delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Feedback Deleted' : 'Error Deleting Feedback'
        ]);
    }
}
