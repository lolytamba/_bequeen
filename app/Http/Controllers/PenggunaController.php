<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Schema::all();
        return $pengguna;
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
        $pengguna = new Pengguna;
        $pengguna->firstName = $request->firstName;
        $pengguna->lastName = $request->lastName;
        $pengguna->phone = $request->phone;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->jenis = $request->jenis;
        $success = $pengguna->save();

        if($success){
            return respone()->json('Error Saving',500);
        }else{
            return respone()->json('Success',201);
        }
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
        $this->validateWith([
            'firstName'=> 'required|max:255',
            'lastName' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->firstName = $request->firstName;
        $pengguna->lastName = $request->lastName;
        $pengguna->phone = $request->phone;
        $draft->save();

        return response()->json(['status'=>'200','draft'=>$draft]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        if($pengguna->count() >0){
            $pengguna->delete();
            return response()->json(['status' => '200','msg'=> 'Berhasil Dihapus']);
        }else{
            return response()->json(['status' => '200','msg' => 'Gagal Menghapus']);
        }
    }
}

