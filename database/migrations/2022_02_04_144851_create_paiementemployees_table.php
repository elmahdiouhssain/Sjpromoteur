<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiementemployees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->date('debut');
            $table->date('fin');
            $table->text('observation')->nullable();
            $table->bigInteger('n_jours')->nullable();
            $table->decimal('prix_jour')->nullable();
            $table->decimal('salaire_total')->nullable();
            $table->string('realise_par');
            $table->boolean('is_payee')->default(False);
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
        Schema::dropIfExists('paiementemployees');
    }
}
