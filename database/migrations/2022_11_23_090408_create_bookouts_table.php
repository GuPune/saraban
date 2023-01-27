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
        // $table->string('role')->default(0);
        Schema::create('bookouts', function (Blueprint $table) {
            $table->id();        
            $table->string('user_id');//รหัสผู้กรอก
            $table->string('Odate');//ชื่อผู้กรอก
            $table->string('Oname');//ชื่อผู้กรอก
            $table->string('Oagency');//หน่วยงานผู้กรอก
            $table->string('Odepartment');//ฝ่ายผู้กรอก
            $table->string('Obranch');//สาขาผู้กรอก
            $table->string('Obr_receive');//สาขาภายในผู้รับ            
            $table->string('Oag_receive');//หน่วยงานภายในผู้รับ             
            $table->string('Odpm_receive');//ฝ่ายภายในผู้รับ             
            $table->string('Oname_receive');//ชื่อภายในผู้รับ             
            $table->string('Ophone');  //หมายเลขติดต่อ
            $table->string('Onumber');//เลขหนังสือ
            $table->int('formid');
            $table->string('Ostatus');//สถานะ
            $table->string('Oupload')->nullable();//Upload แบบฟอร์มใหม่ 
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
        Schema::dropIfExists('bookouts');
    }
};
