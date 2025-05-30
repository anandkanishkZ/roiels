<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    protected $base_route = 'backend.contact';
    protected $view_path = 'backend.contact';
    protected $image_path = 'images/contact';
    protected $panel =  'Booking Inquiry';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = Booking::all();
        return view($this->loadDataToView($this->view_path . '.index'), compact('action'), compact('action','data'));
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
    public function destroy(Request $request,$id)
    {
        $action = 'Delete';
        $data['row'] = Booking::find($id);
        if($data['row']->delete()){
            $request->session()->flash('success_message', 'Data Deleted Successfully');
        } else {
            $request->session()->flash('error_message', 'Sorry Data Can Not Delete');
        }
        return redirect()->route($this->base_route . '.index');
    }
}
