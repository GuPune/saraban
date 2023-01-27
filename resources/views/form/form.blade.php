<style>
      .inner {
  font-size: 25px;
}
</style>
@extends('layouts.menu.app')
@section('content')

 <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-2">
        <!-- เริ่ม -->

<!-- card -->
<div class="card">
    <h4><div class="card-header"> <i class="bi bi-folder2-open" style="margin-right:5px"></i> แบบฟอร์มหนังสือ</div></h4>
  <!-- card body -->
  <div class="card-body"><br>

      <h4>    
        <div class="row justify-content-around" >
            <div class="col-2" style="margin-left:100px">
            ชื่อแบบฟอร์ม
            </div>
            <div class="col-2"style="margin-left:120px">
            สร้าง
            </div>
      </h4>     
    </div><br>       


    <div class="row justify-content-around" style="margin-left:30px">
        <div class="col-4">
            แบบฟอร์ม บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)
        </div>
        <div class="col-3" style="margin-left:100px">
            <a href="{{ ('formiddrives') }}"  target ="_blank" type="button" class="btn btn-info"><i class="bi bi-pencil-square" style="color:white; font-size:20px;"></i> สร้างแบบฟอร์ม</a>
        </div>
    </div> <br>

    <div class="row justify-content-around" style="margin-left:30px">
        <div class="col-4">
            แบบฟอร์ม โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์ 
        </div>
        <div class="col-3" style="margin-left:100px">
            <a href="{{ route('formIDD') }}"  target ="_blank" type="button" class="btn btn-info"><i class="bi bi-pencil-square" style="color:white; font-size:20px;"></i> สร้างแบบฟอร์ม</a>
        </div>
    </div><br>
            
    <div class="row justify-content-around" style="margin-left:30px">
        <div class="col-4">
            แบบฟอร์ม สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี
        </div>
        <div class="col-3" style="margin-left:100px">
            <a href="{{ route('formINS') }}" target ="_blank" type="button" class="btn btn-info"><i class="bi bi-pencil-square" style="color:white; font-size:20px;"></i> สร้างแบบฟอร์ม</a>
        </div>
    </div><br>

    <div class="row justify-content-around" style="margin-left:30px">
        <div class="col-4">
            แบบฟอร์ม ศูนย์ฝึกอบรม TZ
        </div>
        <div class="col-3" style="margin-left:100px">
                <a href="{{ route('formTZ') }}" target ="_blank" type="button" class="btn btn-info"><i class="bi bi-pencil-square" style="color:white; font-size:20px;"></i> สร้างแบบฟอร์ม</a>
        </div>
    </div><br>

     <!-- card body -->
    </div>
<!-- card -->
</div>

        <!-- จบ -->
      </div>
    </div>
</div>
@endsection