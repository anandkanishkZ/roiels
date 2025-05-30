<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $base_route = 'backend.user';
    protected $view_path = 'backend.user';
    protected $image_path = 'images/user';
    protected $panel =  'User';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'List';
        $data['rows'] = User::all();
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
        $data['row'] = ['administrator' => 'Administrator', 'editor' => 'Editor'];
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
           'role' => 'required',
           'name' => 'required',
           'email' => 'required',
           'password' => 'required|confirmed'
        ]);
        $action = 'Store';
        $request->request->add(['role' => $request->input('role')]);
        $request->request->add(['created_by' => Auth::user()->id]);
        $request->request->add(['password' => bcrypt($request->input('password'))]);
        $data['row'] = User::create($request->all());
        if($data['row']){
            $request->session()->flash('success_message', $this->panel . ' Created Successfully');
        } else{
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
        $data['row'] = User::find($id);
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
        $data['row'] = User::find($id);
        $oldImage = $data['row']->image;
        if($data['row']->delete()){
            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function passwordForm(){
        $action = 'Change Password';
        return view($this->loadDataToView($this->view_path . '.passwordForm'), compact('action'));
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
           'password' => 'required|confirmed',
        ]);
        $id = Auth::user()->id;
        $data['row'] = User::find($id);
        $request->request->add(['password' => bcrypt($request->input('password'))]);
        if($data['row']->update($request->all())){
            $request->session()->flash('success_message', 'Password Updated Successfuly');
        } else {
            $request->session()->flash('error_message', 'Password Update Failed');
        }
        return redirect()->route($this->base_route . '.passwordForm');
    }
}
