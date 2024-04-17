<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Product;

class ProductController extends Controller
{
    //
    private $products;
    public function __construct()
    {
        $this->products = new Product();
    }
    
    public function index()
    {
        $productPopular=$this->products->getProductPopular();
        return view('home.index', compact('productPopular'));
    }

    public function getAllProduct(){
        $productAll = $this->products->getAllProducts();
        return view('home.product', compact('productAll'));
    }

    public function productFace(){
        $productAll = $this->products->getAllProducts();
        return view('home.product-face', compact('productAll'));
    }
    public function productHair(){
        $productAll = $this->products->getAllProducts();
        return view('home.product-hair', compact('productAll'));
    }
}
