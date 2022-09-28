<?php

namespace App\Http\Controllers;

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
        $users = User::paginate(6);
        return view('User.index', compact('users'));
        // return response()->json([
        //     'data' => $users
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('User.create', compact('users'));
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

        $users = User::create([
            'name' => request('name'),
            'phone_number' => request('phone_number'),
            'email'  => request('email'),
            'password' => bcrypt($request->password),
        ]);
        // return view('user.index', compact('users'));
        return redirect()->route('admin.users.index')->with("notification", 'Created Successfully');
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
        $users = User::find($id);
        return view(
            'User.edit',
            compact('users')
        );
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
        return redirect()->route('admin.users.index')->with("notification", 'Updated Successfully');
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
        return back()->with("notification", 'Deleted Successfully');
    }
}
