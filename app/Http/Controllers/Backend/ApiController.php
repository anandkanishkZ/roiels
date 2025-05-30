<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryIndex()
    {
        $category = Category::orderBy('rank','asc')->get();
        return response()->json([
            'data' => $category,
            'error' => false,
            'code' => 200,
            'message' => 'Successfully retrieved all Categories'
        ]);
    }

    public function categoryShow(Request $request, $id){
        $category = Category::find($id);
        return response()->json([
            'data' => $category,
            'error' => false,
            'code' => 200,
            'message' => 'Successfully retrieved all Categories'
        ]);
    }

    public function productIndex()
    {
        $products = Product::where('status',1)->orderBy('rank','asc')->get();
        return response()->json([
            'data' => $products,
            'error' => false,
            'code' => 200,
            'message' => 'Successfully retrieved all Categories'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
