<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    protected $fillable = [
        'branch_name',
        'agency'
    ];

    public function agency(){
        return $this->hasOne(agency::class,'agency_id','agency');
        //thisคือตัวแทนของdepartmentไปเชื่อมกับuserแบบ 1ต่อ1 id=user user_id=department
    }
}