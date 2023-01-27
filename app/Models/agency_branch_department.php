<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agency_branch_department extends Model
{
    protected $fillable = [
        'tagency',
        'tbranch',
        'tdepartment'
    ];
}
