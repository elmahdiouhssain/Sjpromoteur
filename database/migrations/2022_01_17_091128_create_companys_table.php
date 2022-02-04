<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boncommandes_id');
            $table->foreign('boncommandes_id')->references('id')->on('boncommandes')->onDelete('cascade');
            $table->string('raison_social')->unique();
            $table->string('logo')->nullable();
            $table->text('details')->nullable();
            $table->string('rib')->nullable()->unique();
            $table->string('raison_social_ar')->nullable()->unique();
            $table->string('ville')->nullable();
            $table->string('color')->nullable();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('companys');
    }
}
