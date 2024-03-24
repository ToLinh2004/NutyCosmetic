<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrderStatus;
class OrderController extends Controller
{
    private $orders;
    public function __construct()
    {
        $this->orders = new Orders;
    }
    
    public function index()
    {
        $ordersList = $this -> orders -> getAllOrder();
        $orderStatuses = OrderStatus::all();
        // dd($orderStatuses);
        return view('Admin.Orders.AdminOrder', ['ordersList' => $ordersList, 'orderStatuses' => $orderStatuses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Orders.AddOrder');
    }

    /**
     * Store a newly created resource in storage.
     */
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateStatus($order_id, $status)
{
    // Lấy đơn hàng cần cập nhật
    $order = $this->orders::find($order_id);

    // Kiểm tra xem đơn hàng có tồn tại không
    if (!$order) {
        return back()->with('error', 'Order not found');
    }

    // Cập nhật trạng thái của đơn hàng
    $order->status_name = $status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully');
}
}
