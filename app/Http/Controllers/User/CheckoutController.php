<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Users;
use App\Models\Admin\Products;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $users;
    private $products;
    public function __construct()
    {
        $this->users = new Users;
        $this->products = new Products;
    }

    public function show()
    {
        $userId = Session::get('user_id');
            $userDetail = $this->users->getDetail($userId);
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msgerror', 'The user does not exist');
            }
        return view('Clients.checkout', compact('usersDetail'));
    }


    public function showCart(){
        $userId = Session::get('user_id');
        $carts = session()->get('cart_userId'.$userId, []);
        $quantities = products::whereIn('id', array_keys($carts))->pluck('quantity', 'id')->toArray();
        return view('Clients.checkout', compact('carts', 'quantities'));
        }
    }
