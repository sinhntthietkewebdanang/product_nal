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
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('category')->default(null);
            $table->string('name')->default(null);
            $table->string('code')->default(null);
            $table->integer('price')->default(0);
            $table->string('unit')->default(null);
            $table->float('quantity_on_hand',16,2)->default(0);
            $table->boolean('status');
            $table->string('note')->default(null);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}

