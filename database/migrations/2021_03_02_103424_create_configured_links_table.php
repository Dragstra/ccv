<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguredLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configured_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('configuration_id')->constrained();
            $table->foreignId('final_product_id')->constrained();
            $table->foreignId('links_id')->constrained();
            $table->timestamps();
            $table->unique(["configuration_id", "final_product_id"], 'final_configuration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configured_links');
    }
}
