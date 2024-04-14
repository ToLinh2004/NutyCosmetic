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
        return view('Admin.Categories.Index', compact('categoriesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required|min:2'
            ],
            [
                'category_name' => 'Username is required.',
                'category_name' => 'Username must be at least :min characters.',
            ]);

            $dataInsert =[
                $request -> category_name,
            ];

            $this -> categories -> add($dataInsert);
            return redirect()->route('admin.category.index')->with('msg', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        if (!empty($id)) {
            $categoryDetail = $this->categories->getDetail($id);
            if (!empty($categoryDetail[0])) {
                $request->session()->put('id', $id);
                $categoryDetail = $categoryDetail[0];
            } else {
                return redirect()->route('admin.category.index')->with('msgerror', 'The category does not exist');
            }
        } else {
            return redirect()->route('admin.category.index')->with('msgerror', 'The category does not exist');
        }
        return view('Admin.categories.Edit', compact('categoryDetail'));
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
    public function update(Request $request)
    {
        //
        $id = session('id');
        if (empty($id)) {
            return back()->with('msgerror', 'Link is not valid');
        }
        $request->validate(
            [
                'category_name' => 'required|min:2'
            ],
            [
                'category_name.required' => 'category name is required.',
                'category_name.min' => 'category name must be at least :min characters.',
            ]);
            $dataUpdate = [
                $request->category_name
            ];
            $this->categories->updateCategory($dataUpdate, $id);
            return redirect()->route('admin.category.index')->with('msg', 'Updated category successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->categories::findOrFail($id);
        $category->status = 'inactive';
        
        $category->deletecategory($id); 
        
        return redirect()->route('admin.category.index')->with('msg', 'Deleted category successfully.');
    }

}
