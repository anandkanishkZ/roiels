<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Configuration;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    protected $base_route = 'backend.configuration';
    protected $view_path = 'backend.configuration';
    protected $image_path = 'images/configuration';
    protected $panel =  'Site Configuration';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=1)
    {
        $action = 'List';
        $data['row'] = Configuration::find($id);
        return view($this->loadDataToView($this->view_path . '.index'), compact('action','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $data['row'] = [];
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
        $data['row'] = Configuration::find($id);
        $oldImage = $data['row']->logo;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['logo' => $imageName]);
            if($oldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->logo))) {
                    unlink(public_path($this->image_path . '/' . $oldImage));
                }
            }
        }
        $vehicleOldImage = $data['row']->vehicle;
        if($request->hasFile('vehicle_pdf')){
            $file = $request->file('vehicle_pdf');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->image_path . '/'), $imageName);
            $request->request->add(['vehicle' => $imageName]);
            if($vehicleOldImage) {
                if (file_exists(public_path($this->image_path . '/' . $data['row']->vehicle))) {
                    unlink(public_path($this->image_path . '/' . $vehicleOldImage));
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
        $data['row'] = About::find($id);
        $oldImage = $data['row']->image;
        if($data['row']->delete()){
            if(file_exists(public_path($this->image_path . '/' . $data['row']->image))){
                unlink(public_path($this->image_path . '/' . $oldImage));
            }
            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        return redirect()->route($this->base_route . '.index');
    }
}
