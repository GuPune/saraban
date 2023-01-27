@extends('layouts.menu.app')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-2"><br>
      <!-- เริ่ม -->

        <h4><i class="bi bi-pencil-square"></i> ส่งหนังสือ</h4>
        <hr><br>
<!-- ธุรการกรอก -->
            <div class="card">
            <div class="card-header">

            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
            </div>
            <div class="card-body" style="margin: 20px;">
<form action="{{url('/addsendbook/add')}}" method="post" enctype="multipart/form-data">
@csrf       
<div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล</div>
    <div class="col-sm-9">
    <input class="form-control" name="Oname" type="text"  value="{{Auth::user()->name}} {{Auth::user()->Lastname}}" disabled>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">หน่วยงาน</div>
    <div class="col-sm-9">
    <input class="form-control" name="Oagency" type="text"  value="{{Auth::user()->Agency}}" disabled>
    </div>
    </div>


    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ฝ่าย</div>
    <div class="col-sm-9">
    <input class="form-control"  name="Odepartment" type="text"  value="{{Auth::user()->Department}}" disabled>
    </div>
    </div>
    
    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">สาขา</div>
    <div class="col-sm-9">
    <input class="form-control"  name="Obranch" type="text"  value="{{Auth::user()->Branch}}" disabled>
    </div>
    </div>

    
            </div>
            </div>

<!-- ชั้นหนังสือ -->
    <br>
    <div class="card">
    <div class="card-header">
    <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
    </div>
    <div class="card-body" style="margin: 20px">

    <!-- <div class="d-flex justify-content-end">
วันที่&nbsp;&nbsp; 
<input type="date" name="ini_signname" style="width: 250px" class="form-control"  value="<?php echo date("Y-m-d"); ?>"></div> <br> -->

   <!-- <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">หน่วยงาน ผู้รับ</div>
    <div class="col-sm-9">
    <select class="form-control" name="Oag_receive" id="agency" aria-label="Default select example" required>
    <option selected="" disabled>กรุณาเลือกหน่วยงาน</option>
    @foreach($agency as $rowabs)
    <option value="{{ $rowabs->agency_id}}">{{ $rowabs->agency_name}}</option>
    @endforeach
    </select>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">สาขางาน ผู้รับ</div>
    <div class="col-sm-9">
    <select class="form-control" name="Obr_receive" id="branch" aria-label="Default select example" required>
    <option value="">กรุณาเลือกสาขา</option>
    </select>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ฝ่าย ผู้รับ</div>
    <div class="col-sm-9">
    <select class="form-control input-lg" name="Odpm_receive" id="department" aria-label="Default select example" required>
    <option value="">กรุณาเลือกฝ่าย</option>
    </select>
    </div>
    </div> -->

    <div class="mb-3 row">
      <div class="col-sm-2 col-form-label">ถึงหน่วยงาน</div>
        <div class="col-sm-9">
            <input class="form-control" name="Oag_receive" type="text" placeholder="กรุณากรอกหน่วยงานผู้รับ" required>
        </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล ผู้รับ</div>
    <div class="col-sm-9">
    <input class="form-control" name="Oname_receive" type="text" placeholder="กรุณากรอกชื่อ" required>
    </div>
    </div>

    <div class="mb-3 row">
    <div  class="col-sm-2 col-form-label">หมายเลขติดต่อ</div>
    <div class="col-sm-9">
    <!-- <input class="form-control" name="Ophone" type="text" placeholder="กรุณากรอกหมายเลขติดต่อ" required> -->
    <input class="form-control" value="{{ $ctphone}}"  type="text"  disabled>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">วันที่ออกหนังสือ</div>
    <div class="col-sm-9">
    <input class="form-control" type="date"  value="{{$date}}" disabled>
    <input class="form-control"  name="Odate" type="hidden" value="{{$date}}" >
    </div>    
    </div>

    <div class="mb-3 row">
    <div  class="col-sm-2 col-form-label">เลขที่หนังสือ</div>
    <div class="col-sm-9">
    <input class="form-control" type="text" value="{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}}"disabled>
   <input class="form-control"  name="Onumber"  type="hidden"  value="{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}}">
</div>
    </div>

    <div class="mb-3 row">
    <div  class="col-sm-2 col-form-label">เรื่อง</div>
    <div class="col-sm-9">
    <input class="form-control" type="text" value="{{$story}}" disabled>
    </div>
    </div>

    <input class="form-control" name="formid" type="hidden"  value="{{$id}}">

    <div class="mb-2 row">
    <div class="col-sm-2 col-form-label">หนังสือตอบกลับ</div>
    <div class="col-sm-9">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="Ostatus" id="inlineRadio2" value="ต้องการหนังสือตอบกลับ" required>
    <label class="form-check-label" for="inlineRadio1"> ต้องการหนังสือตอบกลับ </label>
    </div>

    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="Ostatus" id="inlineRadio2" value="ไม่ต้องการหนังสือตอบกลับ" required>
    <label class="form-check-label" for="inlineRadio1"> ไม่ต้องการหนังสือตอบกลับ </label>
    </div>

    </div>
    </div> 
            </div>
            </div>

<br>

    <div class="card">
    <div class="card-header">
    <i class="bi bi-journal-text"></i> บันทึกการจัดส่งไปรษณีย์
    </div>
    <div class="card-body" style="margin: 20px">

<div class="mb-3 row">
    <div class="col-sm-2 col-form-label">วันที่ฝากส่ง :</div>
    <div class="col-sm-9">
    <input class="form-control" name="trdate" type="date" value="<?php echo date("Y-m-d"); ?>" required>
    </div>
    </div>



    <input class="form-control" name="trbearer" type="hidden" placeholder="กรุณากรอกเรื่อง" value="{{$type}}">

    <input class="form-control"  name="trnumber"  type="hidden" placeholder="กรุณากรอกเรื่อง" value="{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}}">


    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ผู้ฝากส่งหนังสือ :</div>
    <div class="col-sm-9">
    <select class="form-control" name="trdepositor" aria-label="Default select example" required>
    <option selected disabled>กรุณาเลือกประเภทการส่ง</option>
    @foreach($depositor as $row)
    <option value="{{$row->depositor_name}}">{{$row->depositor_name}}</option>
    @endforeach
    </select>
    </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-2 col-form-label">ประเภทการส่ง :</div>
    <div class="col-sm-9">
    <select class="form-control" name="trtaye" aria-label="Default select example" required>
    <option selected disabled>กรุณาเลือกประเภทการส่ง</option>
   @foreach($transport_type as $row)
    <option value="{{$row->transport_name}}">{{$row->transport_name}}</option>
   @endforeach
    </select>
    </div>
    </div>

</div>
</div>

<!-- บันทึก -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-success" type="submit">บันทึก</button>
  <!-- <a href="{{route('bookoutuser')}}" class="btn btn-secondary" type="button">ยกเลิก</a> -->
</div>
<!-- /บันทึก -->
</form>

<!-- จบ -->
</div>
</div>
</div>


@endsection 

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function(){
    jQuery('#agency').change(function(){
       let cid=jQuery(this).val();
       jQuery.ajax({
        url:'/bookout/getbranch',
        type:'post',
        data:'cid='+cid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#branch').html(result)
        }
       })
    });

    jQuery('#branch').change(function(){
       let sid=jQuery(this).val();
       jQuery.ajax({
        url:'/bookout/getdepartment',
        type:'post',
        data:'sid='+sid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#department').html(result)
        }
       })
    });
    })
</script>