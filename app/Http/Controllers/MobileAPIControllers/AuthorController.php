<?php

namespace App\Http\Controllers\MobileAPIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'status' => 'success',
            'data' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Author.create');
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
            'name' => 'required|min:2',
            'image' => 'required',

        ]);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/author_image', $name);

            $image = '/author_image/' . $name;
        }
        Author::create([
            'name' => request('name'),
            'image' => $image,
        ]);
        return response()->json([
            'status' => 'success',
            'data' => 'Successfully created authors!'
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
        $author = Author::find($id);
        return view('Author.edit', compact('author'));
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
            'name' => 'required|min:2',

        ]);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/author_image', $name);

            $image = '/author_image/' . $name;
        } else {
            $image = request('oldimg');
        }
        $author = Author::find($id);
        $author->name = request('name');
        $author->image = $image;
        $author->save();
        return response()->json([
            'status' => 'success',
            'data' => 'Successfully updated authors!'
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
        Author::find($id)->delete();
        return response()->json([
            'status' => 'success',
            'data' => 'Successfully deleted authors!'
        ]);
    }
}
