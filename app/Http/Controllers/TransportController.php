<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transport;
use App\Models\Bookout;
use App\Models\service;
use App\Models\depositor;
use App\Models\User;
use App\Models\transport_type;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\support\Facades\DB; 

class TransportController extends Controller
{
public function transportadmin(Request $request)
  {

      $search = $request->input('search');
      $searchdate = $request->input('searchdate');
      $searchend = $request->input('searchend');

      $transport= transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
      ->select('transports.*')->
      Where(function($q) use ($request){
      if($request->get('searchdate')&&$request->get('searchend')){
          $q ->where('trdatesent','>=',$request->searchdate.'%')
           ->where('trdatesent','<=',$request->searchend.'%') ;
        }
      elseif($request->get('search')){
        $q ->where('trnumber','LIKE','%'.$request->search.'%')
        ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
        ->orwhere('ttransport','LIKE','%'.$request->search.'%');
      } else{}})->orderby('id','DESC')->paginate(15, ['*'], 'transport');  

      $transportwait= transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
      ->select('transports.*')->
      where('trsid','1')
      ->where('trnumber','LIKE','%'.$request->search.'%')
      ->orWhere(function($q) use ($request){
        $q->orwhere('ttransport', 'LIKE', '%' . $request->search . '%')
        ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
          ;
       }) 
      ->whereNotIn('trsid', ['2','3','4'])
      ->orderby('id','DESC')->paginate(15, ['*'], 'transportwait');  

      $transportexecuted= transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
      ->select('transports.*')->
      where('trsid','3')
      ->where('trnumber','LIKE','%'.$request->search.'%')
      ->orWhere(function($q) use ($request){
        $q->orwhere('ttransport', 'LIKE', '%' . $request->search . '%')
        ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
          ;
       }) 
      ->whereNotIn('trsid', ['2','1','4'])
      ->orderby('id','DESC')->paginate(15, ['*'], 'transportexecuted');  

      $service = service::all();
      $depositor=depositor::all();
      $transportcount = transport::all()->count();
      $transportwaitcount= transport::where('trsid','1')->count();
      $transportexecutedcount= transport::where('trsid','3')->count();
      return view('admin.transport.transport',compact('transport','service','depositor','transportcount','transportwait','transportexecuted','transportwaitcount','transportexecutedcount'));
  }
public function transportuser(Request $request)
    {
      $transportcount = transport::all()->count();
      $depositor = depositor::all();
      $transport_types = transport_type::all();
      $service = service::all();
      $transportwaitcount= transport::where('trsid','1')->count();
      $transportexecutedcount= transport::where('trsid','3')->count();
      $search = $request->input('search');
        $searchdate = $request->input('searchdate');
        $searchend = $request->input('searchend');
    //   $transport= transport::all();
      $dpm=Auth::user()->Department;

        $transport = transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
        ->select('transports.*')->where('trdepartment','LIKE',Auth::user()->Department)
       ->Where(function($q) use ($request){
        if($request->get('searchdate')&&$request->get('searchend')){
            $q ->where('trdatesent','>=',$request->searchdate.'%')
             ->where('trdatesent','<=',$request->searchend.'%') ;
          }
        elseif($request->get('search')){
          $q ->where('trnumber','LIKE','%'.$request->search.'%')
          ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
          ->orwhere('ttransport','LIKE','%'.$request->search.'%');
        } 
       else{}})
        // ->whereNotIn('trdepartment', ['ธุรการ','การเงิน','จัดซื้อ','บัญชี','บุคคล','ไอที','บริหารพัฒนาผลิตภัณฑ์','เซลล์','กฏหมาย','ส่วนงานเลขานุการ','ส่วนงานบริหารงานคุณภาพ','บริหารงานโครงการ'])
        ->orderby('id','DESC')->paginate(10);
        $transportcount = transport::where('trdepartment','LIKE',Auth::user()->Department)->count();
        return view('user.transport.transport',compact('transport','service','depositor','transportcount','transportwaitcount','transportexecutedcount'));
    }

public function transportstaff(Request $request)
    {

        $search = $request->input('search');
        $searchdate = $request->input('searchdate');
        $searchend = $request->input('searchend');

        $transport= transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
        ->select('transports.*')->
        Where(function($q) use ($request){
        if($request->get('searchdate')&&$request->get('searchend')){
            $q ->where('trdatesent','>=',$request->searchdate.'%')
             ->where('trdatesent','<=',$request->searchend.'%') ;
          }
        elseif($request->get('search')){
          $q ->where('trnumber','LIKE','%'.$request->search.'%')
          ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
          ->orwhere('ttransport','LIKE','%'.$request->search.'%');
        } 
       else{}})
        ->orderby('id','DESC')->paginate(15, ['*'], 'transport');  

        $transportwait= transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
        ->select('transports.*')->
        where('trsid','1')
        ->where('trnumber','LIKE','%'.$request->search.'%')
        ->orWhere(function($q) use ($request){
          $q->orwhere('ttransport', 'LIKE', '%' . $request->search . '%')
          ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
          ;
         }) 
        ->whereNotIn('trsid', ['2','3','4'])
        ->orderby('id','DESC')->paginate(15, ['*'], 'transportwait');  

        $transportexecuted= transport::Join('bookouts', 'transports.trbookout', '=', 'bookouts.id')
        ->select('transports.*')->
        where('trsid','3')
        ->where('trnumber','LIKE','%'.$request->search.'%')
        ->orWhere(function($q) use ($request){
          $q->orwhere('ttransport', 'LIKE', '%' . $request->search . '%')
          ->orwhere('Oname_receive','LIKE','%'.$request->search.'%')
          ;
         }) 
        ->whereNotIn('trsid', ['2','1','4'])
        ->orderby('id','DESC')->paginate(15, ['*'], 'transportexecuted');  

        $service = service::all();
        $depositor=depositor::all();
        $transportcount = transport::all()->count();
        $transportwaitcount= transport::where('trsid','1')->count();
        $transportexecutedcount= transport::where('trsid','3')->count();
        return view('staff.transport.transport',compact('transport','service','depositor','transportcount','transportwait','transportexecuted','transportwaitcount','transportexecutedcount'));
    }

public function transportexport(Request $request)
    {
      $role=Auth::user()->role;
          // select search
        if ($request->isMethod('post'))
        {
            if ($request->has('search'))
            {
                // select search
                $depositors = depositor::all();
                $transport_types = transport_type::all();
                $user = User::all();
                $search = $request->input('search');
                $searchdate = $request->input('searchdate');
                $searchend = $request->input('searchend');
                // ถ้าเป็น user
                if($role=='0'){
                $transport = transport::where('trdepartment','LIKE',Auth::user()->Department)->
                  Where(function($q) use ($request){
                    if($request->get('searchdate')&&$request->get('searchend')){
                      $q ->where('trdatesent','>=',$request->searchdate.'%')
                      ->where('trdatesent','<=',$request->searchend.'%') ;
                    }
                  else{} })->where('trsid','3')->orderby('id','DESC')->get();
                }
                // admin staff
                else{
                $transport = transport::
                Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                    $q ->where('trdatesent','>=',$request->searchdate.'%')
                    ->where('trdatesent','<=',$request->searchend.'%') ;
                  }
                else{} })->where('trsid','3')->orderby('id','DESC')->get();
                }
                return view('export.transport.export',compact('transport','user','depositors','transport_types'));
                // dd($request->searchdate);
            } 
            elseif ($request->has('exportPDF'))
            {
                // select PDF
                $searchdate = $request->input('searchdate');
                $searchend = $request->input('searchend');
                // ถ้าเป็น user
                if($role=='0'){
                  $transport = transport::where('trdepartment','LIKE',Auth::user()->Department)->
                    Where(function($q) use ($request){
                      if($request->get('searchdate')&&$request->get('searchend')){
                        $q ->where('trdatesent','>=',$request->searchdate.'%')
                        ->where('trdatesent','<=',$request->searchend.'%') ;
                      }
                    else{} })->where('trsid','3')->orderby('id','DESC')->get();
                  }
                  // admin staff
                  else{
                $transport = transport::
                Where(function($q) use ($request){
                  if($request->get('searchdate')&&$request->get('searchend')){
                    $q ->where('trdatesent','>=',$request->searchdate.'%')
                    ->where('trdatesent','<=',$request->searchend.'%') ;
                  }
                else{} })->where('trsid','3')->orderby('id','DESC')->get();
                  }
                $pdf = PDF::loadView('export.transport.pdf', ['transport' => $transport])->setPaper('a4', 'landscape');
                $pdf->getDomPDF()->setHttpContext(
                    stream_context_create([
                        'ssl' => [
                            'allow_self_signed'=> TRUE,
                            'verify_peer' => FALSE,
                            'verify_peer_name' => FALSE,
                        ]
                    ])
                );
               return $pdf->download('รายงานการขนส่ง.pdf');  
              // dd($pdf);
            }  
        }
            else
        {
          $depositors = depositor::all();
          $transport_types = transport_type::all();
          $user = User::all();
          $search = $request->input('search');
          $searchdate = $request->input('searchdate');
          $searchend = $request->input('searchend');
          $method = $request->method();
          // ถ้าเป็น user
          if($role=='0'){
            $transport = transport::where('trdepartment','LIKE',Auth::user()->Department)->
              Where(function($q) use ($request){
                if($request->get('searchdate')&&$request->get('searchend')){
                  $q ->where('trdatesent','>=',$request->searchdate.'%')
                  ->where('trdatesent','<=',$request->searchend.'%') ;
                }
              else{} })->where('trsid','3')->orderby('id','DESC')->get();
            }
            // admin staff
            else{
          $transport = transport::
          Where(function($q) use ($request){
            if($request->get('searchdate')&&$request->get('searchend')){
              $q ->where('trdatesent','>=',$request->searchdate.'%')
              ->where('trdatesent','<=',$request->searchend.'%') ;
            }
          else{ }
          })->where('trsid','3')->orderby('id','DESC')->get();
        }
        return view('export.transport.export',compact('transport','user','depositors','transport_types'));
        }
      }

public function edittransport($id)
    {
        $transport= transport::find($id);  
        $depositor=depositor::all();
        $transport_types = transport_type::all();
        return view('transport.edit',compact('transport','depositor','transport_types'));
    }

// user update
public function updatetransport(Request $request , $id)
    {
      $role=Auth::user()->role;
        $update = transport::find($id)->update([
            'trdate'=>$request->trdate,
            'trdepositor'=>$request->trdepositor,
            'trtaye'=>$request->trtaye
        ]);
        if($role=='0'){
        return redirect()->route('transportuser')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;

        }
        elseif($role=='1'){
        return redirect()->route('transportstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;

        }
        elseif($role=='2'){
        return redirect()->route('transportadmin')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
        }
        return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }

// staff update
public function transportadd(Request $request , $id)
    {
        $update = transport::find($id)->update([
            'trdelivery'=>$request->trdelivery,
            'trdatesent'=>$request->trdatesent,
            'ttransport'=>$request->ttransport,
            'trservice'=>$request->trservice,
            'trsid'=>$request->trsid
        ]);
        return redirect()->back()->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
        // return redirect()->route('transportstaff')->with('success',"อัพเดตข้อมูลเรียบร้อย") ;
    }

 
// add ผู้ฝากส่ง modal
public function adddepositor1(Request $request)
    {
        $depositor = new depositor();
        $depositor-> depositor_name = $request->depositor_name;
        $depositor ->save();
        return redirect()->back();
    }
}
