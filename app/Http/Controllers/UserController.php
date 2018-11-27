<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        return response()->json(User::all(),200);
    }

    public function login(Request $request)
    {
        $status = 401;
        $response = ['error','Unautorised'];

        if(Auth::attempt($request->only(['email','password']))){
            $status=200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('beQueen')->accessToken,
            ];
            Auth::login(Auth::user());
        }
        return response()->json($response, $status);
}

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'phone' => 'required|max:12',
            'email' => 'required|email',
            'password' =>'required|min:8',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()){
            return response()->json(['error' => $validator->errors(),401]);
        }

        $data = $request->only(['name', 'email', 'phone','password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('beQueen')->accessToken,
        ]);
    }


    public function show(User $user)
    {
        return response()->json($user);
    }
    
    public function showbyID($id)
    {
        $user = User::find($id);
        return response()->json($user,200);
    }

    public function update(Request $request, $id)
    {   
        $user = User::find($id);
        if(!is_null($request->name)){
            $user->name = $request->name;
        }

        if(!is_null($request->phone)){
            $user->phone = $request->phone;
        }

        $success = $user->save();
        if(!$success){
            return response()->json('Error Updating Profile',500);
        }else   
            return response()->json('Success',200);

    }

    public function destroy($id)
    {
        //
    }
}
