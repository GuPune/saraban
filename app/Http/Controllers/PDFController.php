<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bookout;
use Illuminate\support\Facades\DB; 
use App\Models\Form;
use App\Models\transport;
// use composer\vendor\autoload;
// use App\Exports\EnrollmentExport;
// use PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

// use Barryvdh\DomPDF\PDF;
// use Illuminate\Support\Facades\File;
// use \Mpdf\Mpdf as PDF; 

class PDFController extends Controller
{
// public function pdfform1(Request $request,$id)
//     {
//             $form = Form::find($id);
//             return view('user.bookout.pdf',compact('form'));
//     }

// public function pdfform(Request $request,$id)
// {
//    $form = Form::find($id);
//     // $users = User::get();
//     // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => false, 'chroot' => [ realpath(base_path()).'public/dist/img/', realpath(base_path()).'storage/fonts/'] ])->loadView('user.bookout.pdf', compact('form'));
//     // $pdf = PDF::setOptions(['defaultFont' => 'sarabun'])->loadView('user.bookout.pdf', compact('form'));
//     // $pdf = PDF::loadView('user.bookout.pdf', compact('form'))->setPaper([0, 0, 685.98, 396.85], 'landscape');
//     $pdf = PDF::loadView('export.form.pdfform', compact('form'));
//     $pdf->getDomPDF()->setHttpContext(
//         stream_context_create([
//             'ssl' => [
//                 'allow_self_signed'=> TRUE,
//                 'verify_peer' => FALSE,
//                 'verify_peer_name' => FALSE,
//             ]
//         ])
//     );

//     return $pdf->download('form.pdf');
// }

}

