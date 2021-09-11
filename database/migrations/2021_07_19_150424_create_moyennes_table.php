<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyennesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyennes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('bulletin_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('coefficiant')->nullable();
            $table->string('francais')->nullable();
            $table->string('total')->nullable();
            $table->string('suggestion')->nullable();
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
        Schema::dropIfExists('moyennes');
    }
}
