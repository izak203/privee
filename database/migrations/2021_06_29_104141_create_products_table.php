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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('maternel_id');
            $table->foreignId('matiere_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('sub_title');
            $table->text('body');
            $table->string('second_title');
            $table->text('excerpt');
            $table->string('third_title');
            $table->text('main');
            $table->boolean('premium')->default(0);
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('photo')->nullable();
            $table->string('media')->nullable();
            $table->string('upload')->nullable();
            $table->string('fichier')->nullable();
            $table->date('date_product');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('maternel_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_maternels');
    }
}
