<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('photoable', function (Blueprint $table) {
            $table->id();
            $table->string('filename')->nullable();   
            $table->integer('photoable_id');
            $table->string('photoable_type'); 
            $table->tinyInteger('ordering')->nullable();
            /*
                store = 1 store image || 2 store cover
                product =  main product image 
            */ 
            $table->timestamps(); 
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('photos');
    }
};
