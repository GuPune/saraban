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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); //เพิ่มเข้ามา
            $table->string('fdepartment');   //เพิ่มเข้ามา 
            $table->string('dnumber');   //เพิ่มเข้ามา 
            $table->string('cnumber');   //เพิ่มเข้ามา 
            $table->string('year');   //เพิ่มเข้ามา 
            $table->date('date');   //เพิ่มเข้ามา   
            $table->string('story');   //เพิ่มเข้ามา             
            $table->string('learn');   //เพิ่มเข้ามา             
            $table->string('quote');   //เพิ่มเข้ามา             
            $table->string('enclosure');   //เพิ่มเข้ามา             
            $table->string('details');   //เพิ่มเข้ามา 
            $table->string('ctname');   //เพิ่มเข้ามา                         
            $table->string('ctphone');   //เพิ่มเข้ามา                         
            $table->string('ctemail');   //เพิ่มเข้ามา      
            $table->string('type');   //เพิ่มเข้ามา                       
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
        Schema::dropIfExists('forms');
    }
};
