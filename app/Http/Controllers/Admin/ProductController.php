<?php
namespace App\Http\Controllers\Admin;

use App\Models\Admin\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $products;
    private $categories;
    public function __construct()
    {
        $this->products = new Products;
    }
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
        $categories = DB::table('categories')->get();
        return view('Admin.Products.AddProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_name' => 'required|min:5',
                'price' => 'required|numeric|min:1',
                'image' => 'required|mimes:jpg,jpeg,png',
                'quantity' => 'required|numeric|min:1',
                'description' =>'required'
            ],
            [
                'product_name.required' => 'Productname is required.',
                'product_name.min' => 'Productname must be at least :min characters.',
                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a number.',
                'price.min' => 'The price must be at least 1.',
                'image.required' => 'Please choose an image file.',
                'image.mimes' => 'The image file must be in jpg, jpeg, or png format.',
                'quantity.required' => 'The quantity field is required.',
                'quantity.numeric' => 'The quantity must be a number.',
                'quantity.min' => 'The quantity must be at least 1.',
                'description.required' => 'Description is required.'
            ]
        );
        $imageName = time() . '.' . $request->image->extension();
        $dataInsert = [
            $request->product_name,
            $request->description,
            $request->price,
            $request->image_name,
            $request->image->move('images', $imageName),
            $request->quantity,
            $request->category
        ];
        $this->products->addProduct($dataInsert);
        return redirect()->route('admin.product.index')->with('msg', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        if (!empty($id)) {
            $productDetail = $this->products->getProductDetail($id);
            if (!empty($productDetail[0])) {
                $request->session()->put('id', $id);
                $productDetail = $productDetail[0];
            } else {
                return redirect()->route('admin.product.index')->with('msgerror', 'The user does not exist');
            }
        } else {
            return redirect()->route('admin.product.index')->with('msgerror', 'The user does not exist');
        }
        $categories = DB::table('categories')->get();
        return view('Admin.Products.EditProduct', compact('productDetail', 'categories'));
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
        $id = session('id');
        if (empty($id)) {
            return back()->with('msgerror', 'Link is not valid');
        }
        $request->validate(
            [
                'product_name' => 'required|min:5',
                'price' => 'required|numeric|min:1',
                'image' => 'required|mimes:jpg,jpeg,png',
                'quantity' => 'required|numeric|min:1',
                'description' =>'required'
            ],
            [
                'product_name.required' => 'Productname is required.',
                'product_name.min' => 'Productname must be at least :min characters.',
                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a number.',
                'price.min' => 'The price must be at least 1.',
                'image.required' => 'Please choose an image file.',
                'image.mimes' => 'The image file must be in jpg, jpeg, or png format.',
                'quantity.required' => 'The quantity field is required.',
                'quantity.numeric' => 'The quantity must be a number.',
                'quantity.min' => 'The quantity must be at least 1.',
                'description.required' => 'Description is required.'
            ]
        );
        $imageName = time() . '.' . $request->image->extension();
        $dataUpdate = [
            $request->product_name,
            $request->description,
            $request->price,
            $request->image_name,
            $request->image->move('images', $imageName),
            $request->quantity,
            $request->category,
            $request->status
        ];
        $this->products->updateProduct($dataUpdate, $id);
        return redirect()->route('admin.product.index')->with('msg', 'Product created successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->products::findOrFail($id);
        $product->status = 'inactive';
        $product->deleteProduct($id); 
        
        return redirect()->route('admin.product.index')->with('msg', 'Deleted product successfully.');
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
        $productDetail = Products::find($id);
        $productAll = $this->products->getProductCategory($category_id);
        return view('Clients.product-detail', compact('productDetail', 'productAll'));
    }
}
