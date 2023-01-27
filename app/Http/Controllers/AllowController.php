<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\permissions;
use App\Models\User;
class AllowController extends Controller
{
    public function allow(){

        $allow =permissions::all();
        $user =User::all();
        return view('allow.allow',compact('allow','user'));
    }

    public function allowstatus(){
            // 14ออกจากระบบ 8เพิ่มรายละเอียดที่ไม่เอาเพราะต้องกรอกฟอร์มถึงจะเข้าหน้านั้นได้
        // admin
        $allowadminsidebar =permissions::whereBetween('id', [1, 7])->orwhereBetween('id', [9, 13])->get();
        $allowadminadmit =permissions::whereBetween('id', [15, 18])->get();
        $allowadminbookout =permissions::whereBetween('id', [19, 23])->get();
        $allowadmintransport =permissions::whereBetween('id', [24, 27])->get();
        // staff
        $allowstaffsidebar =permissions::whereBetween('id', [1, 7])->orwhereBetween('id', [9, 13])->get();
        $allowstaffadmit =permissions::whereBetween('id', [15, 18])->get();
        $allowstaffbookout =permissions::whereBetween('id', [19, 23])->get();
        $allowstafftransport =permissions::whereBetween('id', [24, 27])->get();
        // user
        $allowusersidebar =permissions::whereBetween('id', [1, 7])->orwhereBetween('id', [9, 13])->get();
        $allowuseradmit =permissions::whereBetween('id', [15, 18])->get();
        $allowuserbookout =permissions::whereBetween('id', [19, 23])->get();
        $allowusertransport =permissions::whereBetween('id', [24, 27])->get();
        $user =User::all();
        return view('allow.allowstatus',compact('allowadminsidebar','allowadminadmit','allowadminbookout','allowadmintransport',
        'allowstaffsidebar','allowstaffadmit','allowstaffbookout','allowstafftransport',
        'allowusersidebar','allowuseradmit','allowuserbookout','allowusertransport','user'));
    }



    //  change status
    public function changeStatus(Request $request , $id){
        {
            $getStatus = permissions::select('adminstatus')->where('id',$id)->first();
            if($getStatus->adminstatus==1){
                $adminstatus = 0;
            }else{
                $adminstatus = 1;
            }
            permissions::where('id',$id)->update(['adminstatus'=>$adminstatus]);
            return redirect()->back();
        }
    }



    public function changeStatusstaff(Request $request , $id){
        {
            $getStatus = permissions::select('staffstatus')->where('id',$id)->first();
            if($getStatus->staffstatus==1){
                $staffstatus = 0;
            }else{
                $staffstatus = 1;
            }
            permissions::where('id',$id)->update(['staffstatus'=>$staffstatus]);
            return redirect()->back();
        }
    }

    public function changeStatususer(Request $request , $id){
        {
            $getStatus = permissions::select('userstatus')->where('id',$id)->first();
            if($getStatus->userstatus==1){
                $userstatus = 0;
            }else{
                $userstatus = 1;
            }
            permissions::where('id',$id)->update(['userstatus'=>$userstatus]);
            return redirect()->back();
        }
    }
}
