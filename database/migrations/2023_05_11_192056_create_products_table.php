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
            $table->string('type')->nullable();
            $table->string('identifier')->nullable();
            $table->string('plu')->nullable();
            $table->double('weight')->nullable();
            $table->string('units')->nullable();
            $table->double('height')->nullable();
            $table->double('lenght')->nullable();
            $table->double('width')->nullable();
            $table->string('size_units')->nullable();
            $table->boolean('is_enabled')->nullable();
            $table->string('product_type')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('out_of_stock_days')->nullable();
            $table->integer('unbalanced_days')->nullable();
            $table->string('comment')->nullable();
            $table->string('color_identifier')->nullable();
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
