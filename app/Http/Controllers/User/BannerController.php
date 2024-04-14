<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $banners;
    public function __construct()
    {
        $this->banners = new Banner;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = $this->banners->getAllBanner();
        return view('Admin.Banners.index', compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Banners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'banner_name' => 'required|min:5',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'banner_name.required' => 'Banner name is required.',
                'banner_name.min' => 'Banner name must be at least :min characters.',
                'image.required' => 'Please choose an image file.',
                'image.mimes' => 'The image file must be in jpg, jpeg, or png format.',
                
            ]
        );
        $imageName = time() . '.' . $request->image->extension();
        $dataInsert = [
            'name' => $request->banner_name,
            'image' => $request->image->move('images', $imageName),
        ];
        $this->banners->addBanner($dataInsert);
        return redirect()->route('admin.banners.index')->with('msg', 'Banner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        {
            if (!empty($id)) {
                $bannerDetail = $this->banners->getBannerDetail($id);
                if (!empty($bannerDetail[0])) {
                    $request->session()->put('id', $id);
                    $bannerDetail = $bannerDetail[0];
                } else {
                    return redirect()->route('admin.banners.index')->with('msgerror', 'The banners does not exist');
                }
            } else {
                return redirect()->route('admin.banners.index')->with('msgerror', 'The banners does not exist');
            }
            return view('Admin.Banners.edit', compact('bannerDetail'));
        }
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
                'banner_name' => 'required|min:5',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'banner_name.required' => 'Banner name is required.',
                'banner_name.min' => 'Banner name must be at least :min characters.',
                'image.required' => 'Please choose an image file.',
                'image.mimes' => 'The image file must be in jpg, jpeg, or png format.',
                
            ]
        );
        $imageName = time() . '.' . $request->image->extension();
        $dataUpdate = [
            'name' => $request->banner_name,
            'image' => $request->image->move('images', $imageName),
            'status' => $request->status
        ];
        $this->banners->updateBanner($dataUpdate, $id);
        return redirect()->route('admin.banners.index')->with('msg', 'Banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->banners::findOrFail($id);
        $product->status = 'inactive';
        $product->deleteBanner($id); 
        
        return redirect()->route('admin.banners.index')->with('msg', 'Deleted banner successfully.');
    }
}
