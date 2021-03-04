<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained();
            $table->string('product_id')->nullable();
            $table->integer('order');
            $table->integer('price');
            $table->boolean('percent');
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
        Schema::dropIfExists('final_products');
    }
}
