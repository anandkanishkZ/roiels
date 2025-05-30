<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    protected $base_route = 'backend.review';
    protected $view_path = 'backend.review';
    protected $image_path = 'images/review';
    protected $panel =  'Review';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = Review::all();
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
        $data['packages'] = Product::pluck('title','id');
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
            'name' => 'required',
            'email' => 'required',
            'review' => 'required'
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
        }
        $request->request->add(['created_by' => Auth::user()->id]);
        $data['row'] = Review::create($request->all());
        if($data['row']){
            Alert::success('Thank Your !', 'Your Review Has Been Successfully Submitted !');
            return back();
        } else {
            Alert::error('Error !', 'Sorry Review Can Not Submit !');
        }
        return back();


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
        $data['row'] = Review::find($id);
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
        $data['row'] = Review::find($id);
        $data['packages'] = Product::pluck('title','id');
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
        $data['row'] = Review::find($id);
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
        $data['row'] = Review::find($id);
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

    public function deActive(Request $request,$id){
        $review = Review::find($id);
        $review->status = 0;
        if($review->update()){
            $request->session()->flash('success_message', $this->panel . ' Deactivated Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not Update');
        }
        return redirect()->route($this->base_route . '.index');

    }
    public function active(Request $request,$id){
        $review = Review::find($id);
        $review->status = 1;
        if($review->update()){
            $request->session()->flash('success_message', $this->panel . ' Activated Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not Update');
        }
        return redirect()->route($this->base_route . '.index');

    }
}
