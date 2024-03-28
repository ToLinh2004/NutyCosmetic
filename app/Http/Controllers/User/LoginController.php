<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Users;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class LoginController extends Controller
{
    private $users;
    public function __construct()
    {
        $this ->users =new Users();
    }

    public function showLogin(){
        return view('FE/pages/auth/login');
    }
    public function loginUser(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Users::where('email', $email)->first();
        $userPass = Users::where('password', $password)->first();
        if (!$user){
            return redirect()->back()->with('error', 'Email invalid');
        }
        if ($userPass){
            Session::put('user_id', $user->id);
            Session::put('email', $user->email);
            Session::put('role', $user->role);
            if($user->role == 'admin') return redirect()->route('admin.Homepage')->with('msg', 'Login successful');
            return redirect()->route('home');
        }
        else return redirect() ->back()->with('error', 'Password incorrect');
    }
    public function create()
    {
        return view('FE/pages/auth/register');
    }
    public function store(Request $request)
    {
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
        $imageName = time() . '.' . $request->image->extension();
        $dataInsert = [
            $request->user_name,
            $request->email,
            $request->phone,
            $request->password,
            $request->address,
            $request->image->move('images', $imageName)
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('loginUser')->with('msg', 'Register successfully.');
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
    public function destroy(Request $request)
    {
        Session::forget('user_id');
        Session::forget('email');
        return redirect()->route('user.home');
    }
}
