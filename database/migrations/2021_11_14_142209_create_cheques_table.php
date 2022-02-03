<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {

            $table->id();
            $table->date('date_cheque')->nullable();
            $table->string('type_op')->nullable();
            $table->string('designation')->unique();
            $table->string('verse_par')->nullable();
            $table->string('n_marche')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->string('societe');
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
        Schema::dropIfExists('cheques');
    }
}
