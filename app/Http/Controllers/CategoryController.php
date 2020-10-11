<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lookups\CategoryCollection;
use App\Models\Lookups\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CategoryCollection
     */
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

   /* public  function test() {
        return 'Test Route';
    }*/

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
        $validator = Validator::make($request ->all(), [
           'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show(Category $category)
    {
        return $category;
    }
    /*public function show($id)
    {
        return Category::find($id);
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request ->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $category ->update($request->all());

        return $category;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //$category->delete();
        //$category->destroy();
        return $category->name.' category is successfully deleted';
    }
}
