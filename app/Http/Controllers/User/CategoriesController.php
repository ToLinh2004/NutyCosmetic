<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Categories;
use App\Models\User\Products;

class CategoriesController extends Controller
{
    //
    private $categories;
    private $products;
    public function __construct()
    {
        $this->categories= new Categories();
        $this->products=new Products;
    }
    public function getCategoryDetail($id)
    {  
        $typeCategory=$this->categories->getCategoryDetail($id);
        $products =$this->products->getCategory($typeCategory);
        return view('Clients.categories', compact('typeCategory','products'));
    }
}
