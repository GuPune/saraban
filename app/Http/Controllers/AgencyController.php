<?php

namespace App\Http\Controllers;
use App\Models\agency;
use App\Models\branch;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    public function agency(){
        return view('agency.agency');
    }

    public function addagency(){
        $agency = agency::all();
        $branch = branch::all();
        $department = department::all();
        return view('agency.addagency.agency',compact('agency','branch','department'));
    }

    public function showagency(){
        $agency = agency::all();
        $branch = branch::all();
        $department = department::all();
        return view('agency.dataagency.agency',compact('agency','branch','department'));
    }


    public function storeagency(Request $request){
        $request->validate(
            [
                'agency_name'=>'required'
            ],
            [
                'agency_name.required'=>"กรุณาเพิ่มข้อมูลหน่วยงาน"
            ]
           );
        $role=Auth::user()->role;
        $agency = new agency();
        $agency->agency_name = $request->agency_name;
        $agency ->save();
        return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }

    public function addbranch(){
        $agency = agency::all();
        $branch = branch::Join('agencies', 'branches.agency', '=', 'agencies.agency_id')
        ->orderby('agency_name','ASC')->orderby('branche_name','ASC')->get();
        return view('agency.addagency.branch',compact('agency','branch'));
    }

    public function databranch(){
        $agency = agency::all();
        $branch = branch::Join('agencies', 'branches.agency', '=', 'agencies.agency_id')
        ->orderby('agency_name','ASC')->orderby('branche_name','ASC')->get();
        return view('agency.dataagency.branch',compact('agency','branch'));
    }

    public function storebranch(Request $request){
        $request->validate(
            [
                'branch_name'=>'required'
            ],
            [
                'branch_name.required'=>"กรุณาเพิ่มข้อมูลหน่วยงาน"
            ]
           );
        $branch = new branch();
        $branch->branche_name = $request->branch_name;
        $branch->agency = $request->agency;
        // dd($request);
        $branch ->save();
        return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }

    public function adddepartment(){
        $branch = branch::Join('agencies', 'branches.agency', '=', 'agencies.agency_id')->orderby('agency_name','ASC')->get();
        $agency = agency::all();
        $department = department::Join('branches', 'departments.branch', '=', 'branches.branche_id')->
        Join('agencies', 'branches.agency', '=', 'agencies.agency_id')
        ->orderby('agency_name','ASC')->orderby('branche_name','ASC')->orderby('Dpmname','ASC')->get();
        return view('agency.addagency.department',compact('agency','branch','department'));
    }

    public function datadepartment(){
        $branch = branch::Join('agencies', 'branches.agency', '=', 'agencies.agency_id')->orderby('agency_name','ASC')->get();
        $agency = agency::all();
        $department = department::Join('branches', 'departments.branch', '=', 'branches.branche_id')->
        Join('agencies', 'branches.agency', '=', 'agencies.agency_id')
        ->orderby('agency_name','ASC')->orderby('branche_name','ASC')->orderby('Dpmname','ASC')->get();
        return view('agency.dataagency.department',compact('agency','branch','department'));
    }

    public function storedepartment(Request $request){
        $request->validate(
            [
                'Dpmname'=>'required'
            ],
            [
                'Dpmname.required'=>"กรุณาเพิ่มข้อมูลหน่วยงาน"
            ]
           );
        $department = new Department();
        $department->Dpmname = $request->Dpmname;
        $department->branch = $request->branch;
        $department ->save();
        return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }

    //ลบข้อมูลในตารางหน่วยงาน
    public function destroy($agency_id){
        agency::where('agency_id',$agency_id)->delete();
        return redirect()->back();     
    }

    //ลบข้อมูลในตารางสาขา
    public function destroybranch($branche_id){
        branch::where('branche_id',$branche_id)->delete();
        return redirect()->back();     
    }

    //ลบข้อมูลในตารางแผนก
    public function destroydepartment($Dpmid){
        department::where('Dpmid',$Dpmid)->delete();
        return redirect()->back();     
    }
}
