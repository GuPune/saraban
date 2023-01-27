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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('trbookout');
            $table->string('formid');
            $table->string('trnumber');
            $table->date('trdate');
            $table->string('trsender');
            $table->string('trdepositor');
            $table->string('trdelivery');
            $table->string('trtaye');
            $table->string('trservice');
            $table->date('trdatesent');
            $table->string('ttransport');
            $table->string('trdepartment');
            $table->string('trbranch');
            $table->string('tragency');
            $table->string('user_id');
            $table->string('trsid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
};
