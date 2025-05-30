<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $base_route = 'backend.order';
    protected $view_path = 'backend.order';
    protected $image_path = 'images/order';
    protected $panel = 'Order';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $action = 'Order';
        $data['status'] = Status::all();
        $data['orders'] = Order::all();
        return view($this->loadDataToView($this->view_path . '.index'),compact('action','data'));
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
        $action = 'Show';
        $data['row'] = Order::find($id);
        return view($this->loadDataToView($this->view_path . '.show'), compact('action','data'));
    }
    
    public function detail($id){
        $action = 'Order Detail';
        $data['order'] = Order::find($id);
        $data['orders'] = OrderDetail::where('order_id', $id)->get();
        
        return view($this->loadDataToView($this->view_path . '.detail'), compact('action','data'));
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
        $data['row'] = Order::find($id);
        if($data['row']->delete()){
            $orderDetails = OrderDetail::where('order_id', $id)->get();
           foreach($orderDetails as $orderDetail){
                $orderDetail->delete();
           }
                
            
            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        return redirect()->route($this->base_route . '.index');
    }
    
    public function status($id){
        $data['row'] = Order::find($id);
        $data['rows'] = Status::all();
        return view($this->loadDataToView($this->view_path . '.status'), compact('action','data'));
        
    }
    
    public function statusUpdate(Request $request,$id){
        $order = Order::find($id);
        $order->order_status = $request->status;
        if($order->update()){
          
            $request->session()->flash('success_message', $this->panel . ' Deleted Successfully');
        } else {
            $request->session()->flash('error_message', $this->panel . ' Can not delete');
        }
        return back();
        
    }

    public function orderStatusUpdateOrderId(Request $request){
        $orderId = $request->orderId;
        $statusValue = $request->statusValue;
        $orderDetail = OrderDetail::where('order_id', $orderId)->get()[0];
        $orderDetail->status = $statusValue;
        if($orderDetail->update()){
            return 'Status updated Successfully !';
        } else{
            return 'Sorry Data Can Not Update ';
        }
    }
}
