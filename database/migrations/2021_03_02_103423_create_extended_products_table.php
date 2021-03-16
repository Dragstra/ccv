<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extended_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->foreignId('links_id')->nullable()->constrained();
            $table->integer('order');
            $table->integer('price');
            $table->integer('length');
            $table->integer('width');
            $table->boolean('percent');
            $table->timestamps();
            $table->unique(["product_id", "links_id"], 'product_link_configuration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extended_products');
    }
}
