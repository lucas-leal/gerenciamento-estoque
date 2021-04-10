<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHandlingsTable extends Migration
{
    public function up()
    {
        Schema::create('stock_handlings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('product_id')->references('id')->on('products');
            $table->integer('amount')->nullable(false);
            $table->enum('origin', ['system', 'api']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_handlings');
    }
}
