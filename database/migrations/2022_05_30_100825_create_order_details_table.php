<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            // relasi ke orders
            $table->string('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            
            // relasi ke products
            $table->foreignId('product_id')->constrained();

            $table->double('price');
            $table->integer('qty');
            $table->double('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
