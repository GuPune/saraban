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

      

        @if($_GET['branch']=='databranch')

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


        @elseif($_GET['branch']=='addbranch')

<div class="row">           
<!-- บรรทัดเดียวกัน -->

<!-- ลบ -->
        <div class="col-md-6">
        <div class="text-left"><h5> ข้อมูลสาขา</h5></div> <br>
        <table class="table table-bordered " style="width: 35rem;">
                                <thead class="text-center box1">
                                    <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อหน่วยงาน</td>
                                    <td>ชื่อสาขา</td>
                                    <td>ลบ</td>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($branch as $rowbranch)
                                     <tr>
                                        <td >{{$i++}}</td>
                                        <td >{{$rowbranch->agency_name}}</td>  
                                        <td>{{$rowbranch->branche_name}}</td> 
                                        <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletebranch{{$rowbranch->branche_id}}">ลบ</button></td>    
                                                <div class="modal fade" id="deletebranch{{$rowbranch->branche_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">ลบข้อมูล</h1>
                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        ต้องการลบหน่วยงาน {{$rowbranch->branche_name}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <a class="btn btn-primary" href="{{url('/add/branch/'.$rowbranch->branche_id)}}">ยืนยันการลบ</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>  
                                    </tr>                         
                                </tbody>
                                @endforeach
        </table></div>
<!-- /ลบ --> 

<!-- ตารางข้อมูล -->
        <div class="col-md-4">
        <div class="text-left"><h5> เพิ่มข้อมูลสาขา</h5></div> <br>
        <table class="table table-bordered " style="width: 35rem;">
                                <thead class="text-center box">
                                    <tr>
                                    <td>ลำดับ</td>
                                    <td>ชื่อหน่วยงาน</td>
                                    <td>เพิ่มสาขา</td>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($agency as $rowagency)
                                     <tr>
                                        <td >{{$i++}}</td>  
                                        <td>{{$rowagency->agency_name}}</td> 

                                        <td class="text-center"><button class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#agency{{$rowagency->agency_id}}"><i class="bi bi-plus-square" style="font-size:20px"></i></button></td>   
                                                <!-- Modal -->                                                
                                                <form action="{{url('/add/databranch')}}" method="post" enctype="multipart/form-data">
                                                 @csrf
                                                 <div class="modal fade" id="agency{{$rowagency->agency_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fs-5" id="exampleModalLabel">{{$rowagency->agency_name}}</h5>
                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                    </div>
                                                    <div class="modal-body"><div class="text-center">
                                                    <i class="bi bi-building  text-center" style="font-size:100px;margin-right:10px;"></i></div>
                                                    <br>
                                                    <div class="input-group mb-3"> เพิ่มข้อมูล
                                                    <input type="text" class="form-control" placeholder="กรุณากรอกสาขา" required  name="branch_name" style="margin-left:10px">
                                                    <input type="hidden"  name="agency" value="{{$rowagency->agency_id}}">
                                                    <br></div></div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-success" >บันทึกข้อมูล</button>
                                                    </div>
                                                    </div>
                                                </div>
                                               </form> 
                                            </div>
                                                <!-- /Modal --> 
                                                
                                    </tr>                         
                                </tbody>
                                @endforeach
        </table> </div>
        <!-- /ตารางข้อมูล -->

        <!-- /บรรทัดเดียวกัน -->
 </div>

 @endif

       <!-- จบ -->
       </div>
    </div>
</div>
@endsection



