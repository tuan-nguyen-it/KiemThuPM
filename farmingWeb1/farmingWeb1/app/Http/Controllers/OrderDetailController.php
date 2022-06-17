<?php

namespace App\Http\Controllers;

use App\Models\OrdersDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrdersDetail::orderBy('order_id','DESC')->search()->paginate(1);
        return view('admin.order_detail.index', compact('data'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdersDetail  $ordersDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrdersDetail $ordersDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdersDetail  $ordersDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdersDetail $ordersDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdersDetail  $ordersDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdersDetail $ordersDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdersDetail  $ordersDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($ordersDetail, $product_id)
    {
        OrdersDetail::where('order_id', $ordersDetail)->where('product_id', $product_id)->delete();
        return redirect()->intended('order_detail')->with('success', 'Xóa thành công sản phẩm có mã '.$product_id.' vào hóa đơn '.$ordersDetail.' !');
    }
}
