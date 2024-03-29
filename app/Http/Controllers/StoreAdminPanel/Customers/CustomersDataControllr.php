<?php

namespace App\Http\Controllers\StoreAdminPanel\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\Is_Store_Admin;

class CustomersDataControllr extends Controller
{
    public function __construct(Is_Store_Admin $middleware)
    {
        $this->middleware($middleware);
    }

    // .. Get All Customers Of Store ..
    public function showAllCustomers()
    {
        $user = auth()->user();

        // .. by this way coz any time user buy anything from this->store he be one of store clients ..
        $storeId = DB::table('store_user')
        ->where('user_id', $user->id)
        ->select(['store_id'])
        ->first();

        $storeUsers = DB::table('store_user')
        ->where('store_id', $storeId)
        ->where('user_role', 0)
        ->select('id')
        ->first();

        $storeCustomers = User::whereIn('id', $storeUsers)
        ->selectRow('id', 'f_name', 'email', 'phone', 'address')
        ->get();

        return response()->json([
            'customers' => $storeCustomers,
        ]);
    }
}
