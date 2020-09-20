<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('contact_fname');
            $table->string('contact_lname');
            $table->string('contact_email')->unique();
            $table->string('contact_address');
            $table->string('work_phone')->nullable();
            $table->string('mobile_phone');
            $table->string('home_phone')->nullable();
            $table->string('job_title')->nullable();
            $table->string('website')->nullable();
            $table->string('business')->nullable();
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
        Schema::dropIfExists('crm_contacts');
    }
}
