<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Admin\Odder_items;
use App\Models\Admin\Orders;
use App\Models\Admin\Order_items;
use App\Models\Admin\OrderStatus;

use Illuminate\Http\Request;
use App\Models\Admin\Users;
use App\Models\Admin\Products;
use App\Models\Users as ModelsUsers;
use Illuminate\Support\Facades\Session;
use DateTime;



class CheckoutController extends Controller
{
    private $users;
    private $products;
    private $order;
    private $orderItem;
    public function __construct()
    {
        $this->users = new Users;
        $this->products = new Products;
        $this->order = new Orders;
        $this -> orderItem = new Order_items;
    }

    public function showCart(){
        $userId = Session::get('user_id');
        $carts = session()->get('cart_userId'.$userId, []);
        $quantities = products::whereIn('id', array_keys($carts))->pluck('quantity', 'id')->toArray();
        return view('Clients.checkout', compact('carts', 'quantities'));
    }

    public function updateCart(Request $request, $id){
    if (Session::has('user_id')) {
        $userId = Session::get('user_id');
        $cart = session()->get('cart_userId'.$userId, []);
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            // Kiểm tra số lượng mới có hợp lệ không (tối thiểu là 1)
            if ($quantity < 1) {
                return redirect()->back()->with('error', 'Quantity must be at least 1.');
            }

            // Lấy số lượng tối đa của sản phẩm từ cơ sở dữ liệu hoặc một nguồn khác
            $maxQuantity = 10; // Ví dụ: Số lượng tối đa là 10
            if ($quantity > $maxQuantity) {
                return redirect()->back()->with('error', 'Quantity exceeds maximum limit.');
            }

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart_userId'.$userId, $cart);

            return redirect()->route('user.show-cart');
        }
    }

    return redirect()->route('user.show-cart')->with('error', 'Unable to update cart.');
}

    public function checkout(){
        $userId = Session::get('user_id');
        $carts = session()->get('cart_userId'.$userId, []);
        return view('Clients.checkout', compact('carts'));
    }

    public function checkoutSuccess(Request $request){
        // Lấy thông tin đơn hàng từ request
       // Lấy thông tin giỏ hàng từ session
       $userId = Session::get('user_id');
       $carts = session()->get('cart_userId'.$userId, []);
   
       // Tính tổng giá trị của giỏ hàng
       $totalAll = 0;
       foreach ($carts as $cartItem) {
           $totalAll += $cartItem['price'] * $cartItem['quantity'];
       }
   
       // Tạo đơn hàng mới
       $order = new Orders();
        $order->user_id = $userId;
        $order->order_status_id = OrderStatus::where('status_name', 'Pending')->first()->id;
        $order->date = now();
        $order->total_price = $totalAll;
        $order->payment_method = 'Tiền mặt';
        $order->save();
   
       // Lưu các mục đơn hàng
       foreach ($carts as $cartItem) {
            $orderItem = new Order_items();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem['product_id'];
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->unit_price = $cartItem['price'];
            $orderItem->image_url = $cartItem['image'];
            $orderItem->save();
    }
   
       // Xóa giỏ hàng của người dùng sau khi đặt hàng
       session()->forget('cart_userId'.$userId);
   
       // Chuyển hướng người dùng đến trang thông báo đặt hàng thành công hoặc trang cần thiết khác
       return redirect()->route('success')->with('success', 'Đơn hàng của bạn đã được đặt thành công.');
    }   
}

    