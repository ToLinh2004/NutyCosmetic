<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Admin\Odder_items;
use App\Models\Admin\Orders;
use App\Models\Admin\OrderItem;
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
    public function __construct()
    {
        $this->users = new Users;
        $this->products = new Products;
    }

    public function showCart(){
        $userId = Session::get('user_id');
        $carts = session()->get('cart_userId'.$userId, []);
        $quantities = products::whereIn('id', array_keys($carts))->pluck('quantity', 'id')->toArray();
        return view('Clients.checkout', compact('carts', 'quantities'));
    }

    public function checkoutSuccess(Request $request)
{
    $queryParams = $request->query();
    $data = [];

    if (!empty($queryParams)) {
        $user_id = session('user_id');

        $current = new DateTime();
        $currentFormatted = $current->format('Y-m-d');

        $data = [
            "user_id" => $user_id,
            "order_status_id" => 1,
            "date" => $currentFormatted,
            "total_price" => $queryParams['vnp_Amount'],
            "payment_method" => $queryParams['vnp_BankCode'],
            "vnp_TransactionNo" => $queryParams['vnp_TransactionNo']
        ];

        if (!empty($data)) {
            $orderModel = new Orders();
            $order = $orderModel->create([
                'user_id' => $data['user_id'],
                'order_status_id' => $data['order_status_id'],
                'date' => $data['date'],
                'total_price' => $data['total_price'],
                'payment_method' => $data['payment_method']
            ]);

            if ($order) {
                $productModel = session('cart');

                foreach ($productModel as $product) {
                    $quantityP = $product['quantity'];
                    $product_id = $product['product_id'];

                    $product = Products::find($product_id);
                    if ($product) {
                        $product->quantity -= $quantityP;
                        $product->save();
                    }
                }

                session()->forget('cart');

                foreach ($productModel as $product) {
                    Odder_items::create([
                        'order_id' => $order->id,
                        'product_id' => $product['product_id'],
                        'quantity' => $product['quantity'],
                        'unit_price' => $product['price'],
                        'product_image' => $product['image_url']
                    ]);
                }
            }

            return view('user-profile.thanks', compact('data'));
        }
    }
}

}

    