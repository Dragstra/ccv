<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_product_id')->nullable()->constrained();
            $table->foreignId('extended_product_id')->nullable()->constrained();
            $table->foreignId('links_id')->nullable()->constrained();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(["base_product_id", "extended_product_id", "links_id"], 'final_configuration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
