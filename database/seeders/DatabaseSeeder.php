<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Comments;
use App\Models\Order;
use App\Models\Photo;
use App\Models\ShippingCompany;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $Categories = \App\Models\Category::factory(40)->create();
       $users = \App\Models\User::factory(50)->create();
       

    
    
       $stores = \App\Models\Store::factory(7)->create();
       \App\Models\Product::factory(200)->create();
       \App\Models\Comments::factory(150)->create();
<<<<<<< HEAD
        \App\Models\ShippingCompany::factory(4)->create();
       $orders = \App\Models\Order::factory(200)->create();
       $requests = \App\Models\Request::factory(200)->create();
=======
        $shippings = \App\Models\ShippingCompany::factory(4)->create();
       $orders = \App\Models\order::factory(200)->create();
>>>>>>> 55282ad00d13836b15b65b69b3b81f07e05b1031
       
     
    
    
    
     
   
    
       
    \App\Models\Photo::factory(50)->create();
    $carts = \App\Models\Cart::factory(50)->create();     
    foreach ($carts as $cart) {
        $product_ids = [];
        $product_ids[] = Product::all()->random()->id;
        $product_ids[] = Product::all()->random()->id;
        $product_ids[] = Product::all()->random()->id;
    $cart->Products()->sync($product_ids);
    
    }     


    foreach ($stores as $store) {
        $user_ids = [];
        $user_ids[] = User::all()->random()->id;
        $user_ids[] = User::all()->random()->id;
        $user_ids[] = User::all()->random()->id;
    $store->Admins()->sync($user_ids);
    }

    

    foreach ($shippings as $shipping) {
        $stores = Store::inRandomOrder()->limit(3)->get();
        
        foreach ($stores as $store) {
            $price = 10.99; // Set the desired price for the pivot table

            $shipping->stores()->attach($store, [
                'debt' => $price,
            ]);
        }
    }






    }}
