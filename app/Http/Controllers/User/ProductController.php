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
        $productSaleOff=$this->products->getAllProductSaleOff();
        // dd($productSaleOff);
        return view('Clients.home', compact('banners','productPopular','productSaleOff'));
    }

    public function getAllProduct() {
        $productAll = $this->products->getAllProducts();
        $banners = Banner::all();

        return view('Clients.product', compact('banners','productAll'));
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
            $discountedProduct = $product->price;
            if ($product->status_discount === "discount") {
                $discountedProduct = $product->price * (1 - 0.3);
            }
            $cart = session()->get('cart_userId'.$userId, []);

            if (isset($cart[$id])) {
                return response()->json([
                    'code' => 409,

                ], 409);
            } else {
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name' => $product->product_name,
                    'image' => $product->image_url,
                    'quantity' => 1,
                    'price' => $discountedProduct
                ];
            }
            session()->put('cart_userId'.$userId, $cart);

            return response()->json([
                'code' => 200,
            ], 200);
        }
        else{
            return response()->json([
                'code' => 400,
            ], 400);
        }
    }

    public function showCart(){

        $userId = Session::get('user_id');
        $carts = session()->get('cart_userId'.$userId, []);
        $quantities = products::whereIn('id', array_keys($carts))->pluck('quantity', 'id')->toArray();
        return view('Clients.add-to-cart', compact('carts', 'quantities'));
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