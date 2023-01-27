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
    <form action="{{url('/bookout/update/'.$bookout->id)}}" method="post" enctype="multipart/form-data">
@csrf 
            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
    </div>
        <div class="card-body" style="margin: 20px;">
            <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล</div>
                <div class="col-sm-9">
                <input class="form-control" name="Oname" type="text"  value="{{$bookout->Oname}}" disabled>
                </div>
                </div>

                <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">หน่วยงาน</div>
                <div class="col-sm-9">
                <input class="form-control" name="Oagency" type="text"  value="{{$bookout->Oagency}}" disabled>
                </div>
                </div>


                <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ฝ่าย</div>
                <div class="col-sm-9">
                <input class="form-control"  name="Odepartment" type="text"  value="{{$bookout->Odepartment}}" disabled>
                </div>
                </div>
                
                <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">สาขา</div>
                <div class="col-sm-9">
                <input class="form-control"  name="Obranch" type="text"  value="{{$bookout->Obranch}}" disabled>
                </div>
                </div>

        </div>
</div>



<!-- ชั้นหนังสือ -->
<br>
<!-- card -->
    <div class="card">
    <div class="card-header">
    <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
    </div>
    <!-- card body -->
    <div class="card-body" style="margin: 20px">

           
             <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ถึงหน่วยงาน</div>
                <div class="col-sm-9">
                <input class="form-control" value="{{ $bookout->Oag_receive}}"  name="Oag_receive" type="text" placeholder="กรุณากรอกหน่วยงาน" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล ผู้รับ</div>
                <div class="col-sm-9">
                <input class="form-control" value="{{ $bookout->Oname_receive}}"  name="Oname_receive" type="text" placeholder="กรุณากรอกชื่อ" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div  class="col-sm-2 col-form-label">หมายเลขติดต่อ</div>
                <div class="col-sm-9">
                <input class="form-control" value="{{ $bookout->form->ctphone}}" type="text" placeholder="กรุณากรอกหมายเลขติดต่อ" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-2 col-form-label">วันที่ออกหนังสือ</div>
                <div class="col-sm-9">
                <?php
                $myDate= $bookout->Odate;
                $myYear = date('Y', strtotime($myDate));
                $myYearBuddhist = $myYear+543;
                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                $Odate = date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                ?>
                <input class="form-control" value="{{ $Odate}}"   type="text"  disabled>
                </div>    
            </div>

            <div class="mb-3 row">
                <div  class="col-sm-2 col-form-label">เลขที่หนังสือ</div>
                <div class="col-sm-9">
                <input class="form-control" value="{{ $bookout->Onumber}}"  name="Onumber"  placeholder="กรุณากรอกเรื่อง" disabled>
                </div>
             </div>

            <div class="mb-3 row">
                <div  class="col-sm-2 col-form-label">เรื่อง</div>
                <div class="col-sm-9">
                <input class="form-control" value="{{ $bookout->form->story}}"  placeholder="กรุณากรอกเรื่อง" disabled>
                </div>
            </div>

            <div class="mb-2 row">
            <div class="col-sm-2 col-form-label">หนังสือตอบกลับ</div>
            <div class="col-sm-9">
                <div class="form-check form-check-inline">
                <input class="form-check-input"   type="radio" value="ต้องการหนังสือตอบกลับ" name="Ostatus" id="inlineRadio2" value="ต้องการหนังสือตอบกลับ" {{ ($bookout->Ostatus=="ต้องการหนังสือตอบกลับ")? "checked" : "" }} >
                <label class="form-check-label" for="inlineRadio1"> ต้องการหนังสือตอบกลับ </label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input"  type="radio" value="ไม่ต้องการหนังสือตอบกลับ" name="Ostatus" id="inlineRadio2" value="ไม่ต้องการหนังสือตอบกลับ" {{ ($bookout->Ostatus=="ไม่ต้องการหนังสือตอบกลับ")? "checked" : "" }} >
                <label class="form-check-label" for="inlineRadio1"> ไม่ต้องการหนังสือตอบกลับ </label>
                </div>
            </div>
            </div>

            
    <!-- card body  -->
    </div>
<!-- endcard -->
</div>


    <!-- บันทึก -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-success" type="submit" style="margin-right:10px">บันทึก</button>
        @if(Auth::user()->role==0)
        <a href="{{route('bookoutuser')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @elseif(Auth::user()->role==1)
        <a href="{{route('bookoutstaff')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @elseif(Auth::user()->role==2)
        <a href="{{route('bookoutadmin')}}"class="btn btn-secondary" type="button">ยกเลิก</a>
        @endif      
      </div>
        <!-- /บันทึก -->
        </form>
        
<!-- จบ -->
</div>
</div>
</div>


    

<!-- script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function(){
    jQuery('#agency').change(function(){
       let cid=jQuery(this).val();
       jQuery.ajax({
        url:'/bookoutt/getbranch',
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
        url:'/bookoutt/getdepartment',
        type:'post',
        data:'sid='+sid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#department').html(result)
        }
       })
    });
    })
</script>
@endsection 
