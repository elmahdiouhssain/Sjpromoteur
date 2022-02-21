<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complete');
            $table->string('n_dossier')->nullable();
            $table->string('cnss')->nullable();
            $table->string('cin')->nullable();
            $table->string('n_telephone')->nullable();
            $table->string('fonction')->nullable();
            $table->string('n_banquer')->nullable();
            $table->dateTime('date_debut')->nullable();
            $table->text('addr1')->nullable();
            $table->text('addr2')->nullable();
            $table->text('observation')->nullable();
            $table->dateTime('c_start')->nullable();
            $table->dateTime('c_end')->nullable();
            $table->boolean('on_conge')->default(False);
            //$table->bigInteger('n_jours')->nullable();
            //$table->bigInteger('prix_jour')->nullable();
            //$table->bigInteger('salaire_total')->nullable();
            $table->string('realise_par');
            $table->string('contract')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
