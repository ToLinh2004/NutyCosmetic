<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrderStatus;

class OrderController extends Controller
{
    private $orders;
    private $order_status;
    public function __construct()
    {
        $this->orders = new Orders;
        $this->order_status = new OrderStatus;
    }
    public function index()
    {
        $ordersList = $this->orders->getAllOrder();
        $orderStatus = $this->order_status->getAll();
        // dd($ordersList);
        return view('Admin.Orders.AdminOrder', ['ordersList' => $ordersList,'orderStatus'=>$orderStatus]);
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $value = $request->order_status;
        $updateStatus = $this->orders->updateStatus($id, $value);
        return redirect() -> route('admin.order.index');
    }
    public function destroy(string $id)
    {
    }
}
