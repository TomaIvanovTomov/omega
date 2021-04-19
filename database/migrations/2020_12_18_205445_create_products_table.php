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
            $table->string('title');
            $table->string('miles');
            $table->string('engine');
            $table->double('price');
            $table->string('manufacturer');
            $table->bigInteger("make_id")->unsigned();
            $table->bigInteger("model_id")->unsigned();
            $table->bigInteger("coupe_id")->unsigned();
            $table->integer("year");
            $table->set("type", ['New', 'Used']);
            $table->set('available', ['Yes', 'No']);
            $table->set('active', ['Yes', 'No']);
            $table->timestamps();

            $table->index('make_id');
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade');

            $table->index('model_id');
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');

            $table->index('coupe_id');
            $table->foreign('coupe_id')->references('id')->on('coupes')->onDelete('cascade');
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
