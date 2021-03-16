<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('category_id');
            $table->foreignId('company_id')->constrained();
            $table->integer('order');
            $table->boolean('length');
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
        Schema::dropIfExists('base_products');
    }
}
