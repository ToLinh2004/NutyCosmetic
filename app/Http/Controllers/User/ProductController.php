<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Products;
class ProductController extends Controller
{
    //
    private $products;
    public function __construct()
    {
        $this->products = new Products();
    }

    public function home()
    {
        $productPopular = $this->products->getProductPopular();

        return view('Clients.home', compact('productPopular'));
    }

    public function getAllProduct()
    {
        $productAll = $this->products->getAllProducts();
        return view('Clients.product', compact('productAll'));
    }

    public function productDetail($id, $category_id)
    {
        $productDetail = $this->products->getProductDetail($id);
        $productAll = $this->products->getProductCategory($category_id);
        return view('Clients.product-detail', compact('productDetail', 'productAll'));
    }
    public function addToCart($id)
    {
        // session()->flush('cart');
        $product = $this->products->getAddToCart($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->product_name,
                'image' => $product->image_url,
                'quantity' => 1,
                'price' => $product->price
            ];
        }
        session()->put('cart', $cart);
        return  response()->json(
            [
                'code'=>200,
                'message'=>' success',
            ], status: 200);
    }
    public function showCart(){

        $carts=session()->get('cart');
        return view('Clients.add-to-cart',compact('carts'));
    }
}
