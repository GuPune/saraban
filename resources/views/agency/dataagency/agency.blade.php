@extends('layouts.menu.app')
@section('content')

<style>
    .btn-4{
        color:#fff;
		background:#F19A2B;
			}
</style>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!--  เริ่ม  -->

<!-- ดูข้อมูล -->
        <br>
        <h5 class="text-center">รายชื่อหน่วยงาน </h5><br><br>
        <table class="table table-bordered table-hover">
                                <thead class="text-center btn-4">
                                    <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อหน่วยงาน</td>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($agency as $rowagency)
                                     <tr>
                                        <td >{{$i++}}</td>  
                                        <td>{{$rowagency->agency_name}}</td> 
                                    </tr>                         
                                </tbody>
                                @endforeach
        </table>
        <!-- /ตารางข้อมูล -->
        
       <!-- จบ -->
       </div>
    </div>
</div>
@endsection



