<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetamasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metamasks', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id')->nullable();
            $table->string('user_address')->nullable();
            $table->string('admin_address')->nullable();
            $table->string('user_id')->nullable();
            $table->string('trx')->nullable();
            $table->string('amount')->nullable();
            $table->string('type')->default(7);
            $table->string('status')->default(1);
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
        Schema::dropIfExists('metamasks');
    }
}
