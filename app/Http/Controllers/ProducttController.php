<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Product;
class ProducttController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $products;
    public function __construct()
    {
    $this->products = new Product();
        
    }
    public function index()
    {
        //
        $productPopular=$this->products->getProductPopular();
        return view('home.home', compact('productPopular'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //$productAll = $this->products->getAllProducts();
        $product =$this->products->getProductDetail($id);
        $productDetail=$product[0];
        return view('home.product-detail',compact('productDetail','productAll'));
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
    
}
