<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductfactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsfacture', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->string('designation')->nullable();
            $table->string('uml');
            $table->unsignedInteger('qte')->nullable();
            $table->decimal('p_u')->nullable();
            $table->decimal('p_t')->nullable();
            $table->decimal('p_ttc')->nullable();
            $table->decimal('p_tva')->nullable();
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
        Schema::dropIfExists('productfacture');
    }
}
