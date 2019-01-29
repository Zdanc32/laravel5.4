<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('prices', function (Blueprint $table)
        {
            $table->increments('dwid');
            $table->unsignedInteger('product_dwfk');
            $table->decimal('price');
            $table->foreign('product_dwfk')->references('product_dwid')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('prices');
    }
}
