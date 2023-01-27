@extends('layouts.menu.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

<style>
  .font1{
    font-family: 'Sarabun', sans-serif;
  }
    .box {
        width: 30px;
        height: 30px;
        border: solid 1px #ff0000;
    }
    .card {
        margin: 2.5cm;
        size: 21cm 29.7cm landscape;
    }
    #box1 {
        float: left;
        width: auto;
        height: 100px;
        /* display: block;  */
        /* display: inline-block; */
      }

      body{
        font-size: 15px;
      }

</style>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!-- start -->

        <!-- card -->       
     <div class="font1">
      <div class="card" >
          <div class="card-header">
          <div class="d-flex justify-content-center">
          
             </div><br>
             <!-- ความจริงกว้างสูง 268x152 -->
             <!-- head-form -->
             @if($type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')  
             <div class="d-flex justify-content-center"> 
            <img src="{{ asset('dist/img/logoIDD.png') }}" width="158" height="90"> 
            </div><br>
             <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
           
             @elseif($type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             <div class="d-flex">
             <img src="{{ asset('dist/img/logoiddrives.png') }}"  width="166px">
             <div class="p-2 py-5 flex-fill">
             <h5> บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </h5>
             200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531 <br>
             Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co. <br></div>
            </div>
            <hr noshade="noshade" size="2"><br>
            
            @elseif($type=='สถานตรวจสภาพรถศูนย์ตรอ.ไอดี')
            <div class="d-flex justify-content-center">
             <img src="{{ asset('dist/img/logoINS.png') }}" width="158">
             </div><br>
            <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
                      
             @elseif($type=='ศูนย์ฝึกอบรม')

             @endif
              <!-- /head-form -->

           <!-- bodyform -->
            <div class="card-body" style="margin: 20px">
            <form action="{{url('/addsendbook')}}" method="post" enctype="multipart/form-data">
             @csrf      
            <div class="d-flex justify-content-end">
            เลขที่หนังสือ&nbsp;{{$fdepartment}}/{{$dnumber}}/{{$cnumber}}/{{$year}} 
            <input type="hidden" value="{{$fdepartment}}" class="form-control" style="width: 60px" name="fdepartment">  
            <input type="hidden" value="{{$dnumber}}" class="form-control" style="width: 60px" name="dnumber">  
            <input type="hidden" value="{{$cnumber}}" class="form-control" style="width: 60px" name="cnumber">  
            <input type="hidden" value="{{$year}}" class="form-control" style="width: 60px" name="year">  
                                </div><br><br>
            


            <div class="d-flex justify-content-center">
            วันที่&nbsp;
            <?php
            $myDate= $date;
            $myYear = date('Y', strtotime($myDate));
            $myYearBuddhist = $myYear + 543;
            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
            ?>            
            <input type="hidden" value="{{$date}}" class="form-control" style="width: 150px" name="date">  

            </div><br><br>

            <div class="d-flex justify-content-start">
            เรื่อง&nbsp;&nbsp;
            {{$story}}
            <input type="hidden" value="{{$story}}" class="form-control" style="width: 150px" name="story">  
            </div>

            <div class="d-flex justify-content-start"style="margin-top:5px;">
            เรียน&nbsp;&nbsp;
            {{$learn}}
            <input type="hidden" value="{{$learn}}" class="form-control" style="width: 150px" name="learn">  
            </div>

            @if($quote==null)

            @else
            <div class="d-flex justify-content-start"style="margin-top:5px;">
            อ้างถึง&nbsp;&nbsp;
            {{$quote}}
            <input type="hidden" value="{{$quote}}" class="form-control" style="width: 150px" name="quote">  
            </div>
            @endif

            @if($enclosure==null)
            <br>
            @else
            <div class="d-flex" style="margin-right:10px;margin-top:5px;">
            <div class="flex-shrink-0">
            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
            </div>
            <div class="flex-grow-1 ms-3">
            <?php echo $enclosure; ?> 
            <input type="hidden" value="{{$enclosure}}" class="form-control" style="width: 150px" name="enclosure">  
            </div>
            </div>
            @endif
            
            <div class="d-flex flex-column" style="margin-left: 40px">
            <?= $details; ?> 
            <input type="hidden" value="{{$details}}" class="form-control" style="width: 150px" name="details">  
            </div><br><br><br>
            
            <div class="d-flex justify-content-center">
            ขอแสดงความนับถือ
            </div>

            <div class="d-flex justify-content-center">
            .......................................................
            </div>

            <div class="d-flex justify-content-center">
            (.........................................................)
            </div><br><br><br><br><br>

            <div class=" footer">
            <div style="border: 2px solid #000000; overflow: auto; width: 350px; height:auto;" style="margin: 10px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px;font-size:16px;">
            สอบถามได้ที่
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            ชื่อ&nbsp;{{$ctname}}
            <input type="hidden" value="{{$ctname}}" class="form-control" style="width: 150px" name="ctname">  
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px;font-size:16px;">
            เบอร์โทรศัพท์&nbsp;{{$ctphone}}
            <input type="hidden" value="{{$ctphone}}" class="form-control" style="width: 150px" name="ctphone">  
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px;font-size:16px;">
            E-mail &nbsp;{{$ctemail}}
            <input type="hidden" value="{{$ctemail}}" class="form-control" style="width: 150px" name="ctemail">  
            </div><br>
            </div><br><br>

            <div class="d-flex justify-content-end" style="font-size:15px;">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div>

            <div class="d-flex justify-content-center">
            <div style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;">
            <img src="{{ asset('dist/img/logo1.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo2.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo3.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo4.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo5.png') }}" width="70px">
            <img src="{{ asset('dist/img/logo6.png') }}" width="252px">
            <img src="{{ asset('dist/img/logo7.png') }}" width="81px">
            </div>
            </div>

            </div>
            <!-- /headform -->
        </div>
        <!--  /bodyform -->
      </div>
      <!-- /card -->
    </div>
    <!-- /font1 -->
    </div>   
    <div class="d-flex justify-content-end">
  <input type="hidden" value="{{$type}}" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
   </div><br>
<!-- save cancel -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-primary" type="button" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#confirm">บันทึก</button>
  <button class="btn btn-secondary" type="button">ยกเลิก</button>
</div>
<!-- /save cancel -->

<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ยืนยันการบันทึก</h1>
        <!--  <i class="fa fa-times-circle fa-2x" style="color:white" data-bs-dismiss="modal" aria-label="Close" type="button"></i> -->
        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
      </div>
      <div class="modal-body">
       <h5 style="margin-top:5px"> ต้องการยืนยันการบันทึก </h5>
     <div class="text-red">   * หมายเหตุ ถ้ากดบันทึกแล้วไม่สามารถแก้ไขเลขจดหมายได้ * </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
      </div>
    </div>
  </div>
</form>
</div>
<!-- endmodal -->

<!-- จบ -->
      </div>
    </div>
</div>
@endsection
