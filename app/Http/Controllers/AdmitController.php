<?php

namespace App\Http\Controllers;

use App\Models\admitstory;
use Illuminate\Http\Request;
use App\Models\branch;
use Illuminate\support\Facades\DB; 
use App\Models\agency;
use App\Models\admitagency;
use App\Models\Department;
use App\Models\User;
use App\Models\admit;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdmitController extends Controller
{
public function admituser(Request $request)
    {
        $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')->select('admits.Estatus')->get();
        $agency = agency::all();
        $admitstory = admitstory::all();
        $admitagency = admitagency::all();
        $dpm=Auth::user()->Department;
        $searchdate = $request->input('searchdate');
        $searchend = $request->input('searchend');
        $search = $request->input('search');

        $tb1 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','1')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } 
           else{}}) //หน่วยงาน
        // ->whereNotIn('Edepartment_receive', [1,2,3,4,5,6,8,9,10,11,12,13,14])
        ->whereNotIn('Estatus', [2,3,4])
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb1');
        $tb1count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','1')->count();

        $tb2 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','2')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } 
           else{}}) //หน่วยงาน
        // ->whereNotIn('Edepartment_receive', [1,2,3,4,5,6,8,9,10,11,12,13,14])
        ->whereNotIn('Estatus', [1,3,4])
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb2');
        $tb2count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','2')->count();

        $tb3 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','3')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } 
           else{}})
        // ->whereNotIn('Edepartment_receive', [1,2,3,4,5,6,8,9,10,11,12,13,14])
        ->whereNotIn('Estatus', [1,2,4])
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb3');
        $tb3count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','3')->count();

        $tb4 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','4')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } 
           else{}})
        // ->whereNotIn('Edepartment_receive', [1,2,3,4,5,6,8,9,10,11,12,13,14])
        ->whereNotIn('Estatus', [1,2,3])
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb4');
        $tb4count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','4')->count();
        return view('user.admit.admit',compact('admit','tb1','tb2','tb3','tb4','tb1count','tb2count','tb3count','tb4count','agency','admitstory','admitagency'));
    }
public function statuswait(Request $request , $id)
  {
    $role=Auth::user()->role; 
        foreach(request()->input('chk', []) as $index => $chk) {
    $update = admit::find($index)->update([
        // 'item_id' => request()->input('item_id')[$index],
        'Estatus'=>$request->chk[$index] //สถานะไปรอตอบรับ 2
    ]);
  }
    // dd($request->chk);
    return redirect()->back()->with('success',"อัพเดตภาพเรียบร้อย");


       
 }
public function pdfexport(Request $request)
 {
    $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')->select('admits.Estatus')->get();
    $agency = agency::all();
    $admitstory = admitstory::all();
    $admitagency = admitagency::all();
    $searchdate = $request->input('searchdate');
    $searchend = $request->input('searchend');

    $tb3 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
    ->select('admits.*')->where('Estatus','3')
    ->whereBetween('Edate_receive',[ $searchdate,$searchend])
    ->orderby('id','DESC')->get();
    $pdf = PDF::loadView('user.admit.export', compact('admit','tb3','agency','admitstory','admitagency'));
    $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ])
    );
    return $pdf->download('form.pdf');
 }
public function admitfile($id)
    {

        $admit = admit::find($id);
        return view('admit.fileadmit',compact('admit'));
    }

public function updatefile(Request $request,$id)
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

  $File = $request->file('File');
  if($File){
    $role=Auth::user()->role; 
    $input = $request->all();
    $destinationPath = 'files/file/';
    $Efile = date('YmdHis') . "." . $File->getClientOriginalExtension();
    $File->move($destinationPath, $Efile);
    $input['Efile'] = "$Efile";
     Admit::find($id)->update([
    'Efile'=>$Efile,
    ]);
    if($role=='0'){
        return redirect()->route('admituser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;

        }
        elseif($role=='1'){
        return redirect()->route('admitstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;

        }
        elseif($role=='2'){
        return redirect()->route('admitadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
        }
      }
 }

public function admitexport(Request $request)
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

                if($role=='0'){
                $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
                ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','3')
                ->Where(function($q) use ($request){
                    if($request->get('searchdate')&&$request->get('searchend')){
                        $q ->where('Edate_out','>=',$request->searchdate.'%')
                        ->where('Edate_out','<=',$request->searchend.'%') ;
                    }
                    })->orderby('id','DESC')->get();
                            }

                // admin staff
                else{
                $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
                ->select('admits.*')->where('Estatus','3')
                ->Where(function($q) use ($request){
                    if($request->get('searchdate')&&$request->get('searchend')){
                        $q ->where('Edate_out','>=',$request->searchdate.'%')
                        ->where('Edate_out','<=',$request->searchend.'%') ;
                    }
                    })->whereNotIn('Estatus', [1,2,4])     
                ->orderby('id','DESC')->get();
                    }

                        return view('export.admit.export',compact('admit'));
                        // dd($request->searchdate);
                    } 
                    
                    elseif ($request->has('exportPDF'))
                    {
                // user
                if($role=='0'){
                $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
                ->select('admits.*')->where('Estatus','3')
                ->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)
                ->Where(function($q) use ($request){
                    if($request->get('searchdate')&&$request->get('searchend')){
                        $q ->where('Edate_out','>=',$request->searchdate.'%')
                        ->where('Edate_out','<=',$request->searchend.'%') ;
                    }
                    })->orderby('id','DESC')->get();
                            }
                    // staff admin
                    else{
                    $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
                   ->select('admits.*')->where('Estatus','3')
                   ->Where(function($q) use ($request){
                    if($request->get('searchdate')&&$request->get('searchend')){
                        $q ->where('Edate_out','>=',$request->searchdate.'%')
                        ->where('Edate_out','<=',$request->searchend.'%') ;
                    }
                    })->whereNotIn('Estatus', [1,2,4])->orderby('id','DESC')->get();
                    }
                        $pdf = PDF::loadView('export.admit.pdf', ['admit' => $admit])->setPaper('a4', 'landscape');
                        $pdf->getDomPDF()->setHttpContext(
                            stream_context_create([
                                'ssl' => [
                                    'allow_self_signed'=> TRUE,
                                    'verify_peer' => FALSE,
                                    'verify_peer_name' => FALSE,
                                ]
                            ])
                        );
                    return $pdf->download('รายงานหนังสือเข้า.pdf');  
                    }  
                }
        // else ($request->isMethod('post'))
        else
        {
          $search = $request->input('search');
          $searchdate = $request->input('searchdate');
          $searchend = $request->input('searchend');
          if($role=='0'){
            $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
            ->select('admits.*')->where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','3')
           ->Where(function($q) use ($request){
               if($request->get('searchdate')&&$request->get('searchend')){
                   $q ->where('Edate_out','>=',$request->searchdate.'%')
                   ->where('Edate_out','<=',$request->searchend.'%') ;
               }
               })->orderby('id','DESC')->get();
                       }
           // admin staff
           else{
          $method = $request->method();
          $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
          ->select('admits.*')->where('Estatus','3')
          ->Where(function($q) use ($request){
              if($request->get('searchdate')&&$request->get('searchend')){
                  $q ->where('Edate_out','>=',$request->searchdate.'%')
                  ->where('Edate_out','<=',$request->searchend.'%') ;
              }
              })->whereNotIn('Estatus', [1,2,4])     
          ->orderby('id','DESC')->get();
            }
        return view('export.admit.export',compact('admit'));
      }

      }

public function statusaccept(Request $request , $id)
    {
    date_default_timezone_set("Asia/Bangkok");
    $myDate= date('Y-m-d');
    $myYear = date('Y', strtotime($myDate));
    $myYearBuddhist = $myYear + 543;
    $update = admit::find($id)->update([
        'Enamereply'=>$request->Enamereply,
        'Edatereply'=>date("d-m-", strtotime($myDate)).$myYearBuddhist,
        'Etimereply'=>date("H:i:s"),
        'Estatus'=>$request->Estatus //สถานะไปตอบรับ 3

    ]);
    // dd($request->chk);
    return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
 }

public function statusno(Request $request , $id)
    {
    $update = admit::find($id)->update([
        'Enote'=>$request->Enote,
        'Estatus'=>'4' //สถานะไปรอตอบรับ 2
    ]);
    // dd($request->chk);
    return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
 }

public function admitstaff(Request $request)
    {
        $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')->select('admits.Estatus')->get();
        $agency = agency::all();
        $admitstory = admitstory::all();
        $admitagency = admitagency::all();
        $search = $request->input('search');
        $searchdate = $request->input('searchdate');
        $searchend = $request->input('searchend');

        $tb1 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','1')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } 
           else{}})->whereNotIn('Estatus', [2,3,4])      
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb1');
        $tb1count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','1')->count();

        $tb2 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','2')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            }else{}})->whereNotIn('Estatus', [1,3,4])
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb2');
        $tb2count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','2')->count();

        $tb3 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','3')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            }else{}})->whereNotIn('Estatus', [1,2,4])     
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb3');
        $tb3count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','3')->count();

        $tb4 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','4')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } else{}})->whereNotIn('Estatus', [1,2,3])    
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb4');
        $tb4count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','4')->count();

        return view('staff.admit.admit',compact('admit','tb1','tb2','tb3','tb4','tb1count','tb2count','tb3count','tb4count','agency','admitstory','admitagency'));
    }

public function admitadmin(Request $request)
    {
        $admit = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')->select('admits.Estatus')->get();
        $agency = agency::all();
        $admitstory = admitstory::all();
        $admitagency = admitagency::all();
        $search = $request->input('search');
        $searchdate = $request->input('searchdate');
        $searchend = $request->input('searchend');

        $tb1 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','1')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } 
           else{}})->whereNotIn('Estatus', [2,3,4])      
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb1');
        $tb1count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','1')->count();

        $tb2 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','2')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            }else{}})->whereNotIn('Estatus', [1,3,4])
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb2');
        $tb2count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','2')->count();

        $tb3 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','3')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            }else{}})->whereNotIn('Estatus', [1,2,4])     
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb3');
        $tb3count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','3')->count();

        $tb4 = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','4')
        ->Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
                $q ->where('Edate_out','>=',$request->searchdate.'%')
                 ->where('Edate_out','<=',$request->searchend.'%') ;
              }
            elseif($request->get('search')){
              $q ->where('Ebook_receipt','LIKE','%'.$request->search.'%')
              ->orwhere('Ebookeagency','LIKE','%'.$request->search.'%');
            } else{}})->whereNotIn('Estatus', [1,2,3])    
        ->orderby('id','DESC')->paginate(15, ['*'], 'tb4');
        $tb4count = admit::Join('statuses', 'admits.Estatus', '=', 'statuses.Sid')
        ->select('admits.*')->where('Estatus','4')->count();

        return view('admin.admit.admit',compact('admit','tb1','tb2','tb3','tb4','tb1count','tb2count','tb3count','tb4count','agency','admitstory','admitagency'));
    }


// editadmit get
public function editpageadmit($id)
    {
        $admit = admit::find($id);
        $agency = agency::all();
        $story = admitstory::all();
        $admitagency = admitagency::all();
        $admitcount = admit::all()->count();
        return view('admit.edit',compact('admit','agency','story','admitagency','admitcount'));
    }
// updateadmit post
public function editadmit(Request $request , $id)
    {
        $role=Auth::user()->role; 
        $update = admit::find($id)->update([
            'Eagency_receive'=>$request->Eagency_receive,
            'Ebranch_receive'=>$request->Ebranch_receive,
            'Edepartment_receive'=>$request->Edepartment_receive,
            'Ename_receive'=>$request->Ename_receive,
            'Edate_receive'=>$request->Edate_receive,
            'Edate_out'=>$request->Edate_out,       
            'Esubject'=>$request->Esubject,                    
            'Ebookeagency'=>$request->Ebookeagency,
            'Ebook_receipt'=>$request->Ebook_receipt,
            'Estatus'=>1
            // ,'Ostatus'=>$request->Ostatus
        ]);
        
        if($role=='0'){
            return redirect()->route('admituser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    
            }
            elseif($role=='1'){
            return redirect()->route('admitstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    
            }
            elseif($role=='2'){
            return redirect()->route('admitadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
            }
            return redirect()->back();
    }


          
//เริ่มหน้าaddbook
public function getbranch(Request $request)
    {
       
  $cid=$request->post('cid'); 
    //  if($cid=='1'){
    //     $branch= branch::where('agency',1)->get();
    //     $html='<option value="" >กรุณาเลือกสาขา</option>';
    //     foreach($branch as $branchs){
    //     $html.='<option value="'.$branchs->branche_id.'">'.'สำนักงานใหญ่'.'</option>';
    //     echo $html;
    //     }} //สำนักงานใหญ่
    // elseif($cid=='4'){
    //     $branch= branch::where('agency',4)->get();
    //     $html='<option value="" >กรุณาเลือกสาขา</option>';
    //     foreach($branch as $branchs){
    //     $html.='<option value="'.$branchs->branche_id.'">'.$branchs->branche_name.'</option>';
    //     echo $html;
    //     }}//ศูนย์อบรม
    //  else{
     $branch= branch::where('agency',$cid)->get();
     $html='<option value="" >กรุณาเลือกสาขา</option>';
     foreach($branch as $list){
     $html.='<option value="'.$list->branche_id.'">'.$list->branche_name.'</option>';
     }
     echo  $html;
    // }
}

    
public function getdepartment(Request $request)
    {
     $sid=$request->post('sid');
    //  if($sid=='12'){
    //     $department= Department::where('branch',0)->get();
    //     $html='<option value="">กรุณาเลือกฝ่าย</option>';
    //     foreach($department as $list){
    //     $html.='<option value="'.$list->Dpmid.'">'.$list->Dpmname.'</option>';
    //     }
    //     echo  $html;
    //     }

    //  else{
     $department= Department::where('branch',$sid)->get();
     $html='<option value="">กรุณาเลือกฝ่าย</option>';
     foreach($department as $list){
     $html.='<option value="'.$list->Dpmid.'">'.$list->Dpmname.'</option>';
     }
     echo  $html;
    // }
 }


// addbook get
public function addbook()
    {
        $agency = agency::all();
        $story = admitstory::all();
        $admitagency = admitagency::all();
        $admitcount = admit::all()->count();
        return view('admit.addbook',compact('agency','story','admitagency','admitcount'));
    }

//บันทึกข้อมูลหนังสือ addbook post
public function store(Request $request){
        $role=Auth::user()->role; 
        //บันทึกข้อมูล
        $data = array();
        $data["Ename"] = Auth::user()->name.' '.Auth::user()->Lastname;
        $data["Eagency"] = Auth::user()->Agency;
        $data["Edepartmentbranch"] = Auth::user()->Department.'/'.Auth::user()->Branch;
        $data["Edate_receive"] = $request->Edate_receive;
        $data["Edate_out"] = $request->Edate_out;
        $data["Eagency_receive"] = $request->Eagency_receive;
        $data["Ebranch_receive"] = $request->Ebranch_receive;
        $data["Edepartment_receive"] = $request->Edepartment_receive;
        $data["Ename_receive"] = $request->Ename_receive;
        $data["Ebookeagency"] = $request->Ebookeagency;
        $data["Esubject"] = $request->Esubject;
        $data["Ebook_receipt"] = $request->Ebook_receipt;
        $data["Ebooknumber"] = $request->Ebooknumber;
        $data["Estatus"] = $request->Estatus;

        //query builderEbook_receipt
        DB::table('admits')->insert($data);
        // dd($data);
        if($role=='0'){
            return redirect()->route('admituser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    
            }
            elseif($role=='1'){
            return redirect()->route('admitstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    
            }
            elseif($role=='2'){
            return redirect()->route('admitadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
            }
            return redirect()->back();
    }

public function addagency(Request $request)
 {
    $amagency = new admitagency();
    $amagency-> amagency_name = $request->amagency_name;
    $amagency ->save();
    return redirect()->route('addbook');
 }
public function addstory(Request $request)
 {
    $amstory = new admitstory();
    $amstory-> amstory_name = $request->amstory_name;
    $amstory ->save();
    return redirect()->route('addbook');
 }

  
}
