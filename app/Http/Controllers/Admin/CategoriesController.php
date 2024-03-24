<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Products;

class CategoriesController extends Controller
{
    private $categories;
    private $products;
    public function __construct()
    {
        $this->categories= new Categories;
        $this->products=new Products;
    }
    public function index()
    {
        $categoriesList = $this->categories->getAllCategories();
        return view('Admin.Categories.AdminCategories', compact('categoriesList'));
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


    public function getCategoryDetail($id)
    {  
        $typeCategory=$this->categories->getCategoryDetail($id);
        $products =$this->products->getCategory($typeCategory);
        return view('Clients.categories', compact('typeCategory','products'));
    }
}
