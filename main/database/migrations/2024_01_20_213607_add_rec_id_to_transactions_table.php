<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('rec_id')->default(0)->after('trx');
            $table->integer('type_two')->comment('1 => deposit,2 => withdraw,3 => profit,4 => bounas,5 => daily,0 => other')->after('trx')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('rec_id')->default(0)->after('trx');
            $table->integer('type_two')->comment('1 => deposit,2 => withdraw,3 => profit,4 => bounas,5 => daily,0 => other')->after('trx')->default(0);
        });
    }
}
