<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transport extends Model
{
    protected $fillable = [
        'trbookout', //ไอดีbookout
        'formid', //ไอดีฟอร์ม
        'trnumber', //เลขหนังสือออก
        'trdate', //วันที่ฝากส่ง
        'trsender', //ชื่อผู้ส่ง
        'trdepositor', //ชื่อผู้ฝากส่ง
        'trdelivery', //ชื่อผู้นำส่ง
        'trtaye', //ประเภทการส่ง
        'trservice', //ผู้ให้บริการ
        'trdatesent', //วันที่ส่ง
        'ttransport', //เลขที่ขนส่ง
        'trdepartment', //แผนก(เก็บเพื่อแยกแต่ละแผนก)
        'trbranch', //สาขา
        'tragency', //หน่วยงาน
        'user_id', //รหัสไอดี
        'trsid' //สถานะการส่ง
        
    ];

    public function bookout(){
        return $this->hasOne(Bookout::class,'id','trbookout');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function Status(){
        return $this->hasOne(Status::class,'Sid','trsid');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function transport_type(){
        return $this->hasOne(transport_type::class,'transport_name','trtaye');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }

    public function depositor(){
        return $this->hasOne(depositor::class,'depositor_name','trdepositor');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }
    
    public function Form(){
        return $this->hasOne(Form::class,'id','formid');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }
    
}
