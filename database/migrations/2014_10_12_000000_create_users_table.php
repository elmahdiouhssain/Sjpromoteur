<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tele')->nullable();
            $table->boolean('is_admin')->default(False);
            $table->boolean('is_commercial')->default(False);
            $table->string('total_clients')->nullable();
            $table->string('total_revenue')->nullable();
            $table->string('rib')->nullable();
            $table->string('cnss')->nullable();
            $table->string('date_n')->nullable();
            $table->text('addresse')->nullable();
            $table->ipAddress('ipaddr')->nullable();
            $table->macAddress('mac_device')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
