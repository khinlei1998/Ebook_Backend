<?php

namespace App\Http\Controllers;

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
        $subcategories = SubCategory::paginate(6);
        return view('subcategory.index', compact('subcategories',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        $categories = Category::all();
        return view('subcategory.create', compact('subcategories', 'categories'));
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

        $subcategories = SubCategory::create([
            'sub_category_name' => request('sub_category_name'),
            'category_id' => request('category_id'),

        ]);
        // return view('user.index', compact('users'));
        return redirect()->route('admin.subcategory.index')->with("notification", 'Created Successfully');
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
        $subcategories = SubCategory::find($id);
        $categories = Category::all();
        return view(
            'subcategory.edit',
            compact('subcategories', 'categories')
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
            'sub_category_name' => 'required',
            'category_id' => 'required'

        ]);

        $subcategories = SubCategory::find($id);
        $subcategories->sub_category_name = request('sub_category_name');
        $subcategories->category_id = request('category_id');

        $subcategories->save();
        return redirect()->route('admin.subcategory.index')->with("notification", 'Updated Successfully');;
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
        return back()->with("notification", 'Deleted Successfully');
    }
}
