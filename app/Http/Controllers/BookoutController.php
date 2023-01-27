<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\agency;
use App\Models\branch;
use App\Models\transport_type;
use App\Models\Bookout;
use App\Models\Department;
use Illuminate\support\Facades\DB; 
use App\Models\Form;
use App\Models\depositor;
use App\Models\transport;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\TemplateProcessor;
// use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\View;

class BookoutController extends Controller
{
public function bookoutadmin(Request $request)
  {

    $search = $request->input('search');
    $searchdate = $request->input('searchdate');
    $searchend = $request->input('searchend');
      $agency= agency::all();
      $bookoutrow = Bookout::
      // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
      // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
      Where(function($q) use ($request){
        if($request->get('searchdate')&&$request->get('searchend')){
            $q ->where('Odate','>=',$request->searchdate.'%')
             ->where('Odate','<=',$request->searchend.'%') ;
          }
        elseif($request->get('search')){
          $q ->where('Onumber','LIKE','%'.$request->search.'%')
          ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
        } 
       else{}})
      ->orderby('bookouts.id','DESC')->paginate(15, ['*'], 'bookoutrow');
      $bookoutrowcount = Bookout::all()->count();

      $bookoutrowyes = Bookout::
      // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
      // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
      select('bookouts.*')->where('Ostatus','ต้องการหนังสือตอบกลับ')
      ->Where(function($q) use ($request){
        if($request->get('searchdate')&&$request->get('searchend')){
            $q ->where('Odate','>=',$request->searchdate.'%')
             ->where('Odate','<=',$request->searchend.'%') ;
          }
        elseif($request->get('search')){
          $q ->where('Onumber','LIKE','%'.$request->search.'%')
          ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
        } 
       else{}})
      ->whereNotIn('Ostatus', ['ไม่ต้องการหนังสือตอบกลับ'])->orderby('bookouts.id','DESC')->paginate(15, ['*'], 'bookoutrowyes');
      $bookoutrowyescount = Bookout::where('Ostatus','ต้องการหนังสือตอบกลับ')->count();

      $bookoutrowno = Bookout::
      // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
      // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
      select('bookouts.*')->where('Ostatus','ไม่ต้องการหนังสือตอบกลับ')
      ->Where(function($q) use ($request){
        if($request->get('searchdate')&&$request->get('searchend')){
            $q ->where('Odate','>=',$request->searchdate.'%')
             ->where('Odate','<=',$request->searchend.'%') ;
          }
        elseif($request->get('search')){
          $q ->where('Onumber','LIKE','%'.$request->search.'%')
          ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
        } 
       else{}})
      ->whereNotIn('Ostatus', ['ต้องการหนังสือตอบกลับ'])->orderby('bookouts.id','DESC')->paginate(15, ['*'], 'bookoutrowno');
      $bookoutrownocount = Bookout::where('Ostatus','ไม่ต้องการหนังสือตอบกลับ')->count();

      return view('admin.bookout.bookout',compact('agency','bookoutrow','bookoutrowyes','bookoutrowno','bookoutrownocount','bookoutrowyescount','bookoutrowcount'));
  }
public function bookoutstaff(Request $request)
    {

      $search = $request->input('search');
      $searchdate = $request->input('searchdate');
      $searchend = $request->input('searchend');
        $agency= agency::all();
        $bookoutrow = Bookout::
        // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
        // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
        Where(function($q) use ($request){
          if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('Odate','>=',$request->searchdate.'%')
               ->where('Odate','<=',$request->searchend.'%') ;
            }
          elseif($request->get('search')){
            $q ->where('Onumber','LIKE','%'.$request->search.'%')
            ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
          } 
         else{}})
        ->orderby('bookouts.id','DESC')->paginate(15, ['*'], 'bookoutrow');
        $bookoutrowcount = Bookout::all()->count();

        $bookoutrowyes = Bookout::
        // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
        // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
        select('bookouts.*')->where('Ostatus','ต้องการหนังสือตอบกลับ')
        ->Where(function($q) use ($request){
          if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('Odate','>=',$request->searchdate.'%')
               ->where('Odate','<=',$request->searchend.'%') ;
            }
          elseif($request->get('search')){
            $q ->where('Onumber','LIKE','%'.$request->search.'%')
            ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
          } 
         else{}})
        ->whereNotIn('Ostatus', ['ไม่ต้องการหนังสือตอบกลับ'])->orderby('bookouts.id','DESC')->paginate(15, ['*'], 'bookoutrowyes');
        $bookoutrowyescount = Bookout::where('Ostatus','ต้องการหนังสือตอบกลับ')->count();

        $bookoutrowno = Bookout::
        // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
        // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
        select('bookouts.*')->where('Ostatus','ไม่ต้องการหนังสือตอบกลับ')
        ->Where(function($q) use ($request){
          if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('Odate','>=',$request->searchdate.'%')
               ->where('Odate','<=',$request->searchend.'%') ;
            }
          elseif($request->get('search')){
            $q ->where('Onumber','LIKE','%'.$request->search.'%')
            ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
          } 
         else{}})
        ->whereNotIn('Ostatus', ['ต้องการหนังสือตอบกลับ'])->orderby('bookouts.id','DESC')->paginate(15, ['*'], 'bookoutrowno');
        $bookoutrownocount = Bookout::where('Ostatus','ไม่ต้องการหนังสือตอบกลับ')->count();

        return view('staff.bookout.bookout',compact('agency','bookoutrow','bookoutrowyes','bookoutrowno','bookoutrownocount','bookoutrowyescount','bookoutrowcount'));
    }

public function bookoutuser(Request $request)
    {
      $agency= agency::all();
      $depositor = depositor::all();
      $dpm=Auth::user()->Department;
      $search = $request->input('search');
      $searchdate = $request->input('searchdate');
      $searchend = $request->input('searchend');

      // $captions = DB::table('ab_captions')->where('ab_groups.user_id', $user_id)->where('ab_captions.user_id', $user_id)->join('ab_groups', 'ab_captions.group_id', '=', 'ab_groups.id')->groupBy('ab_captions.group_id')->get();

        $bookoutrow = Bookout::
        // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
        // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
        where('Odepartment','LIKE',Auth::user()->Department)
        ->Where(function($q) use ($request){
          if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('Odate','>=',$request->searchdate.'%')
               ->where('Odate','<=',$request->searchend.'%') ;
            }
          elseif($request->get('search')){
            $q ->where('Onumber','LIKE','%'.$request->search.'%')
            ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
          } 
         else{}})
        // ->whereNotIn('Odepartment', ['ธุรการ','จัดซื้อ','การเงิน','บัญชี','บุคคล','ไอที','บริหารพัฒนาผลิตภัณฑ์','เซลล์','กฏหมาย','ส่วนงานเลขานุการ','ส่วนงานบริหารงานคุณภาพ','บริหารงานโครงการ'])
        ->orderby('bookouts.id','DESC')->paginate(15);
        $bookoutrowcount = Bookout::where('Odepartment','LIKE',Auth::user()->Department)->count();

        $bookoutrowyes = Bookout::
        // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
        // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
        where('Ostatus','ต้องการหนังสือตอบกลับ')
        ->where('Odepartment','LIKE',Auth::user()->Department)
        ->Where(function($q) use ($request){
          if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('Odate','>=',$request->searchdate.'%')
               ->where('Odate','<=',$request->searchend.'%') ;
            }
          elseif($request->get('search')){
            $q ->where('Onumber','LIKE','%'.$request->search.'%')
            ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
          } 
         else{}})
        // ->whereNotIn('Odepartment', ['ธุรการ','จัดซื้อ','การเงิน','บัญชี','บุคคล','ไอที','บริหารพัฒนาผลิตภัณฑ์','เซลล์','กฏหมาย','ส่วนงานเลขานุการ','ส่วนงานบริหารงานคุณภาพ','บริหารงานโครงการ'])
        ->whereNotIn('Ostatus', ['ไม่ต้องการหนังสือตอบกลับ'])
        ->orderby('bookouts.id','DESC')->paginate(15);
        $bookoutrowyescount = Bookout::where('Ostatus','ต้องการหนังสือตอบกลับ')->where('Odepartment','LIKE',Auth::user()->Department)->count();
        
        $bookoutrowno = Bookout::
        // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
        // ->Join('forms', 'bookouts.formid', '=', 'forms.id')
        where('Ostatus','ไม่ต้องการหนังสือตอบกลับ')
        ->where('Odepartment','LIKE',Auth::user()->Department)
        ->Where(function($q) use ($request){
          if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('Odate','>=',$request->searchdate.'%')
               ->where('Odate','<=',$request->searchend.'%') ;
            }
          elseif($request->get('search')){
            $q ->where('Onumber','LIKE','%'.$request->search.'%')
            ->orwhere('Oag_receive','LIKE','%'.$request->search.'%');
          } 
         else{}})
        // ->whereNotIn('Odepartment', ['ธุรการ','จัดซื้อ','การเงิน','บัญชี','บุคคล','ไอที','บริหารพัฒนาผลิตภัณฑ์','เซลล์','กฏหมาย','ส่วนงานเลขานุการ','ส่วนงานบริหารงานคุณภาพ','บริหารงานโครงการ'])
        ->whereNotIn('Ostatus', ['ต้องการหนังสือตอบกลับ'])
        ->orderby('bookouts.id','DESC')->paginate(15);
        $bookoutrownocount = Bookout::where('Ostatus','ไม่ต้องการหนังสือตอบกลับ')->where('Odepartment','LIKE',Auth::user()->Department)->count();
        return view('user.bookout.bookout',compact('agency','bookoutrow','bookoutrowyes','bookoutrowno','bookoutrownocount','bookoutrowyescount','bookoutrowcount','depositor'))->with('agency',$agency);

    }
   
public function bookoutexport(Request $request)
    {
      $role=Auth::user()->role;
          // select search
        if ($request->isMethod('post'))
        {


            if ($request->has('search'))
            {
                // select search
                $search = $request->input('search');
                $searchdate = $request->input('searchdate');
                $searchend = $request->input('searchend');
                // user
                if($role=='0'){
                $bookoutrow = Bookout::
                // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
                // ->Join('forms', 'bookouts.formid', '=', 'forms.id')->
                where('Odepartment','LIKE',Auth::user()->Department)->Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('Odate','>=',$request->searchdate.'%')
                       ->where('Odate','<=',$request->searchend.'%') ;
                    }
                 else{}})->orderby('id','DESC')->get();
                  }
                // admin staff
                  else{
                  $bookoutrow = Bookout::
                  // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')
                  // ->Join('forms', 'bookouts.formid', '=', 'forms.id')->
                  Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('Odate','>=',$request->searchdate.'%')
                       ->where('Odate','<=',$request->searchend.'%') ;
                    }
                 else{}})->orderby('id','DESC')->get();$bookoutrow = Bookout::
                  // Join('agencies', 'bookouts.Oag_receive', '=', 'agencies.agency_id')->
                  Where(function($q) use ($request){
                   if($request->get('searchdate')&&$request->get('searchend')){
                       $q ->where('Odate','>=',$request->searchdate.'%')
                        ->where('Odate','<=',$request->searchend.'%') ;
                     }
                  else{}})->orderby('id','DESC')->get();
                  }
                return view('export.bookout.export',compact('bookoutrow'));
                // dd($request->searchdate);
            } 

            elseif ($request->has('exportPDF'))
            {
              $searchdate = $request->input('searchdate');
              $searchend = $request->input('searchend');
              // user
              if($role=='0'){
                $bookoutrow = Bookout::where('Odepartment','LIKE',Auth::user()->Department)
                ->Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('Odate','>=',$request->searchdate.'%')
                       ->where('Odate','<=',$request->searchend.'%') ;
                    }
                 else{}})->orderby('id','DESC')->get();
              }
              // staff admin
              else{
                $bookoutrow = Bookout::
                Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('Odate','>=',$request->searchdate.'%')
                       ->where('Odate','<=',$request->searchend.'%') ;
                    }
                 else{}})->orderby('id','DESC')->get();
                }
                $pdf = PDF::loadView('export.bookout.pdf', ['bookoutrow' => $bookoutrow])->setPaper('a4', 'landscape');
                $pdf->getDomPDF()->setHttpContext(
                    stream_context_create([
                        'ssl' => [
                            'allow_self_signed'=> TRUE,
                            'verify_peer' => FALSE,
                            'verify_peer_name' => FALSE,
                        ]
                    ])
                );
               return $pdf->download('รายงานหนังสือส่งออก.pdf');  
            }  
        }

            else
        {
                $search = $request->input('search');
                $searchdate = $request->input('searchdate');
                $searchend = $request->input('searchend');
              // user
              if($role=='0'){
                $bookoutrow = Bookout::
                where('Odepartment','LIKE',Auth::user()->Department)->Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('Odate','>=',$request->searchdate.'%')
                       ->where('Odate','<=',$request->searchend.'%') ;
                    }
                 else{}})->orderby('id','DESC')->get();
              }
              // staff admin
              else{
                $bookoutrow = Bookout::
                Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('Odate','>=',$request->searchdate.'%')
                       ->where('Odate','<=',$request->searchend.'%') ;
                    }
                 else{}})->orderby('id','DESC')->get();
                  }
        return view('export.bookout.export',compact('bookoutrow'));
        }
}
// update
public function bookoutadd(Request $request , $id)
    {
      $role=Auth::user()->role;
        $update = Bookout::find($id)->update([
            'Oag_receive'=>$request->Oag_receive,
            // 'Obr_receive'=>$request->Obr_receive,
            // 'Odpm_receive'=>$request->Odpm_receive,
            'Oname_receive'=>$request->Oname_receive,
            // 'Ophone'=>$request->Ophone,
            'Ostatus'=>$request->Ostatus
            // ,'Ostatus'=>$request->Ostatus
        ]);
        if($role=='0'){
          return redirect()->route('bookoutuser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
  
          }
          elseif($role=='1'){
          return redirect()->route('bookoutstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
  
          }
          elseif($role=='2'){
          return redirect()->route('bookoutadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
          }
          return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }


public function edit($id){
      $bookout = Bookout::find($id);
      $agency = agency::all();
      $transports = transport::all();
      return view('bookout.edit',compact('bookout','agency','transports'));
  }


public function addsendbook(Request $request)
    {
      return view('bookout.addsendbook');
    }
    

public function store(Request $request)
    {
      $role=Auth::user()->role;
        $bookout = new Bookout();
        $bookout->user_id = Auth::user()->id;
        $bookout->Oname = Auth::user()->name.' '.Auth::user()->Lastname; 
        $bookout->Odate = $request->Odate;
        $bookout->Oagency =Auth::user()->Agency;
        $bookout->Odepartment = Auth::user()->Department;
        $bookout->Obranch = Auth::user()->Branch;
        // $bookout->Obr_receive = $request->Obr_receive;
        $bookout->Oag_receive = $request->Oag_receive;
        // $bookout->Odpm_receive = $request->Odpm_receive;
        $bookout->Oname_receive = $request->Oname_receive;
        // $bookout->Ophone = $request->Ophone;
        $bookout->Onumber = $request->Onumber;
        $bookout->formid = $request->formid;
        $bookout->Ostatus = $request->Ostatus;
        $bookout ->save();

        $transport = new transport();
        $transport->trbookout = $bookout->id;
        $transport->formid = $request->formid;
        $transport->trdate = $request->trdate;
        $transport->trnumber = $request->trnumber;
        $transport->trdepositor = $request->trdepositor;
        $transport->trtaye = $request->trtaye;
        $transport->trdepartment = Auth::user()->Department;
        $transport->trbranch= Auth::user()->Branch;
        $transport->tragency = Auth::user()->Agency;
        $transport->user_id =  Auth::user()->id;
        $transport->trsender = Auth::user()->name.' '.Auth::user()->Lastname ;
        $transport->trsid = '1';  
        $transport->save();
        // dd($request);
        if($role=='0'){
          return redirect()->route('bookoutuser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
  
          }
          elseif($role=='1'){
          return redirect()->route('bookoutstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
  
          }
          elseif($role=='2'){
          return redirect()->route('bookoutadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
          }
          return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
}
//เพิ่มหนังสือตอบกลับ
public function statusbookout(Request $request,$id)
  {
     //ตรวจสอบข้อมูล
     $request->validate(
      [
          'File'=>'required|mimes:pdf,jpg,jpeg,png'
      ],
      [
          'File.required'=>"กรุณาเพิ่มไฟล์ PDF,JPG,JPEG,PNG",
          'File.mimes'=>"ไม่สามารถเพิ่มข้อมูลได้กรุณาเพิ่มไฟล์ PDF,JPG,JPEG,PNG"
      ]
     );


  //การเข้ารหัสรูปภาพ
  $File = $request->file('File');

  //อัพเดตภาพ
  if($File){

    $input = $request->all();
    $destinationPath = 'files/file/';
    $profileImage = date('YmdHis') . "." . $File->getClientOriginalExtension();
    $File->move($destinationPath, $profileImage);
    $input['Oupload'] = "$profileImage";

  //อัพเดตข้อมูล
  Bookout::find($id)->update([
    'Oupload'=>$profileImage,
    ]);

      //ลบภาพเก่าและอัพภาพใหม่แทนที่ยังไม่ได้ เวลาอัพโหลดชื่อไฟล์มันจะอัพเดรตเป็นชื่อใหม่เลย
      // $old_image = $request->old_image;
      // unlink($old_image);
      // $File->move($destinationPath,$profileImage);
      return redirect()->back()->with('success',"อัพเดตภาพเรียบร้อย");
      }
  }

public function adddepositor(Request $request)
 {
    $depositor = new depositor();
    $depositor-> depositor_name = $request->depositor_name;
    $depositor ->save();
    return redirect()->route('addsendbook');
 }


// ไม่ใช้แล้ว
public function getbranch(Request $request)
    {
       
     $cid=$request->post('cid'); 
     if($cid=='1'){
        $branch= branch::where('agency',1)->get();
        $html='<option value="{{ $bookout->Obr_receive}}" >กรุณาเลือกสาขา</option>';
        foreach($branch as $branchs){
        $html.='<option value="'.$branchs->branche_id.'">'.$branchs->branche_name.'</option>';
        echo $html;
        }} //สำนักงานใหญ่
    elseif($cid=='4'){
        $branch= branch::where('agency',4)->get();
        $html='<option value="{{ $bookout->Obr_receive}}">กรุณาเลือกสาขา</option>';
        foreach($branch as $branchs){
        $html.='<option value="'.$branchs->branche_id.'">'.$branchs->branche_name.'</option>';
        echo $html;
        }}//ศูนย์อบรม
     else{
     $branch= branch::where('agency',$cid)->get();
     $html='<option value="{{ $bookout->Obr_receive}}">กรุณาเลือกสาขา</option>';
     foreach($branch as $list){
     $html.='<option value="'.$list->branche_id.'">'.$list->branche_name.'</option>';
     }
     echo  $html;
    }}

    
public function getdepartment(Request $request)
    {
     $sid=$request->post('sid');
     if($sid=='12'){
        $department= Department::where('branch',0)->get();
        $html='<option value="{{ $bookout->Odpm_receive}}">กรุณาเลือกฝ่าย</option>';
        foreach($department as $list){
        $html.='<option value="{{ $bookout->Odpm_receive}}'.$list->Dpmid.'">'.$list->Dpmname.'</option>';
        }
        echo  $html;
        }

     else{
     $department= Department::where('branch',$sid)->get();
     $html='<option value="{{ $bookout->Odpm_receive}}">กรุณาเลือกฝ่าย</option>';
     foreach($department as $list){
     $html.='<option value="'.$list->Dpmid.'">'.$list->Dpmname.'</option>';
     }
     echo  $html;
    }}






//exportword
}
