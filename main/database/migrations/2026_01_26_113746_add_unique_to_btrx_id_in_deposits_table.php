<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToBtrxIdInDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('btrx_id_in_deposits', function (Blueprint $table) {
            $table->text('btrx_id',100)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('btrx_id_in_deposits', function (Blueprint $table) {
            $table->dropUnique(['btrx_id']);
        });
    }
}
