<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeparateNameToCrmContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_contacts', function (Blueprint $table) {
            $table->string('contact_fname')->after('user_id');
            $table->string('contact_lname')->nullable()->after('contact_fname');
            $table->dropColumn('contact_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_contacts', function (Blueprint $table) {
            $table->dropColumn('contact_fname');
            $table->dropColumn('contact_lname');
        });
    }
}
