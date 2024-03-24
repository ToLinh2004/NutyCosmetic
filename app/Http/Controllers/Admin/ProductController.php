<?php
namespace App\Http\Controllers\Admin;
use App\Models\Admin\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $products;
    private $categories;
    public function __construct()
    {
        $this->products = new Products;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productList = $this->products->getAllProduct();
        return view('Admin.Products.Index', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Products.Add');
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
}
