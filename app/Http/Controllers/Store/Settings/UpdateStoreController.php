<?php

namespace App\Http\Controllers\Store\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStoreController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function sendStoreId(){
        $userId = auth()->user()->id;
        if ($userId->role == 3) {
            // .. select owner's store id ..
            $store = User::find($userId)->stores;
            $storeId = $store->id;

            // .. get the Owner's store ..
            $storeData = Store::where('id', $storeId)->get();

            // .. return store data to show in update form in front end side ..
            return response()->json([$storeData,]);
        }
        return response()->json([
            'message'=>'You dont have an store to update , Create your own to do !',
        ]);
    }

    public function update(Request $request)
    {
        // validate the request data and images
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'about_store' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
            'services' => 'required|string',
            'link_website' => 'required|url',
            'store_image' => 'required|image',
            'store_cover' => 'required|image'
        ]);
    
        // find the store by id
        $store = Store::find($request->id);
    
        // delete the old images from the storage
        Storage::disk('public')->delete('images/' . basename($store->store_image));
        Storage::disk('public')->delete('images/' . basename($store->store_cover));
    
        // update the store with the new data and images
        $store->update([
            'name' => $request->name,
            'email'=> $request->email,
            'about_store'=>$request->about_store,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'services'=>$request->services,
            'link_website'=>$request->link_website,
            'store_cover' => asset('storage/images/' . $request->file('store_cover')->hashName()),
            'store_image' => asset('storage/images/' . $request->file('store_image')->hashName())
        ]);
    
        // return a success message or redirect to another page
        return response()->json(['message' => 'Store updated successfully']);
    }

    // Override the failedValidation method
    protected function failedValidation(Validator $validator)
    {
        // Throw an exception with a custom response
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
