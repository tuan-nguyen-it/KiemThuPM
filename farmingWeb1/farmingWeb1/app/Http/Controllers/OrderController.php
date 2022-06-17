<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orders::orderBy('created_at','DESC')->search()->paginate(15);
        return view('admin.order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        return view('orders.create_index', compact('cat'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {
        $newOrder = new Orders();
        $newOrder->name = $request->email;
        $newOrder->email = $request->name;
        $newOrder->phone = $request->phone;
        $newOrder->address = $request->address;
        $newOrder->note = $request->note;
        $newOrder->status = 0;
        $newOrder->user_id = $user;
        $newOrder->save();
        $dataProducts = session('shop_cartsss');
        foreach ($dataProducts as $key => $value) {
            if (is_numeric($key)) {
                $dataCheck = Product::where('id', $value['id'])->first();
                if($dataCheck->soluong < $value['quantity']){
                    Orders::where('id', $newOrder->id)->delete();
                    return redirect()->intended('order_shop')->with('error', 'So luong san pham ' .$dataCheck->name.' trong kho la '. $dataCheck->soluong/*quantity */ .', khong du de dat hang');
                } else {
                    $newOrderDetail = new OrdersDetail();
                    $newOrderDetail->order_id = $newOrder->id;
                    $newOrderDetail->product_id = $value['id'];
                    $newOrderDetail->quantity = $value['quantity'];
                    $newOrderDetail->price = $value['price'] - ($value['price'] * $value['sale']);
                    $newOrderDetail->save();
                    $dataCheck->soluong -= $value['quantity'];
                    $dataCheck->update();
                }               
            }
        }
        return redirect()->intended('/')->with('success', 'Đặt hàng thành công, mã đơn hàng của bạn là '. $newOrder->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
