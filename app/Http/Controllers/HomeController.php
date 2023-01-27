<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\branch;
use Illuminate\support\Facades\DB; 
use App\Models\agency;
use App\Models\admitagency;
use App\Models\Department;
use App\Models\User;
use App\Models\admit;
use App\Models\Bookout;
use App\Models\transport;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    public function index(){
       $role=Auth::user()->role;

       if($role=='0')
       {
        $admitcount = admit::where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','1')->orderby('Edate_out','DESC')->count();
        $admit = admit::where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)->where('Estatus','1')->orderby('Edate_out','DESC')->limit(1)->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('Odepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('Odepartment','LIKE',Auth::user()->Department)
        ->where('trsid','1')->orderby('date','DESC')->limit(1)->get();
        $transportcount = transport::where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
        $transport = transport::where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->orderby('trdate','DESC')->limit(1)->get();
        return view('user.home',compact('admitcount','bookoutcount','transportcount','admit','bookout','transport'));
       }

       elseif($role=='1')
       {
        $admitcount = admit::where('Estatus','1')->orderby('Edate_out','DESC')->count();
        $admit = admit::where('Estatus','1')->orderby('Edate_out','DESC')->limit(1)->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('trsid','1')->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('trsid','1')->orderby('date','DESC')->limit(1)->get();
        $transportcount = transport::where('trsid','1')->count();
        $transport = transport::where('trsid','1')->orderby('trdate','DESC')->limit(1)->get();
        return view('staff.home',compact('admitcount','bookoutcount','transportcount','admit','bookout','transport'));
       }

       elseif($role=='2')
       {
        
        $admitcount = admit::where('Estatus','1')->orderby('Edate_out','DESC')->count();
        $admit = admit::where('Estatus','1')->orderby('Edate_out','DESC')->limit(1)->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('trsid','1')->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('trsid','1')->orderby('date','DESC')->limit(1)->get();
        $transportcount = transport::where('trsid','1')->count();
        $transport = transport::where('trsid','1')->orderby('trdate','DESC')->limit(1)->get();
       return view('admin.home',compact('admitcount','bookoutcount','transportcount','admit','bookout','transport'));
       }

    }

    public function home()
    {
        $role=Auth::user()->role;

        if($role=='0')
        {
        $admitcount = admit::where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)
        ->Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->orderby('Edate_out','DESC')->count();
        $admit = admit::where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)
        ->Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->orderby('Edate_out','DESC')->limit(1)->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('Odepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('Odepartment','LIKE',Auth::user()->Department)->where('trsid','1')->orderby('date','DESC')->limit(1)->get();
        $transportcount = transport::where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
        $transport = transport::where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->orderby('trdate','DESC')->limit(1)->get();
            return view('user.home',compact('admitcount','bookoutcount','transportcount','admit','bookout','transport'));
        }
 
        elseif($role=='1')
        {
            $admitcount = admit::Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->orderby('Edate_out','DESC')->count();
            $admit = admit::Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->orderby('Edate_out','DESC')->limit(1)->get();
            $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('trsid','1')->count();
            $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
            ->where('trsid','1')->orderby('date','DESC')->limit(1)->get();
            $transportcount = transport::where('trsid','1')->count();
            $transport = transport::where('trsid','1')->orderby('trdate','DESC')->limit(1)->get();
         return view('staff.home',compact('admitcount','bookoutcount','transportcount','admit','bookout','transport'));
        }
 
        elseif($role=='2')
        {
            $admitcount = admit::Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->orderby('Edate_out','DESC')->count();
            $admit = admit::Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->orderby('Edate_out','DESC')->limit(1)->get();
            $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('trsid','1')->count();
            $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
            ->where('trsid','1')->orderby('date','DESC')->limit(1)->get();
            $transportcount = transport::where('trsid','1')->count();
            $transport = transport::where('trsid','1')->orderby('trdate','DESC')->limit(1)->get();
        return view('admin.home',compact('admitcount','bookoutcount','transportcount','admit','bookout','transport'));
        }
    } 
}
