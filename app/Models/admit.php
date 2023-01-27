<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admit extends Model
{
    protected $fillable = [
        'Ename', //ชื่อนามสกุลธุรการ
        'Eagency', //ชื่อหน่วยงานธุรการ
        'Edepartmentbranch', //ฝ่ายสาขาธุรการ
        'Edate_receive', //วันที่รับหนังสือ
        'Edate_out', //วันที่ส่งออก
        'Ebooknumber', //เลขหนังสือ
        'Eagency_receive', //หน่วยงานภายในผู้รับ
        'Ebranch_receive', //สาขาภายในผู้รับ
        'Edepartment_receive', //ฝ่ายภายในผู้รับ
        'Ename_receive', //ชื่อนามสกุลผู้รับ
        'Ebookeagency', //หนังสือจากหน่วยงาน
        'Esubject', //เรื่อง
        'Ebook_receipt', //เลขที่รับหนังสือ
        'Ebookrecipient', //ผู้รับหนังสือ(ฝ่าย/สาขา)
        'Enamereply', //ชื่อผู้ตอบกลับ
        'Edatereply', //วันที่ตอบกลับ
        'Etimereply', //เวลาตอบกลับ
        'Estatus', //สถานะ
        'Enote', //หมายเหตุ
        'Efile' //แนบไฟล์		
    ];


    public function Status(){
        return $this->hasOne(Status::class,'Sid','Estatus');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function agency(){
        return $this->hasOne(agency::class,'agency_id','Eagency_receive');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function branch(){
        return $this->hasOne(branch::class,'branche_id','Ebranch_receive');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function Department(){
        return $this->hasOne(Department::class,'Dpmid','Edepartment_receive');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function admitstory(){
        return $this->hasOne(admitstory::class,'amstory_name','Esubject');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function admitagency(){
        return $this->hasOne(admitagency::class,'amagency_name','Ebookeagency');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

}
