<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\agency;
use App\Models\branch;
use App\Models\Prefix;
use App\Models\Department;
use App\Models\level;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
public function profile(){
        $user =User::all();

        return view('profilesystem.profile',compact('user'));
    }

public function editprofile($id){
    $user = User::find($id);
    $prefix = Prefix::all();
    $level = level::all();
    $agency = agency::where('agency_name','บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')->get();
    $branch  = branch::where('branche_name','สำนักงานใหญ่')->get();
    $department = Department::where('agency','1')->get();
    $role=Auth::user()->role;
    return view('profilesystem.editprofile',compact('user','prefix','agency','branch','department','level'));
  }

public function update(Request $request , $id){
    $update1 = User::find($id)->update([
        'Prefix'=>$request->Prefix,
        'name'=>$request->name,
        'Lastname'=>$request->Lastname,
        'Tel'=>$request->Tel,
        'address'=>$request->address,
        'email'=>$request->email,
        'Agency'=>$request->Agency,
        'Branch'=>$request->Branch,
        'Department'=>$request->Department,
    ]);
    return redirect()->route('profile')->with('success',"อัพเดตข้อมูลเรียบร้อย");
   }

public function updateImage(Request $request,$id)
        {
            //ตรวจสอบข้อมูล
            $request->validate(
                [
                    'Image'=>'required|mimes:jpg,jpeg,png'
                ]
            );

            //ลบรูปภาพ
            $user = User::find($id);
            if($request->hasFile('Image')){
                $dastination = 'files/file/' . $user->Image;
                if(File::exists($dastination)){
                    File::delete($dastination);
                }
                //อัปเดรตแทนที่รูปใหม่
                $file = $request->file('Image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('files/file/', $filename);
                $user->Image = $filename;
            }
            $user->update();
            return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
        }

public function claim(Request $request){
                    $tb1 = User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
                    ->Join('branches', 'users.branch', '=', 'branches.branche_name')
                    ->Join('departments', 'users.department', '=', 'departments.Dpmname')
                    ->select('users.*')->where('role','2')
                    ->where('name','LIKE','%'.$request->search.'%')
                    ->Where(function($q) use ($request){
                    $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
                        ->orwhere('email','LIKE','%'.$request->search.'%');
                    }) 
                    ->orderby('id','DESC')->paginate(15, ['*'], 'tb1');
        
                    $tb2 = User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
                    ->Join('branches', 'users.branch', '=', 'branches.branche_name')
                    ->Join('departments', 'users.department', '=', 'departments.Dpmname')
                    ->select('users.*')->where('role','1')
                    ->where('name','LIKE','%'.$request->search.'%')
                    ->Where(function($q) use ($request){
                    $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
                        ->orwhere('email','LIKE','%'.$request->search.'%');
                    }) 
                    ->orderby('id','DESC')->paginate(15, ['*'], 'tb2');
                    
                    // user
                    $tb3 =User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
                    ->Join('branches', 'users.branch', '=', 'branches.branche_name')
                    ->Join('departments', 'users.department', '=', 'departments.Dpmname')
                    ->select('users.*')->where('role','0') 
                    ->where('name','LIKE','%'.$request->search.'%')
                    ->Where(function($q) use ($request){
                    $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
                        ->orwhere('email','LIKE','%'.$request->search.'%');
                    }) 
                    ->orderby('id','DESC')->paginate(15, ['*'], 'tb3');
        
                    return view('claim.claim',compact('tb2','tb3','tb1'));
                }

//เพิ่มข้อมูลผู้ใช้
public function addclaim()
                {
                    $prefix = Prefix::all();
                    $agency = agency::where('agency_name','บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')->get();
                    $branch  = branch::where('branche_name','สำนักงานใหญ่')->get();
                    $department = Department::where('agency','1')->get();
                    return view('claim.addclaim',compact('prefix','agency','branch','department'));
                }
        
//บันทึกอมูลผู้ใช้
public function addclaimuser(Request $request){
                    //บันทึกข้อมูล
                    $data = array();
                    $data["Prefix"] = $request->Prefix;
                    $data["name"] = $request->name;
                    $data["Lastname"] = $request->Lastname;
                    $data["Tel"] = $request->Tel;
                    $data["address"] = $request->address;
                    $data["email"] = $request->email;
                    $data["Agency"] = $request->Agency;
                    $data["Branch"] = $request->Branch;
                    $data["Department"] = $request->Department;
                    $data["role"] = $request->role;
                    $data ["password"] = Hash::make($request['password']);
                    DB::table('users')->insert($data);
                    // dd($data);
                    return redirect()->route('claim')->with('success',"บันทึกข้อมูลเรียบร้อย");
                }
        
//edit ข้อมูลผู้ใช้ claim staff
public function editclaim(Request $request , $id){
                    $user = User::find($id);
                    $agency = agency::where('agency_name','บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')->get();
                    $branch  = branch::where('branche_name','สำนักงานใหญ่')->get();
                    $department = Department::where('agency','1')->get();
                    // $department = Department::all();
                    return view('claim.editclaim',compact('user','agency','branch','department'));
                }
        
// อัปเดตข้อมูลผู้ใช้ claim staff tb3
public function updateclaim(Request $request , $id){
                    $update = User::find($id)->update([
                        'name'=>$request->name,
                        'Lastname'=>$request->Lastname,
                        'Tel'=>$request->Tel,
                        'address'=>$request->address,
                        'email'=>$request->email,
                        'Agency'=>$request->Agency,
                        'Branch'=>$request->Branch,
                        'Department'=>$request->Department,
                        'role'=>$request->role
                    ]);
                    return redirect()->route('claim')->with('success',"อัพเดตข้อมูลเรียบร้อย");
                }
 
//ลบข้อมูลในตารางผู้ใช้ user/staff/admin
public function destroy($id){
                User::find($id)->delete();
                return redirect()->route('claim')->with('success',"ลบข้อมูลเรียบร้อย");     
   }
public function register1(){
                    return view('register1');
                }

//หน้าแก้ไขข้อมูลส่วนตัว
public function editepassword(){
    return view('staff.editprofile');
}

// หน้าแก้ไขรหัสผ่าน
public function changepassword($id){
    $user = User::find($id);
    return view('profilesystem.changepassword',compact('user'));
}

// อัปเดรตรหัสผ่าน
public function updatepassword(Request $request, $id)
{
    # Validation
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
    ]);

    #Match The Old Password
    if(!Hash::check($request->old_password, auth()->user()->password)){
        return back()->with("error", "รหัสผ่านเดิมไม่ถูกต้อง");
    }

    #Update the new Password
    $update = User::find($id)->update([
    // User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);

    // dd($update);
    return back()->with("status", "อัปเดตรหัสผ่านเรียบร้อย");
}

        
}
