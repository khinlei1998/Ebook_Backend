<?php

namespace App\Http\Controllers\MobileAPIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return response()->json([
            'data' => $subcategories,
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
            'sub_category_name' => 'required',
            'category_id' => 'required',

        ]);

        $subcategory = SubCategory::create([
            'sub_category_name' => request('sub_category_name'),
            'category_id' => request('category_id'),

        ]);
        return response()->json([
            'data' => $subcategory,
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
        $sub_category = SubCategory::findOrFail($id);

        return response()->json([
            'data' => $sub_category,
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
            'sub_category_name' => 'required',
            'category_id' => 'required'

        ]);

        $subcategories = SubCategory::find($id);
        $subcategories->sub_category_name = request('sub_category_name');
        $subcategories->category_id = request('category_id');

        $subcategories->save();
        return response()->json([
            'data' => $subcategories,
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
        $subcategories = SubCategory::find($id);
        $subcategories->delete();
        return response()->json([
            'status' => 'success',
            'data' => 'Successfully deleted authors!'
        ]);
    }
}
