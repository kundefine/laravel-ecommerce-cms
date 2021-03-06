<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedInteger('cat_id');
            $table->string('product_title');
            $table->string('product_slug')->unique();
            $table->string('product_measurement_details');
            $table->text('product_short_discription')->nullable();
            $table->text('product_discription')->nullable();
            $table->double('product_price');
            $table->double('product_discount')->default(0);
            $table->double('product_price_after_discount');
            $table->text('product_thumbnail')->nullable();
            $table->text('product_images')->nullable();
            $table->boolean('product_stock')->nullable();
            $table->boolean('visibility');
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
