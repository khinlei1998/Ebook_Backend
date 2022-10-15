<?php

namespace App\Http\Controllers\MobileAPIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
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

        $request->validate([
            'name' => 'required',
            'phone_number'  => 'required',
            'email' => 'required|unique:users|email',
            'password'  => 'required |min:8|'

        ]);

        $user = User::create([
            'name' => request('name'),
            'phone_number' => request('phone_number'),
            'email'  => request('email'),
            'password' => bcrypt($request->password),
        ]);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'data' => $user,
            'status' => 'success'
        ]);
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
        $request->validate([
            'name' => 'required',
            'phone_number'  => 'required',
            'email' => 'required|email',


        ]);
        $user = User::find($id);
        $user->name = request('name');

        $user->phone_number = request('phone_number');

        $user->email = request('email');

        $user->save();
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => 'success',
            'data' => 'Successfully deleted users!'
        ]);
    }
}
