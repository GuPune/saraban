@extends('layouts.menu.app')
@section('content')
<style>
    .box1{
        color:#ffffff;
    background-color:#5A5E63;
}
.box{
        color:#ffffff;
        background:#098B9F;
}
</style>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!--  เริ่ม  -->
<br>
<nav class="navbar navbar-light bg-light">
  <h1 class="text-left">ชื่อแผนก</h1>
    <form class="d-flex" action="show/department" method="GET">
      <input class="form-control me-2" type="search" name="search" id ="serach" placeholder="ค้นหาแผนก">
      <button class="btn btn-dark" type="submit"> <i class="bi bi-search"></i></button>
    </form>
</nav><br><br>

        <table class="table table-bordered table-hover">
                                <thead class="text-center box">
                                    <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อหน่วยงาน</td>
                                    <td>ชื่อสาขา</td>
                                    <td>ชื่อแผนก</td>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($department as $rowdepartment)
                                     <tr>
                                        <td >{{$i++}}</td>
                                        <td >{{$rowdepartment->agency_name}}</td>
                                        <td >{{$rowdepartment->branche_name}}</td>  
                                        <td>{{$rowdepartment->Dpmname}}</td> 
                                    </tr>                         
                                </tbody>
                                @endforeach
        </table>
       <!-- จบ -->
       </div>
    </div>
</div>
@endsection



