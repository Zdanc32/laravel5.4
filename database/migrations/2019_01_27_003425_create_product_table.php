<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('products', function (Blueprint $table)
        {
           $table->increments('product_dwid');
           $table->string('product_name');
           $table->string('product_description')->nullable();
           $table->timestamps(); // create two columns 'create_at', 'update_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('products');
    }
}
