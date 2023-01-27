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
        Schema::create('admits', function (Blueprint $table) {
            $table->id(); //รหัสหนังสือรับเข้า
            $table->string('Ename'); //	ชื่อนามสกุลธุรการ
            $table->string('Eagency'); //ชื่อหน่วยงานธุรการ
            $table->string('Edepartmentbranch'); //ฝ่าย/สาขาธุรการ
            $table->date('Edate_receive'); //วันที่รับหนังสือ
            $table->date('Edate_out'); //วันที่ส่งออก
            $table->string('Ebooknumber'); //เลขหนังสือ
            $table->string('Eagency_receive'); //หน่วยงานภายในผู้รับ
            $table->string('Ebranch_receive'); //สาขาภายในผู้รับ
            $table->string('Edepartment_receive'); //ฝ่ายภายในผู้รับ
            $table->string('Ename_receive'); //ชื่อนามสกุลผู้รับ
            $table->string('Ebookeagency'); //หนังสือจากหน่วยงาน
            $table->string('Esubject'); //เรื่อง
            $table->string('Ebook_receipt'); //เลขที่รับหนังสือ
            $table->string('Ebookreecipient'); //ผู้รับหนังสือ(ฝ่าย/สาขา)
            $table->string('Enamereply'); //ชื่อผู้ตอบกลับ
            $table->date('Edatereply'); //วันที่ตอบกลับ
            $table->time('Etimereply'); //เวลาตอบกลับ
            $table->string('Estatus');//สถานะ
            $table->string('Enote'); //หมายเหตุ
            $table->string('Efile');
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
        Schema::dropIfExists('admits');
    }
};
