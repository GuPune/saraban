@extends('layouts.menu.app')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-2"><br>
      <!-- เริ่ม -->


    <h4><i class="bi bi-pencil-square"></i> แก้ไขส่งหนังสือ</h4><hr><br>
<!-- ธุรการกรอก -->
<div class="card">
    <div class="card-header">
   
            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
    </div>
        <div class="card-body" style="margin: 20px;">
            <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล</div>
                <div class="col-sm-9">
                <input class="form-control" type="text"  value="{{$transport->bookout->Oname}}" disabled>
                </div>
                </div>

                <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">หน่วยงาน</div>
                <div class="col-sm-9">
                <input class="form-control"  type="text"  value="{{$transport->bookout->Oagency}}" disabled>
                </div>
                </div>


                <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ฝ่าย</div>
                <div class="col-sm-9">
                <input class="form-control"   type="text"  value="{{$transport->bookout->Odepartment}}" disabled>
                </div>
                </div>
                
                <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">สาขา</div>
                <div class="col-sm-9">
                <input class="form-control"   type="text"  value="{{$transport->bookout->Obranch}}" disabled>
                </div>
                </div>

        </div>
</div>


<br>
 <form action="{{url('/transport/update/'.$transport->id)}}" method="post" enctype="multipart/form-data">
@csrf 
        <div class="card">
        <div class="card-header">
        <i class="bi bi-journal-text"></i> แก้ไขบันทึกการจัดส่งไปรษณีย์
        </div>
        <div class="card-body" style="margin: 20px">

        <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">วันที่ฝากส่ง :</div>
        <div class="col-sm-9">
        <input class="form-control" name="trdate" type="date" value="{{$transport->trdate}}" >
        </div>
        </div>

        <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ผู้ฝากส่งหนังสือ :</div>
        <div class="col-sm-9">
        <select class="form-control" name="trdepositor" aria-label="Default select example" >
        <option selected="" value="{{$transport->trdepositor}}" >{{$transport->depositor->depositor_name}}</option>
        @foreach($depositor as $rowdepositor)
        <option value="{{ $rowdepositor->depositor_name}}">{{ $rowdepositor->depositor_name}}</option>
        @endforeach
        </select>  
        </div>
        <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#adddepositor"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
        </div>

        <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">ประเภทการส่ง :</div>
        <div class="col-sm-9">
        <select class="form-control" name="trtaye" aria-label="Default select example" >
        <option selected="" value="{{$transport->trtaye}}" >{{$transport->transport_type->transport_name}}</option>
        @foreach($transport_types as $rowtype)
        <option value="{{ $rowtype->transport_name}}">{{ $rowtype->transport_name}}</option>
         @endforeach
         </select>       
        </div>
        </div>

        </div>
        </div>

    <!-- บันทึก -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-success" type="submit" style="margin-right:10px">บันทึก</button>
        @if(Auth::user()->role==0)
        <a href="{{route('transportuser')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @elseif(Auth::user()->role==1)
        <a href="{{route('transportstaff')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @elseif(Auth::user()->role==2)
        <a href="{{route('transportadmin')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @endif    
        </div>
        <!-- /บันทึก -->
        </form>

                  <!-- Modal เพิ่มผู้ฝากส่งselect-->
                  <div class="modal fade" id="adddepositor" tabindex="-1" aria-labelledby="adddepositorLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="adddepositorLabel">บันทึกข้อมูลผู้ฝากส่ง</h4>
                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                    </div>
                    <form action="{{url('/transport/edit/depositor')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                                    <div class="modal-body">
                                    <div class="mb-3 row">
                                    <div class="col-sm-2 col-form-label">เรื่อง </div>
                                        <div class="col-sm-10">
                                     <input class="form-control" name="depositor_name" type="text" placeholder="กรุณากรอกผู้ฝากส่ง" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- /เพิ่มผู้ฝากส่งselectmodal -->
        
<!-- จบ -->
</div>
</div>
</div>

@endsection 
