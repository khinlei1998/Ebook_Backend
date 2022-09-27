<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();

        return response()->json([
            'data' => $books,
            'status' => 'success'
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
            'name' =>  'required',
            'category' =>  'required',
            'sub_category' =>  'required',
            'author' =>  'required',
            'downloaded_count' =>  'required',
            'total_pages' =>  'required',
            'total_mb' =>  'required',
            'image' =>  'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $img = $request->file('image');
        $file_name = uniqid() .''. $img->getClientOriginalName(); 
        $img->move(public_path('images/book'), $file_name);
        
        $book = Book::create([
            'name' => $request->name,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'author' => $request->author,
            'downloaded_count' => $request->downloaded_count,
            'total_pages' => $request->total_pages,
            'total_mb' => $request->total_mb,
            'image' => $file_name,
        ]);

        return response()->json([
            'data' => $book,
            'status' => 'success'
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
        $book = Book::findOrFail($id);

        return response()->json([
            'data' => $book,
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
        return 'hello';
        $book = Book::findOrFail($id);

        $request->validate([
            'name' =>  'required',
            'category' =>  'required',
            'sub_category' =>  'required',
            'author' =>  'required',
            'downloaded_count' =>  'required',
            'total_pages' =>  'required',
            'total_mb' =>  'required',
            'image' =>  'required',
        ]);

        if($request->hasFile('image')){
            $img = $request->file('image');
            $file_name = uniqid() .''. $img->getClientOriginalName(); 
            $img->move(public_path('images/book'), $file_name);
        }else{
            $file_name = $book->image;
        }

        $image_path = public_path().'/images/book/'.$book->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $book->update([
            'name' => $request->name,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'author' => $request->author,
            'downloaded_count' => $request->downloaded_count,
            'total_pages' => $request->total_pages,
            'total_mb' => $request->total_mb,
            'image' => $file_name,
        ]);

        return response()->json([
            'data' => $book,
            'status' => 'success'
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
        $book = Book::findOrFail($id);
        $image_path = public_path().'/images/book/'.$book->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $book->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
