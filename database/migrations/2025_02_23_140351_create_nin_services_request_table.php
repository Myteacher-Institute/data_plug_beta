<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nin_services_request', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('service_type');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('nin_number');
            $table->string('email');
            $table->string('phone_number');
            $table->string('whatsapp_number');
            $table->string('tracking_id');
            $table->string('dob');
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
        Schema::dropIfExists('nin_services_request');
    }
};
