<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->nullable();
            $table->boolean('is_enabled')->nullable();
            $table->integer('out_of_stock_days')->nullable();
            $table->integer('attribute_id')->nullable();
            $table->integer('warranty')->nullable();
            $table->double('regular_price')->nullable();
            $table->double('promotional_price')->nullable();
            $table->double('discount')->nullable();
            $table->double('quantity')->nullable();
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
        Schema::dropIfExists('products');
    }
}
