<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boncommande_id');
            $table->foreign('boncommande_id')->references('id')->on('boncommandes')->onDelete('cascade');
            $table->string('raison_s')->nullable();
            $table->string('ice')->nullable();
            $table->text('addr1')->nullable();
            $table->string('n_telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('c_bancaire')->nullable();
            $table->text('observations')->nullable();
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
        Schema::dropIfExists('fournisseurs');
    }
}
