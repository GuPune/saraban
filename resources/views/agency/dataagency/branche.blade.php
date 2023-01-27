@extends('layouts.menu.app')
@section('content')

<style>
    .box1{
        color:#ffffff;
    background-color:#5A5E63;
}
.box{
        color:#ffffff;
        background:#3CAF57;
}
</style>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!--  เริ่ม  -->
        <br>
        <h5 class="text-center">รายชื่อสาขา </h5><br><br>
        <table class="table table-bordered table-hover">
                                <thead class="text-center box">
                                    <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อหน่วยงาน</td>
                                    <td>ชื่อสาขา</td>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($branch as $rowbranch)
                                     <tr>
                                        <td >{{$i++}}</td>
                                        <td >{{$rowbranch->agency_name}}</td>  
                                        <td>{{$rowbranch->branche_name}}</td>
                                    </tr>                         
                                </tbody>
                                @endforeach
        </table>
       <!-- จบ -->
       </div>
    </div>
</div>
@endsection



