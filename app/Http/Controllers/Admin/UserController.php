<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users;
    }
    public function index()
    {
        $userList = $this->users->getAllUser();
        return view('Admin.User.AdminUser', compact('userList'));
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        
    }
    public function show(Request $request, string $id)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msgerror', 'The user does not exist');
            }
        } else {
            return redirect()->route('users.index')->with('msgerror', 'The user does not exist');
        }
        return view('Admin.User.EditUser', compact('userDetail'));
    }
    public function update(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msgerror', 'Link is not valid');
        }
        $request->validate(
            [
                'user_name' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                'phone' => 'digits:10',
                'address' => 'string',
                'image' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'user_name.required' => 'Username is required.',
                'user_name.min' => 'Username must be at least :min characters.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be a valid email address.',
                'email.unique' => 'Email has already been taken.',
                'password.required' => 'Password is required.',
                'password.string' => 'Password must be a string.',
                'password.min' => 'Password must be at least :min characters.',
                'password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
                'phone.digits' => 'Phone must be exactly :digits digits.',
                'address.string' => 'Address must be a string.',
                'image.required' => 'Please choose an image file.',
                'image.mimes' => 'The image file must be in jpg, jpeg, or png format.',
            ]
        );
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('images', $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $oldUser = $this->users::find($id);
            $imagePath = $oldUser->image;
        }
        $dataUpdate = [
            $request->user_name,
            $request->email,
            $request->phone,
            $request->password,
            $request->address,
            $request->status,
            $imagePath
        ];
        $this->users->updateUser($dataUpdate, $id);
        return redirect()->route('admin.user.index')->with('msg', 'Updated user successfully.');
    }
    public function destroy(string $id)
    {
        $user = $this->users::findOrFail($id);
        $user->status = 'inactive';
        
        $user->deleteUser($id); 
        
        return redirect()->route('admin.user.index')->with('msg', 'Deleted user successfully.');
    }
}