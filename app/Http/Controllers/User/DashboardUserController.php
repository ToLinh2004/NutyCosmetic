    <?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Users;
use App\Traits\FileUploadTrait;

class DashboardUserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    use FileUploadTrait;

    public function index() {
        $userId = session('user_id');
        $email = session('email');
        $role = session('role');
        $phone = session('phone');
        $user_name = session('user_name');
        $image = session('image');
        $address = session('address');
        return view('FE.pages.dashboard.profile', compact('userId', 'email', 'role', 'phone', 'user_name', 'image', 'address'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'user_name' => ['max:100'],
            'email' => ['email'],
            'phone' => ['max:200'],
            'address' => ['max:200']
        ]);

        $user = Users::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'images', $user->imgae);
        $user->image = isset($imagePath) ? $imagePath : $user->image;
        $user->image = $imagePath;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        Session::put('email', $user->email);
        Session::put('user_name', $user->user_name);
        Session::put('phone', $user->phone);
        Session::put('address', $user->address);
        Session::put('image', $user->image);

        return redirect()->back()->with('success', 'Cập nhật thông tin người dùng thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    public function destroy_session() {

        Session::flush();
        return redirect()->route('login');
    }
}
