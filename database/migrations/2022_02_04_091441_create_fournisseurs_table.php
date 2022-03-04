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
            $table->string('raison_s')->nullable();
            $table->string('ice')->nullable();
            $table->text('addr1')->nullable();
            $table->string('n_telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('service')->nullable();
            $table->string('c_bancaire')->nullable();
            $table->text('observations')->nullable();
            $table->string('realise_par')->nullable();
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
