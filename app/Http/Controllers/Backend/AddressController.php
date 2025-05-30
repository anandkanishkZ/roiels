<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    protected $base_route = 'backend.address';
    protected $view_path = 'backend.address';
    protected $image_path = 'images/address';
    protected $panel =  'Address';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = Address::all();
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
        return view($this->loadDataToView($this->view_path . '.create'), compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locations = $request->location;
        $titles = $request->title;
        $addresses = $request->address;
        $phones = $request->phone;
        $mobiles = $request->mobile;
        $emails = $request->email;
        $emails2 = $request->email2;
        foreach($locations as $alID => $location){
            $addressData['location'] = $locations[$alID];
            $addressData['title'] = $titles[$alID];
            $addressData['address'] = $addresses[$alID];
            $addressData['phone'] = $phones[$alID];
            $addressData['mobile'] = $mobiles[$alID];
            $addressData['email'] = $emails[$alID];
            $addressData['email2'] = $emails2[$alID];
            $data['row'] = Address::create($addressData);
        }
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
        $data['row'] = Address::find($id);
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
        $data['row'] = Address::find($id);
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
        $locations = $request->location;
        $titles = $request->title;
        $addresses = $request->address;
        $phones = $request->phone;
        $mobiles = $request->mobile;
        $emails = $request->email;
        $emails2 = $request->email2;
        foreach($locations as $alID => $location){
            $addressData = Address::find($alID);
            $addressData->location = $locations[$alID];
            $addressData->title = $titles[$alID];
            $addressData->address = $addresses[$alID];
            $addressData->phone = $phones[$alID];
            $addressData->mobile = $mobiles[$alID];
            $addressData->email = $emails[$alID];
            $addressData->email2 = $emails2[$alID];
        if($addressData->update()){
            $request->session()->flash('success_message', $this->panel . ' Updated Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not update');
        }
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
        $data['row'] = Address::find($id);
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
