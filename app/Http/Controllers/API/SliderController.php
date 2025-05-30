<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\User;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $this->apiCheckAuthorization($request->api_token);
        if($user){
            return Slider::all();
        } else{
            return ['message' => 'Invalid Api Token'];
        }

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
        $user = $this->apiCheckAuthorization($request->api_token);
        if($user){
            $request->request->add(['created_by' =>$user[0]->id]);
            $slider = Slider::create($request->all());
            if($slider){
                return $slider;
            } else{
                return ['message' => 'Slider Can Not Create'];
            }
        } else{
            return ['message' => 'Invalid Api Token'];
        }
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
return $id;
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

    function apiCheckAuthorization($token){
        if(User::where("api_token", $token)->count() == 0){
            return false;
        }
        return User::where('api_token', $token)->get();
    }
}
