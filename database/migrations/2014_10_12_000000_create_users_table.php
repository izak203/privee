<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('identite_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('matiere_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('maternel_id')->nullable();
            $table->foreignId('role_id')->default(3)->constrained()->onDelete('cascade');
            $table->foreignId('bulletin_id')->default(1)->constrained()->onDelete('cascade');
            $table->enum('payment_method', ['numeric', 'normale'])->default('numeric');
            $table->string('first_name');
            $table->string('last_name');
            $table->decimal('price', 8,2)->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('numberunique')->default(0);
            $table->string('country')->nullable();
            $table->string('age')->nullable();
            $table->string('tel')->nullable();
            $table->string('diploma')->nullable();
            $table->text('experience')->nullable();
            $table->string('image')->nullable();
            $table->boolean('premiums')->default(0);
            $table->string('email')->unique();
            $table->date('birth')->nullable();
            $table->string('valider_bulletin')->default(0);
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
