<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductLine;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductLineController extends Controller
{
    protected $base_route = 'backend.productline';
    protected $view_path = 'backend.productline';
    protected $image_path = 'images/productline';
    protected $panel = 'ProductLine';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = ProductLine::all();
        return view($this->loadDataToView($this->view_path . '.index'), compact('action','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'Create';
        $data['categories'] = Category::pluck('title','id');
        $data['subcategories'] = [];
        return view($this->loadDataToView($this->view_path . '.create'), compact('action','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'slug' => 'string | required | unique:product_lines',
            'rank' => 'required | integer',
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $fileName);
            $request->request->add(['image' => $fileName]);
        }
        $request->request->add(['created_by' => Auth::user()->id]);
        $data['row'] = ProductLine::create($request->all());
        if($data['row']){
            $request->session()->flash('success_message', $this->panel . ' Created Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not create');
        }
        return redirect()->route($this->base_route . '.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = 'Show';
        $data['row'] = ProductLine::find($id);
        return view($this->loadDataToView($this->view_path . '.show'), compact('action','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'Edit';
        $data['row'] = ProductLine::find($id);
        $data['categories'] = Category::pluck('title','id');
        $data['subcategories'] = Subcategory::pluck('title','id');
        return view($this->loadDataToView($this->view_path . '.edit'), compact('action','data'));
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
         $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'slug' => 'string | required',
            'rank' => 'required | integer',
            'photo' => 'required | mimes:jpeg,png,jpg,gif | max:1024'
        ]);
        $data['row'] = ProductLine::find($id);
        $oldImage = $data['row']->image;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
            if($oldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image))) {
                    unlink(public_path($this->image_path . '/' . $oldImage));
                }
            }
        }
        $request->request->add(['updated_by' => Auth::user()->id]);
        if($data['row']->update($request->all())){
            $request->session()->flash('success_message', $this->panel . ' Updated Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not update');
        }
        return redirect()->route($this->base_route . '.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data['row'] = ProductLine::find($id);
        $oldImage = $data['row']->image;
        if($data['row']->delete()){
            if($oldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->image))) {
                    unlink(public_path($this->image_path . '/' . $oldImage));
                }
            }
            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function getSubcategoryByCategoryID(Request $request){
     $category_id = $request->id;
     $categories = Category::find($category_id);
     $options = '<option>Select Subcategory</option>';
     foreach($categories->subcategories as $subcategory){
         $options .= "<option value='$subcategory->id'>$subcategory->title</option>";
     }
     return $options;
    }
}
