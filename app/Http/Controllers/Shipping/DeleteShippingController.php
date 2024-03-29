<?php

namespace App\Http\Controllers\Shipping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCompany;
use App\Models\order;

class DeleteShippingController extends Controller
{

    public function destroy(ShippingCompany $shipping)
    {
       // Retrieve the shipping company and its associated orders
       $shippingCompany = ShippingCompany::find($shipping);
       $orders = Order::where('shipping_company_id', $shipping->id)->get();

       // Update the orders with a new random shipping company ID
       $newShippingCompany = ShippingCompany::where('id', '!=', $shipping->id)->inRandomOrder()->first();
       foreach ($orders as $order) {
           $order->shipping_company_id = $newShippingCompany->id;
           $order->save();
        }


      
        if ($shipping->photo !== null) {
            if ($shipping->photo instanceof \Illuminate\Support\Collection) {
                foreach ($shipping->photo as $photo) {
                    $filename = $photo->filename;
                    unlink('images/' . $filename);
                    $photo->delete();
                }
            } else {
                $filename = $shipping->photo->filename;
                unlink('images/' . $filename);
                $shipping->photo->delete();
            }
        }
    
        // Move the user deletion code inside the if block
        $shipping->delete();
    
      //return redirect()->route('Shipping.index')->withStatus(__('shipping combany successfully deleted.'));
        return response()->json(['message' => 'shipping combany successfully deleted.']);
    }




}
