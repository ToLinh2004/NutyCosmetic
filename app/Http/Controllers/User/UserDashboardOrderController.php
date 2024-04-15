<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Users;
use App\Models\Admin\Orders;
use App\Models\Admin\Odder_items;

use Illuminate\Support\Facades\Session;

class UserDashboardOrderController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $userId = session('user_id');

        $user_orders = Orders::where('user_id', $userId)->get();

        $user_orders_items = [];

        foreach ($user_orders as $order) {
            $order_items = Odder_items::where('order_id', $order->id)->get();
            $user_orders_items[$order->id] = $order_items;
        }

        return view('FE.pages.dashboard.profile_order', compact('user_orders', 'user_orders_items'));
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
