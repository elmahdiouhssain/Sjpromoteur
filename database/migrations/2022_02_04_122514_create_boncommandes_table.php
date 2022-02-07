<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoncommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boncommandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->string('numero')->nullable();
            $table->dateTime('date_bc')->nullable();
            $table->string('lieu')->nullable();
            $table->string('n_tele')->nullable();

            $table->decimal('total_ht')->nullable();
            $table->decimal('total_tva')->nullable();
            $table->decimal('total_ttc')->nullable();

            $table->string('realise_par')->nullable();
            $table->boolean('valide')->default(0);
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
        Schema::dropIfExists('boncommandes');
    }
}
