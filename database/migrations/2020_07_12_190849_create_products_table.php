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
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories')->onDeleted('cascade');
            $table->text('description')->nullable();
            $table->double('amount')->unsignedInteger();
            $table->double('previous_amount')->unsignedInteger()->nullable();
            $table->string('featured_image');
            $table->string('reference');
            $table->boolean('featured')->default(0); //featured = 1; not featured = 0;
            $table->boolean('instock')->default(0); // instock = 0; sold = 1;
            $table->boolean('status')->default(0); //unpublished = 0; published = 1;
            $table->string('link');
            $table->string('slug');
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
