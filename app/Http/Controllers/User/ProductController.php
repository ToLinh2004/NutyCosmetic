<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\User\Products;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller {
    //
    
    private $products;
    public function __construct() {
        $this->products = new Products();
    }

    public function home() {
        $banners = Banner::all();
        // dd($banners);
        $productPopular = $this->products->getProductPopular();

        return view('Clients.home', compact('banners','productPopular'));
    }

    public function getAllProduct() {
        $productAll = $this->products->getAllProducts();

        return view('Clients.product', compact('productAll'));
    }

    public function productDetail($id, $category_id) {
        $productDetail = $this->products->getProductDetail($id);
        $productAll = $this->products->getProductCategory($category_id);
        return view('Clients.product-detail', compact('productDetail', 'productAll'));
    }


    public function addToCart($id)
    {

        if (Session::has('user_id')) {
            $userId = Session::get('user_id');
            $product = $this->products->getAddToCart($id);

        if (!$product) {
            return response()->json([
                'code' => 404,
            ], 404);
        }

            if($product->status === "Inactive"){
                return response()->json([
                    'code' => 404,
                ], 404);
            }

            $cart = session()->get('cart_userId'.$userId, []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += 1;
            } else {
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name' => $product->product_name,
                    'image' => $product->image_url,
                    'quantity' => 1,
                    'price' => $product->price
                ];
            }
            session()->put('cart_userId'.$userId, $cart);

            return response()->json([
                'code' => 200,
            ], 200);
        }
    }

    public function showCart(){

        $userId = Session::get('user_id');
        $carts = session()->get('cart_userId'.$userId, []);
        return view('Clients.add-to-cart', compact('carts'));
    }
    public function deleteCart($id)
        {
            if (Session::has('user_id')) {
                $userId = Session::get('user_id');
                $cart = session()->get('cart_userId'.$userId, []);
                if (isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart_userId'.$userId, $cart);
                    return redirect()->route('user.show-cart');
                }
            }
    }
}
