<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [ 
        'name',  
        'email',
        'id',
        'location',
        'services', 
        'phone',
        'link_website',  
        'about_store',
       // 'store_cover',
      //  'store_image',
       
        'deleted_by', 
    ];

    public function admins() : BelongsToMany
    {
        return $this->belongsToMany(User::class , 'store_user');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
    

    public function Products() {
        return $this->hasMany(Product::class);
    }

    public function requests() {
        return $this->hasMany(_Request::class);
    }



    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($store) {
            $store->deleted_by = auth()->user()->id; 
            $store->save();
        });
    }

    public function ShippingCompanies() : BelongsToMany
    {
        return $this->belongsToMany(ShippingCompany::class , 'shipping_company_store')->withPivot('debt');
    }


}
