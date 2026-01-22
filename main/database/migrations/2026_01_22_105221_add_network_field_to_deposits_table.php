<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNetworkFieldToDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deposits', function (Blueprint $table) {
            $table->string('network')->nullable()->after('gateway_id')->comment('Payment network type, e.g., BEP20, TRC20');
            //  $table->id();
            // $table->string('type');
            // $table->string('notifiable_type')->unique();
            // $table->string('notifiable_id')->unique();
            // $table->text('data');
            // $table->timestamp('read_at');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposits', function (Blueprint $table) {
             $table->dropColumn('network');
        });
    }
}
