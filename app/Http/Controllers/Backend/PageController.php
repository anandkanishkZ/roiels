<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    protected $base_route = 'backend.page';
    protected $view_path = 'backend.page';
    protected $image_path = 'images/page';
    protected $panel =  'Page';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = Page::all();
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
        $data['types'] = ['company' => 'Company ', 'account' => 'My Account', 'customer_service' => 'Customer Service','other' => 'Other'];
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
            'title' => 'required',
            'rank' => 'required'
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['image' => $imageName]);
        }
        $request->request->add(['created_by' => Auth::user()->id]);
        $data['row'] = Page::create($request->all());
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
        $data['row'] = Page::find($id);
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
        $data['row'] = Page::find($id);
        $data['types'] = ['company' => 'Company ', 'account' => 'My Account', 'customer_service' => 'Customer Service','other' => 'Other'];
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
        $data['row'] = Page::find($id);
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
        $data['row'] = Page::find($id);
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
}
