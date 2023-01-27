<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use Illuminate\support\Facades\DB; 
use App\Models\agency;
use App\Models\admitagency;
use App\Models\Department;
use App\Models\User;
use App\Models\admit;
use App\Models\Bookout;
use App\Models\transport;
use Illuminate\Support\Facades\Auth;

class WarnController extends Controller
{
    public function warn()
    {
        $role=Auth::user()->role;
        // user
        if($role=='0')
        {
        $admit = admit::where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)
        ->Where(function($q) {
                $q ->where('Estatus','1')
                 ->orwhere('Estatus','4') ;
            })->orderby('Edate_out','DESC')->get();
        $admitcount = admit::where('Edepartment_receive','LIKE',Auth::user()->department->Dpmid)
        ->Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')
        ->where('Odepartment','LIKE',Auth::user()->Department)->where('trsid','1')->orderby('date','DESC')->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('Odepartment','LIKE',Auth::user()->Department)
        ->where('trsid','1')->count();
        $transport = transport::where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->orderby('trdate','DESC')->get();
        $transportcount = transport::where('trdepartment','LIKE',Auth::user()->Department)->where('trsid','1')->count();
        }
        // staff admin
        else
        {
        $admit = admit::Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->orderby('Edate_out','DESC')->get();
        $admitcount = admit::Where(function($q) {
            $q ->where('Estatus','1')
             ->orwhere('Estatus','4') ;
        })->count();
        $bookout = Bookout::Join('forms', 'bookouts.formid', '=', 'forms.id')->Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('trsid','1')->orderby('date','DESC')->get();
        $bookoutcount = Bookout::Join('transports', 'bookouts.id', '=', 'transports.trbookout')->where('trsid','1')->count();
        $transport = transport::where('trsid','1')->orderby('trdate','DESC')->get();
        $transportcount = transport::where('trsid','1')->count();
        }
        return view('warn.warn',compact('admit','bookout','transport','admitcount','bookout','bookoutcount','transport','transportcount'));
    }

}
