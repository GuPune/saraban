<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookout extends Model
{
    protected $fillable = [
        'user_id',//รหัสผู้กรอก
        'Oname',//ชื่อผู้กรอก
        'Odate',
        'Oagency',//หน่วยงานผู้กรอก
        'Odepartment',//ฝ่ายผู้กรอก
        'Obranch',//สาขาผู้กรอก
        'Odate',//วันที่
        'Obr_receive',//สาขาภายในผู้รับ            
        'Oag_receive',//หน่วยงานภายในผู้รับ             
        'Odpm_receive',//ฝ่ายภายในผู้รับ             
        'Oname_receive',//ชื่อภายในผู้รับ             
        'Ophone',  //หมายเลขติดต่อ
        'Onumber',  //เลขที่หนังสือ
        'formid', //ไอดีฟอร์ม
        'Ostatus',//สถานะหนังสือตอบกลับ
        'Oupload' //อัพโหลดไฟล์
    ];

    // public function agency(){
    //     return $this->hasOne(agency::class,'agency_id','Oag_receive');
    //     //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    // }

    // public function branch(){
    //     return $this->hasOne(branch::class,'branche_id','Obr_receive');
    //     //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    // }

    // public function Department(){
    //     return $this->hasOne(Department::class,'Dpmid','Odpm_receive');
    //     //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    // }

    public function Form(){
        return $this->hasOne(Form::class,'id','formid');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }
    
}