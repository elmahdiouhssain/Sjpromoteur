<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();

            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('fournisseurs_id')->nullable();
            
            $table->string('reference')->nullable();
            $table->string('f_libelle')->nullable();
            
            $table->string('type_facture')->nullable();
            $table->dateTime('relase_date');
            
            $table->string('pdf_url')->nullable();
            $table->string('total_ht')->nullable();
            $table->string('total_tva')->nullable();
            $table->string('total_ttc')->nullable();
            $table->string('realise_par')->nullable();
            $table->boolean('is_paid')->default(false);
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
        Schema::dropIfExists('factures');
    }
}
