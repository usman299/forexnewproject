<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstNameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('ref_id');
            $table->string('last_name')->nullable()->after('ref_id');
            $table->string('code')->nullable()->after('ref_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('ref_id');
            $table->string('last_name')->nullable()->after('ref_id');
            $table->string('code')->nullable()->after('ref_id');
        });
    }
}
