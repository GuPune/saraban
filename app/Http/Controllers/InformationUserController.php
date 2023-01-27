<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\agency;
use App\Models\branch;
use App\Models\Prefix;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use PhpParser\Node\Expr\AssignOp\Concat;
use Illuminate\Pagination\Paginator;


class InformationUserController extends Controller
{   // แก้ไขข้อมูลส่วนตัว profile admin
    public function editprofileadmin($id){
        $user = User::find($id);
        $prefix = Prefix::all();
        $agency = Agency::all();
        $branch = Branch::all();
        $department = Department::all();
        return view('admin.profile.editprofile',compact('user','prefix','agency','branch','department'));
}

    //อัปเดตข้อมูลส่วนตัว profile admin
    public function update(Request $request , $id){
        $update1 = User::find($id)->update([
            'prefix'=>$request->prefix,
            'name'=>$request->name,
            'surname'=>$request->surname,
            'tel'=>$request->tel,
            'address'=>$request->address,
            'email'=>$request->email,
            'agency'=>$request->agency,
            'branch'=>$request->branch,
            'department'=>$request->department,
        ]);
        return redirect()->route('profileadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }
        //***ข้อมูลผู้ใช้ user/staff/admin (ตารางแสดงข้อมูลผู้ใช้) ***/
        // ข้อมูลผู้ใช้แสดงในตาราง
public function claim(Request $request){
    // $transportexecuted= transport::
    // where('trsid','3')
    // ->where('trnumber','LIKE','%'.$request->search.'%')
    // ->orWhere(function($q) use ($request){
    //   $q->orwhere('ttransport', 'LIKE', '%' . $request->search . '%')
    //     ->orwhere('trbearer','LIKE','%'.$request->search.'%');
    //  }) 
    // ->whereNotIn('trsid', ['2','1','4'])
    // ->orderby('id','DESC')->get();  
            
            // $collection_A = User::paginate(10);

            // Paginator::setPageName('page_b');
            // $collection_B = User::paginate(10);
           // admin
            $tb1 = User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
            ->Join('branches', 'users.branch', '=', 'branches.branche_name')
            ->Join('departments', 'users.department', '=', 'departments.Dpmname')
            ->select('users.*')->where('role','2')
            ->where('name','LIKE','%'.$request->search.'%')
            ->Where(function($q) use ($request){
            $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
                ->orwhere('email','LIKE','%'.$request->search.'%');
            }) 
            ->orderby('id','ASC')->paginate(10, ['*'], 'tb1');

            // staff     $produk = Produk::paginate(5, ['*'], 'produk');
            $tb2 = User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
            ->Join('branches', 'users.branch', '=', 'branches.branche_name')
            ->Join('departments', 'users.department', '=', 'departments.Dpmname')
            ->select('users.*')->where('role','1')
            ->where('name','LIKE','%'.$request->search.'%')
            ->Where(function($q) use ($request){
            $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
                ->orwhere('email','LIKE','%'.$request->search.'%');
            }) 
            ->orderby('id','ASC')->paginate(1, ['*'], 'tb2');
            
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
            ->orderby('id','ASC')->paginate(10, ['*'], 'tb3');

            return view('admin.claim.claim',compact('tb2','tb3','tb1'));
        }

// function get_ajax_data(Request $request)
//         {
//          if($request->ajax())
//          {
//             $tb1 = User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
//             ->Join('branches', 'users.branch', '=', 'branches.branche_name')
//             ->Join('departments', 'users.department', '=', 'departments.Dpmname')
//             ->select('users.*')->where('role','2')
//             ->where('name','LIKE','%'.$request->search.'%')
//             ->Where(function($q) use ($request){
//             $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
//                 ->orwhere('email','LIKE','%'.$request->search.'%');
//             }) 
//             ->orderby('id','ASC')->paginate(10, ['*'], 'tb1');

//             // staff     $produk = Produk::paginate(5, ['*'], 'produk');
//             $tb2 = User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
//             ->Join('branches', 'users.branch', '=', 'branches.branche_name')
//             ->Join('departments', 'users.department', '=', 'departments.Dpmname')
//             ->select('users.*')->where('role','1')
//             ->where('name','LIKE','%'.$request->search.'%')
//             ->Where(function($q) use ($request){
//             $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
//                 ->orwhere('email','LIKE','%'.$request->search.'%');
//             }) 
//             ->orderby('id','ASC')->paginate(1, ['*'], 'tb2');
            
//             // user
//             $tb3 =User::Join('agencies', 'users.Agency', '=', 'agencies.agency_name')
//             ->Join('branches', 'users.branch', '=', 'branches.branche_name')
//             ->Join('departments', 'users.department', '=', 'departments.Dpmname')
//             ->select('users.*')->where('role','0') 
//             ->where('name','LIKE','%'.$request->search.'%')
//             ->Where(function($q) use ($request){
//             $q->orwhere('Lastname', 'LIKE', '%' . $request->search . '%')
//                 ->orwhere('email','LIKE','%'.$request->search.'%');
//             }) 
//             ->orderby('id','ASC')->paginate(10, ['*'], 'tb3');

//             return view('admin.claim.claim_data',compact('tb2','tb3','tb1'))->render();
//          }
//         }



        //เพิ่มข้อมูลผู้ใช้
public function addclaim(){
            $prefix = Prefix::all();
            $agency = Agency::all();
            $branch = Branch::all();
            $department = Department::select('Dpmname')->groupBy('Dpmname')->get();
            return view('admin.claim.addclaim',compact('prefix','agency','branch','department'));
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
            $agency = Agency::all();
            $branch = Branch::all();
            $department = Department::select('Dpmname')->groupBy('Dpmname')->get();
            // $department = Department::all();
            return view('admin.claim.editclaim',compact('user','agency','branch','department'));
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
            ]);
            return redirect()->route('claim')->with('success',"อัพเดตข้อมูลเรียบร้อย");
        }

        //edit ข้อมูลผู้ใช้ claim staff
public function editclaimstaff(Request $request , $id){
            $tb2 = User::find($id);
            $agency = Agency::all();
            $branch = Branch::all();
            $department = Department::all();

            return view('admin.claim.editclaimstaff',compact('tb2','agency','branch','department'));
        }

        // อัปเดตข้อมูลผู้ใช้ claim staff tb3
public function updateclaimtb2(Request $request , $id){
            $update = User::find($id)->update([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'tel'=>$request->tel,
                'address'=>$request->address,
                'email'=>$request->email,
                'agency'=>$request->agency,
                'branch'=>$request->branch,
                'department'=>$request->department,
            ]);
            return redirect()->route('addclaim')->with('success',"อัพเดตข้อมูลเรียบร้อย");
        }

        //edit ข้อมูลผู้ใช้ claim user
public function editclaimuser(Request $request , $id){
            $tb3 = User::find($id);
            $agency = Agency::all();
            $branch = Branch::all();
            $department = Department::all();

            return view('admin.claim.editclaimuser',compact('tb3','agency','branch','department'));
        }

        // อัปเดตข้อมูลผู้ใช้ claim user tb3
public function updateclaimtb3(Request $request , $id){
            $update = User::find($id)->update([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'tel'=>$request->tel,
                'address'=>$request->address,
                'email'=>$request->email,
                'agency'=>$request->agency,
                'branch'=>$request->branch,
                'department'=>$request->department,
            ]);
            return redirect()->route('addclaim')->with('success',"อัพเดตข้อมูลเรียบร้อย");
        }

        //ลบข้อมูลในตารางผู้ใช้ user/staff/admin
public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('addclaim')->with('success',"ลบข้อมูลเรียบร้อย");

        }
public function register1(){
            return view('admin.register1');
        }


}
