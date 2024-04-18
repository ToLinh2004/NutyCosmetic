<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class wishlistController extends Controller {
    public function index() {
        $blogWishlists = Wishlist::with('products')->get();
        return view('Clients.wishlist-product', compact('blogWishlists'));
    }

    public function wishlistAdd(Request $request) {
        $user_id = session('user_id');

        if ($user_id) {
            $request->validate([
                'product_id' => ['required'],
            ]);

            $product_id = $request->product_id;

            $existingWishlistItem = Wishlist::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->first();

            if ($existingWishlistItem) {
                toastr()->warning('Sản phẩm đã tồn tại trong danh sách yêu thích của bạn!');
                return redirect()->back();
            }

            $wishlist = new Wishlist();
            $wishlist->product_id = $request->product_id;
            $wishlist->user_id = $user_id;
            $wishlist->save();

            toastr()->success('Sản phẩm đã được thêm vào danh sách yêu thích!');

            return redirect()->back();
        } else {
            toastr()->error('Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích!');
            return redirect()->route('login');
        }
    }

    public function destroy(string $id) {
        $wishlistProduct = Wishlist::find($id);

        if (!$wishlistProduct) {
            return redirect()->back();
        }

        if ($wishlistProduct->user_id !== session('user_id')) {
            return redirect()->back();
        }

        $wishlistProduct->delete();

        toastr()->success('Xóa bài viết yêu thích thành công!');

        return redirect()->back();
    }
}
