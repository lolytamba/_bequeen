<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return response()->json(Job::all(),200);
    }

    public function store(Request $request)
    {
        $job = Job::create([
            'name' => $request->name,
            'position' => $request->position,
            'age' => $request->age,
            'phone' => $request->phone,
            'experience' => $request->experience
        ]);

      //  $user = User::find($id);

        return response()->json([
            'status' => (bool) $job,
            'data' => $job,
            'message' => $job ? 'Dah daftar' : 'Error Daftar'
        ]);
    }

    public function update(Request $request, $id)
    {   
        $job = Job::find($id);

        if(!is_null($request->age)){
            $job->age = $request->age;
        }if(!is_null($request->experience)){
            $job->experience = $request->experience;
        }

        $success = $job->save();
        if(!$success){
            return response()->json('Error Update',500);
        }else   
            return response()->json('Success',200);

    }

    public function showbyID($id)
    {
        $job = Job::find($id);
        return response()->json($job,200);
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $status = $job->delete();
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Deleted' : 'Error Delete'
        ]);
    }
}
