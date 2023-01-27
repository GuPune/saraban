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
        @if($_GET['agency']=='dataagency')
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
        

<!-- เพิ่มข้อมูล -->
        @elseif($_GET['agency']=='addagency')
        เพิ่มข้อมูลหน่วยงาน <br><br><br><br>
        <div class="d-flex justify-content-around">
        <!-- บรรทัดเดียวกัน -->

        <!-- ตารางข้อมูล -->
        <table class="table table-bordered " style="width: 30rem;">
                                <thead class="text-center table-dark">
                                    <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อหน่วยงาน</td>
                                    <td>ลบ</td>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($agency as $rowagency)
                                     <tr>
                                        <td >{{$i++}}</td>  
                                        <td>{{$rowagency->agency_name}}</td> 
                                        <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteagency{{$rowagency->agency_id}}">ลบ</button></td>    
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteagency{{$rowagency->agency_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">ลบข้อมูล</h1>
                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        ต้องการลบหน่วยงาน {{$rowagency->agency_name}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <a class="btn btn-primary" href="{{url('/add/agency/'.$rowagency->agency_id)}}">ยืนยันการลบ</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- /Modal -->
                                    </tr>                         
                                </tbody>
                                @endforeach
        </table>
        <!-- /ตารางข้อมูล -->

        <!-- เพิ่มหน่วยงาน -->
        <div class="mb-3 row">
            <div class="col-sm-12">
                <div class="text-center"><br><br><br>
                <form action="{{url('/add/dataagency')}}" method="post" enctype="multipart/form-data">
                @csrf
                <i class="bi bi-building  text-center" style="font-size:100px;margin-right:10px;"></i>
                <br>
                <h5> กรุณาเพิ่มหน่วยงาน</h5><br>
                </div>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">เพิ่มหน่วยงาน</span>
                <input type="text" class="form-control" placeholder="กรุณากรอกหน่วยงาน" name="agency_name">
                <button type="submit" class="btn btn-success" style="margin-left:5px">เพิ่มข้อมูล</button>
                </form>
            </div>
            @error('agency_name')
            <div class="text-danger text-center" style="font-size:10px">{{$message}}</div>
             @enderror  
              </div>   
            </div>
        <!-- /บรรทัดเดียวกัน -->
            </div>
        @else

        @endif
            

       <!-- จบ -->
       </div>
    </div>
</div>
@endsection



