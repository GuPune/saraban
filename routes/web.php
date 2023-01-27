<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdmitController;
use App\Http\Controllers\BookoutController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\WarnController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationUserController;
use App\Http\Controllers\AgencyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home/user', function () {return view('user.home'); })->name('homeuser');;
Route::get('/home',[HomeController::class,'home'])->name('home');
// Route::get('/home/staff',[StaffController::class,'home'])->name('homestaff');

// form
Route::get('/form',[FormController::class,'form'])->name('form');
Route::get('/formiddrives',[FormController::class,'formiddrives'])->name('formiddrives');
Route::get('/formidd',[FormController::class,'formIDD'])->name('formIDD');
Route::get('/formins',[FormController::class,'formINS'])->name('formINS');
Route::get('/formtz',[FormController::class,'formTZ'])->name('formTZ');
Route::get('/preview',[FormController::class,'preview'])->name('preview');
Route::post('/form/add',[FormController::class,'store'])->name('addform');
Route::get('/form/pdf/view/{id}',[FormController::class,'viewpdfform']);
Route::post('/form/pdf/{id}',[FormController::class,'pdfform'])->name('pdfform');
Route::post('/addsendbook',[FormController::class,'add'])->name('addsendbook');
Route::post('/bookout/getbranch',[FormController::class,'getbranch']);
Route::post('/bookout/getdepartment',[FormController::class,'getdepartment']);
Route::get('/pdf/form/pdf/{id}',[FormController::class,'exportpdfform']);
Route::get('/bookout/wordExport/{id}',[FormController::class,'word']);


// หนังสือเข้า
Route::get('/admit/admin',[AdmitController::class,'admitadmin'])->name('admitadmin'); //หนังสือเข้าuser
Route::get('/admit/user',[AdmitController::class,'admituser'])->name('admituser'); //หนังสือเข้าuser
Route::get('/admit/staff',[AdmitController::class,'admitstaff'])->name('admitstaff'); //หนังสือเข้าstaff
Route::post('/admit/getbranch',[AdmitController::class,'getbranch']); //admitสาขา
Route::post('/admit/getdepartment',[AdmitController::class,'getdepartment']); //admitฝ่าย
Route::get('/addbook',[AdmitController::class,'addbook'])->name('addbook'); //หน้าaddbook
Route::post('/addbook/add',[AdmitController::class,'store'])->name('addbookadd'); //เพิ่มข้อมูลaddbook
Route::post('/admit/add/story',[AdmitController::class,'addstory']); //เพิ่มข้อมูลเรื่อง

Route::get('/admit/story',[AdmitController::class,'story']); //ดึงข้อมูล story
Route::post('/admit/story/save',[AdmitController::class,'savestory']); //ดึงข้อมูล story
Route::get('/admit/admitagency',[AdmitController::class,'admitagency']); //ดึงข้อมูลadmitagency
Route::post('/admit/admitagency/save',[AdmitController::class,'saveadmitagency']); //ดึงข้อมูล story

Route::post('/admit/add/by',[AdmitController::class,'addagency']); //เพิ่มข้อมูลหน่วยงานจากที่
Route::post('/admit/statuswait/{id}',[AdmitController::class,'statuswait'])->name('statuswait'); //รอตอบรับ
Route::post('/admit/statusaccept/{id}',[AdmitController::class,'statusaccept'])->name('statusaccept'); //รอตอบรับ
Route::post('/admit/statusno/{id}',[AdmitController::class,'statusno'])->name('statusno'); //รอตอบรับ
// export
Route::get('/admit/export',[AdmitController::class,'admitexport'])->name('admitexport');
Route::post('/admit/export',[AdmitController::class,'admitexport'])->name('admitexport');
// file
Route::get('/admit/file/{id}',[AdmitController::class,'admitfile'])->name('admitfile');
Route::post('/file/update/{id}',[AdmitController::class,'updatefile'])->name('updatefile');
// อันเดียวกัน
Route::get('/admit/editadmit/{id}',[AdmitController::class,'editpageadmit'])->name('pageeditadmit'); //แก้ไขในหน้าedit
Route::post('/admit/edit/{id}',[AdmitController::class,'editadmit'])->name('editadmit'); //updateในหน้าedit
// end อันเดียวกัน

// หนังสือออก
Route::get('/bookout/admin',[BookoutController::class,'bookoutadmin'])->name('bookoutadmin');
Route::get('/bookout/staff',[BookoutController::class,'bookoutstaff'])->name('bookoutstaff');
Route::get('/bookout/user',[BookoutController::class,'bookoutuser'])->name('bookoutuser');
Route::get('/addsendbook',[BookoutController::class,'addsendbook'])->name('addsenbook');
Route::post('/addsendbook/add',[BookoutController::class,'store'])->name('addbookout');
Route::get('/bookout/edit/{id}',[BookoutController::class,'edit']);
Route::post('/bookout/update/{id}',[BookoutController::class,'bookoutadd'])->name('bookoutadd');
Route::post('/bookoutt/getbranch',[BookoutController::class,'getbranch']);
Route::post('/bookoutt/getdepartment',[BookoutController::class,'getdepartment']);
Route::post('/addsendbook/depositor',[BookoutController::class,'adddepositor'])->name('adddepositor');
Route::post('/status/update/{id}',[BookoutController::class,'statusbookout'])->name('statusbookout');
Route::get('/bookout/export',[BookoutController::class,'bookoutexport'])->name('bookoutexport');
Route::post('/bookout/export',[BookoutController::class,'bookoutexport'])->name('bookoutexport');

// ขนส่ง
Route::get('/transport/admin',[TransportController::class,'transportadmin'])->name('transportadmin');
Route::get('/transport/staff',[TransportController::class,'transportstaff'])->name('transportstaff');
Route::get('/transport/export',[TransportController::class,'transportexport'])->name('transportexport');
Route::post('/transport/export',[TransportController::class,'transportexport'])->name('transportexport');
Route::get('/transport/pdf',[TransportController::class,'transportpdf'])->name('transportpdf');
Route::get('/transport/user',[TransportController::class,'transportuser'])->name('transportuser');
Route::post('/transport/add/{id}',[TransportController::class,'transportadd'])->name('transportadd');
Route::post('/transport/update/{id}',[TransportController::class,'updatetransport'])->name('uodatetransport'); //แก้ไขmodal edit
Route::get('/transport/edit/{id}',[TransportController::class,'edittransport'])->name('edittransport'); //แก้ไขmodal edit
Route::post('/transport/edit/depositor',[TransportController::class,'adddepositor1'])->name('adddepositortransport');
// Route::get('/search',[TransportController::class,'search'])->name('search');

//แจ้งเตือน
Route::get('/warn',[WarnController::class,'warn'])->name('warn');

//โปรไฟล์
Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
Route::get('/profile/editprofile/{id}',[ProfileController::class,'editprofile'])->name('editprofile');
Route::post('/profile/updateprofile/{id}',[ProfileController::class,'update']);
Route::post('/profileupdate/image/{id}',[ProfileController::class,'updateImage']);
Route::get('/user/information',[ProfileController::class,'claim'])->name('claim');
Route::get('/user/edit/{id}',[ProfileController::class,'editclaim'])->name('editclaim');
Route::post('/user/update/{id}',[ProfileController::class,'updateclaim'])->name('updateclaim');
Route::get('get_ajax_data',[ProfileController::class, 'get_ajax_data']);
Route::get('/user/add',[ProfileController::class,'addclaim'])->name('addclaim');
Route::post('/user/add/user',[ProfileController::class,'addclaimuser'])->name('addclaimuser');
Route::get('/user/information/{id}',[ProfileController::class,'destroy']);
Route::get('/editpassword',[ProfileController::class,'editepassword'])->name('editepassword');
Route::get('/changepassword/{id}',[ProfileController::class,'changepassword'])->name('changepassword');
Route::post('/changepassword/update/{id}',[ProfileController::class,'updatepassword'])->name('updatepassword');

//การอนุญาต
Route::get('/allow',[AllowController::class,'allow'])->name('allow');
Route::get('/allow/allow/{id}',[AllowController::class,'changeStatus'])->name('changeStatus');
Route::get('/allow/staff/{id}',[AllowController::class,'changeStatusstaff']);
Route::get('/allow/user/{id}',[AllowController::class,'changeStatususer']);
Route::get('/allow/status',[AllowController::class,'allowstatus'])->name('allowstatus');
Route::get('/admin/sidebar',[AllowController::class,'allowsidebar'])->name('allowsidebar');

//ข้อมูลหน่วยงาน สาขา แผนก
Route::get('/agency',[AgencyController::class,'agency'])->name('agency');

Route::get('/add/agency',[AgencyController::class,'addagency'])->name('addagency');
Route::post('/add/dataagency',[AgencyController::class,'storeagency'])->name('adddataagency');
Route::get('/add/agency/{agency_id}',[AgencyController::class,'destroy']);
Route::get('/data/agency',[AgencyController::class,'showagency'])->name('showagency');

Route::get('/add/branch',[AgencyController::class,'addbranch'])->name('addbranch');
Route::get('/add/branch/{branche_id}',[AgencyController::class,'destroybranch']);
Route::post('/add/databranch',[AgencyController::class,'storebranch'])->name('adddatabranch');
Route::get('/data/branch',[AgencyController::class,'showbranch'])->name('showbranch');

Route::get('/add/department',[AgencyController::class,'adddepartment'])->name('adddepartment');
Route::get('/add/department/{Dpmid}',[AgencyController::class,'destroydepartment']);
Route::post('/add/datadepartment',[AgencyController::class,'storedepartment'])->name('adddatadepartment');
Route::get('/data/department',[AgencyController::class,'showdepartment'])->name('showdepartment');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('redirects','App\Http\Controllers\HomeController@index');
