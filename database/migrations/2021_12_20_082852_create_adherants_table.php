<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherants', function (Blueprint $table) {
            
            $table->id();
            $table->string('nom_complete');
            $table->string('n_dossier')->nullable()->unique();
            $table->string('ville')->nullable();
            $table->string('gsm')->nullable();
            $table->decimal('montant_verse');
            $table->string('facade')->nullable();
            $table->string('cote')->nullable();
            $table->string('bloc')->nullable();
            $table->string('etage')->nullable();
            $table->string('m2')->nullable();
            $table->decimal('pm2')->nullable();
            $table->boolean('sous_sol')->nullable();
            $table->text('observation')->nullable();
            $table->string('commerciale')->nullable();
            $table->boolean('is_canceled')->default(False);
            $table->string('realise_par');
            $table->string('n_appartement')->nullable();
            $table->integer('societe_id');
            $table->integer('lot_id');
            $table->string('imm_type')->nullable();
            $table->decimal('m_total')->nullable();

            ////Adherant Infos///////
            $table->text('addresse')->nullable();
            $table->string('date_n')->nullable();

            ////AR infos//
            $table->string('ar_name')->nullable();
            $table->string('id_national')->nullable();
            $table->string('ar_facade')->nullable();
            $table->string('ar_immtype')->nullable();

            /////Project place ///////
            $table->string('project_place')->nullable();
            $table->decimal('sousol_prix')->nullable();

            $table->boolean('balcon')->nullable();
            $table->decimal('balcon_prix')->nullable();
            $table->string('balcon_superficier')->nullable();

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
        Schema::dropIfExists('adherants');
    }
}
