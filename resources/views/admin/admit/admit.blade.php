@extends('layouts.menu.app')
@section('content')

<style>
.btn-1{
    color:#fff;
    background-color:#fc973f;
    }
.btn-1:hover,.btn-1:focus,.btn-1.focus{
        color:#fff;
        background:#ff8000;
    }
    .btn-2{
    color:#fff;
		background-color:#8C93FD;
			}
.btn-2:hover,.btn-2:focus,.btn-2.focus{
		color:#fff;
		background:#6F78FA;
		}

.btn-3{
     color:#fff;
	 	background-color:#F44C61;
			}
.btn-3:hover,.btn-3:focus,.btn-3.focus{
		color:#fff;
		background:#F4354D;
		}
     
 #titleicon1{
    color:#ff8000;
    }
#titleicon2{
    color:#22bf28;
    }
.box1{
    background-color:#5A5E63;
}
#checkbox1{
    height: 20px;
    width: 20px;
    text-align: center;
}
.page-item.active .page-link {
    margin: 2px;
    border-radius: 50px;
    z-index: 5;
    width:40px;
    color: #fff;
    text-align: center;
    background-color: #fc973f; 
    border-color: #fc973f; 
}
.page-item .page-link {
    border-radius: 50px;
    margin: 0.5px;
    width:35px;
    color: #fff;
    text-align: center;
    color: gray;
    border:none;
}
.dpmb{
    width: 9em; 
    word-wrap: break-word;
}
.number{
    width: 5em; 
    word-wrap: break-word;
}
#checkall{
    height: 20px;
    width: 20px;
    text-align: center;
}
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <!-- start -->

            <!-- card -->
            <div class="card">
                <!-- cardhead -->
                <div class="card-header"> 
                <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                    หนังสือรับเข้า
                    </div>
                    <!-- ออกรายงาน -->
                    @foreach($setallow as $export)
                    @if($export->id==18&&$export->adminstatus==1)
                    <div class="p-2">
                    <a href="{{url('/admit/export')}}" target="_blank" type="button" class="btn btn-outline-secondary">ออกรายงาน</a>
                    </div>
                    @else

                    @endif
                    @endforeach
                </div>
                </div>
                <!-- /cardhead -->

                <!-- cardbody -->
                    <div class="card-body">
                    <form action="/admit/admin" method="GET">          
                       <div class="mb-3 row">
                         <div class="container input-group" style="width: 30rem;">
                               คำค้นหา  &nbsp;
                            <input type="search" name="search" placeholder="Search" aria-label="Search" class="form-control">
                               &nbsp;<button class="btn btn-1" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                               &nbsp;<button type="reset" class="btn btn-3"><i class="fa fa-times"></i></button>
                         </div>
                        </div>
                                              
                        <div class=" container input-group mb-3" style="width: 18rem;">
                            วันที่ &nbsp;<input class="form-control form-control-sm" type="date" id="searchdate" style="width: 100px" name="searchdate" >&nbsp; 
                            <input class="form-control form-control-sm" type="date" id="searchend" style="width: 100px" name="searchend" >
                            </div>
                            <p class="text-center text-gray" style="font-size:10px;margin-left:20px;">ค้นหาวันที่จากวันที่ส่งออก</p> 
                        </form>
                            <!-- /search date -->
                            <br><br>
                            <!-- nav-tabs status -->
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-dark" id="pending-tab" data-toggle="pill" href="#pending" role="tab" aria-controls="pending" aria-selected="true"> รอดำเนินการ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-dark" id="wait-tab" data-toggle="pill" href="#wait" role="tab" aria-controls="wait" aria-selected="false"  ><i class="bi bi-exclamation-circle" id="titleicon1"></i> รอตอบรับ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" id="accept-tab" data-toggle="pill" href="#accept" role="tab" aria-controls="accept" aria-selected="false"><i class="bi bi-check-circle" id="titleicon2"></i>  ดำเนินการแล้ว</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" id="no-tab" data-toggle="pill" href="#no" role="tab" aria-controls="no" aria-selected="false"><i class="bi bi-x-circle text-red"></i>  ไม่ตอบรับ</a>
                                </li>
                                </ul>
                            </div>
                            <!-- /nav-tabs status -->
                            <br>

 <!-- tab table -->
 <div class="tab-content" id="custom-tabs-five-tabContent">
<script>
function selectAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
     for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].type == 'checkbox')
        checkboxes[i].checked = true;
     }
 }
</script>

                                        <!-- table รอดำเนินการ -->
                                            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                            @if($tb1count <= 0)
                                             <div class="alert alert-danger text-center" role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                                            </div>
                                            @else 
                                            <table class="table table-bordered table-sm" >
                                                    <thead class="box1 text-white text-center">
                                                        <tr>
                                                            <td>ลำดับ</td>
                                                            <td>เลขที่หนังสือ</td>
                                                            <td>วันที่รับ</td>
                                                            <td>หน่วยงาน</td>
                                                            <td>เรื่อง</td>
                                                            <td>เลขรับหนังสือ</td>
                                                            <td>วันที่ส่งออก</td>
                                                            <td>ผู้รับหนังสือ</td>
                                                            <td>สถานะ</td>
                                                            <!-- ตอบรับ -->
                                                            @foreach($setallow as $reply)
                                                            @if($reply->id==17&&$reply->adminstatus==1)
                                                            <td>ตอบรับ</td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            <!-- แก้ไขหนังสือเข้า -->
                                                            @foreach($setallow as $edit)
                                                            @if($edit->id==15&&$edit->adminstatus==1)
                                                            <td>แก้ไข</td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            <!-- แนบไฟล์ -->
                                                            @foreach($setallow as $file)
                                                            @if($file->id==16&&$file->adminstatus==1)
                                                            <td>แนบไฟล์</td>
                                                            @elseif($file->id==16&&$file->adminstatus==0)
                                                            <td>ไฟล์</td>
                                                            @endif
                                                            @endforeach
                                                            <td>รายละเอียด</td>
                                                        </tr>
                                                        @php($i=1)
                                                    </thead>
                                                    <tbody>
                                                        @foreach($tb1 as $row)                                                 
                                                        <tr> 
                                                            <td>{{$tb1->firstItem()+$loop->index}}</td>
                                                            <td class="number">{{$row->Ebooknumber}}</td>
                                                            <td><?php
                                                                $myDate= $row->Edate_receive;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td>{{$row->Ebookeagency}}</td>
                                                            <td>{{$row->Esubject}}</td>
                                                            <td>{{$row->Ebook_receipt}}</td>
                                                            <td><?php
                                                                $myDate= $row->Edate_out;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td class="dpmb">
                                                            @if($row->agency->agency_name=='บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')
                                                            {{$row->Ename_receive}}/{{$row->Department->Dpmname}}
                                                            @elseif($row->agency->agency_name=='โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์')
                                                            {{$row->Ename_receive}}/{{$row->Department->Dpmname}}/{{$row->branch->branche_name}}
                                                            @elseif($row->agency->agency_name=='สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี')
                                                            {{$row->Ename_receive}}/{{$row->Department->Dpmname}}/{{$row->branch->branche_name}}
                                                            @elseif($row->agency->agency_name=='ศูนย์ฝึกอบรม')
                                                            {{$row->Ename_receive}}/{{$row->Department->Dpmname}}/{{$row->branch->branche_name}}
                                                            @endif
                                                            </td>
                                                            <td class="text-center"><button type="button" class="btn btn-primary disabled" style="border-radius: 20px; padding: .45rem .9rem ;font-size:15px;" value="1"> {{$row->Status->Sname}}</button></td>
                                                            <!-- ตอบรับ -->
                                                            <form action="{{url('/admit/statuswait/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @foreach($setallow as $reply)
                                                            @if($reply->id==17&&$reply->adminstatus==1)
                                                            <td class="text-center checkbox" style="margin:20px"> <input class="form-check-input" type="checkbox"  value="2" name="chk[{{$row->id}}]" id="checkall" ></td>
                                                            @else
                                                            

                                                            @endif
                                                            @endforeach

                                                            <!-- แก้ไขหนังสือเข้า -->
                                                            @foreach($setallow as $edit)
                                                            @if($edit->id==15&&$edit->adminstatus==1)
                                                            <td class="text-center"><a href="{{url('/admit/staff/editadmit/'.$row->id)}}" type="button" class="btn btn-warning" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            
                                                            <!-- แนบไฟล์ -->
                                                            @foreach($setallow as $file)
                                                            @if($file->id==16&&$file->adminstatus==1)
                                                            <td class="text-center"><a href="{{url('/admit/file/'.$row->id)}}" type="button" class="btn btn-success" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-journals" style="font-size:20px;"></i></a></td>
                                                            @elseif($file->id==16&&$file->adminstatus==0)
                                                            <td class="text-center"><button type="button" class="btn btn-info" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#admitfile{{$row->id}}"><i class="bi bi-journals" style="font-size:20px;"></i></button>
                                                            @if($row->Efile==null)
                                                                <div class="modal fade" id="admitfile{{$row->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fs-5" id="addModalLabel">แนบไฟล์หนังสือเข้า</h5>
                                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="mb-3 row">
                                                                            <div class="col-sm-12">
                                                                            <i class="bi bi-info-circle text-center" style="font-size:80px;color:#F44C61;margin-right:10px;"></i>
                                                                            <br>
                                                                            <h4> ไม่พบไฟล์ </h4>       
                                                                @else
                                                                <div class="modal fade" id="admitfile{{$row->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fs-5" id="addModalLabel">แนบไฟล์หนังสือเข้า</h5>
                                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="mb-3 row">
                                                                            <div class="col-sm-12">
                                                                            <br>
                                                                            <iframe height="400"  width="600" src='{{asset("/files/file/".$row->Efile)}}'></iframe>
                                                                            <br>
                                                                            @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    @if($row->Efile==null)
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                                                    
                                                                    </div>                          
                                                                    @else
                                                                    <div class="modal-footer"><div class="form-group">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                    <a class ="btn btn-info" target ="_blank" href="/files/file/{{$row->Efile}}">ดาวน์โหลด</a>
                                                                    </div>
                                                                    </div>
                                                                    @endif
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </td> 
                                                            <!-- แนบไฟล์ -->
                                                            @endif
                                                            @endforeach 
                                                            
                                                            <!-- รายละเอียด -->
                                                           <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$row->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td> 
                                                            <div class="modal fade" id="exampleModal1{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" >
                                                                                <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือเข้า</h4>
                                                                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                            </div>

                                                                            <div class="modal-body">

                                                                                <div class="icon text-center" style="margin-right:10px"><font></font>
                                                                                <i class="bi bi-file-earmark-check text-gray" style="font-size:80px;"></i></div> <br>
                                                                                
                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">เลขที่หนังสือ : </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Ebooknumber}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark" >
                                                                                <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                                                                <div class="col-7"  style="margin-left:50px">{{$row->Ename}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark" >
                                                                                <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                                                                <div class="col-7"  style="margin-left:50px">{{$row->Eagency}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark" >
                                                                                <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                                                                <div class="col-7"  style="margin-left:50px">{{$row->Edepartmentbranch}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">วันที่รับ : </div>
                                                                                <div class="col-7" style="margin-left:50px">
                                                                                <?php
                                                                                $myDate= $row->Edate_receive;
                                                                                $myYear = date('Y', strtotime($myDate));
                                                                                $myYearBuddhist = $myYear+543;
                                                                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                                ?> </div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">จากหน่วยงาน : </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Ebookeagency}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">เรื่อง : </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Esubject}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">เลขรับหนังสือ : </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Ebook_receipt}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">วันที่ส่งออก : </div>
                                                                                <div class="col-7" style="margin-left:50px">
                                                                                <?php
                                                                                $myDate= $row->Edate_out;
                                                                                $myYear = date('Y', strtotime($myDate));
                                                                                $myYearBuddhist = $myYear+543;
                                                                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                                ?> </div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">หน่วยงานผู้รับ: </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->agency->agency_name}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">สาขาผู้รับหนังสือ : </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->branch->branche_name}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">ฝ่ายผู้รับหนังสือ : </div> 
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Department->Dpmname}}</div>
                                                                                </div>

                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">ส่งถึง: </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Ename_receive}}</div>
                                                                                </div>


                                                                                <div class="d-flex justify-content-center text-dark">
                                                                                <div class="col-4">สถานะ : </div>
                                                                                <div class="col-7" style="margin-left:50px">{{$row->Status->Sname}}</div>
                                                                                </div>

                                                                            </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                        </tr>                                            
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <!-- ตอบรับ -->
                                                @foreach($setallow as $reply)
                                                    @if($reply->id==17&&$reply->adminstatus==1)
                                                    <br><div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-info" value="Select All" onclick="selectAll()" id="TestAll" ><i class="bi bi-check2-square"></i> ทั้งหมด</button>&nbsp;
                                                    <button type="submit" class="btn btn-success">บันทึก</button>&nbsp;
                                                    </div>   
                                                    
                                                    @else

                                                    @endif
                                                @endforeach
                                          </form>
                                                <div class="d-flex justify-content-center">
                                                {{$tb1->appends(['รอดำเนินการ' => $tb2->currentPage()])->links()}} 
                                            </div> 
                                                @endif
                                            </div>
  
                                            <!-- table รอตอบรับ -->
                                            <div class="tab-pane fade" id="wait" role="tabpanel" aria-labelledby="wait-tab">
                                            @if($tb2count <= 0)
                                            <div class="alert alert-danger text-center" role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                                            </div>
                                            @else 
                                            <table class="table table-bordered table-sm" >
                                                    <thead class="box1 text-white text-center">
                                                        <tr>
                                                            <td>ลำดับ</td>
                                                            <td>เลขที่หนังสือ</td>
                                                            <td>วันที่รับ</td>
                                                            <td>หน่วยงาน</td>
                                                            <td>เรื่อง</td>
                                                            <td>เลขรับหนังสือ</td>
                                                            <td>วันที่ส่งออก</td>
                                                            <td>ผู้รับหนังสือ</td>
                                                            <td>สถานะ</td>
                                                            <!-- ตอบรับ -->
                                                            @foreach($setallow as $reply)
                                                            @if($reply->id==17&&$reply->adminstatus==1)
                                                            <td>ตอบรับ</td>
                                                            <td>ไม่ตอบรับ</td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            <!-- แนบไฟล์ -->
                                                            <td>ไฟล์</td>
                                                            <td>รายละเอียด</td>
                                                        </tr>
                                                    </thead>
                                                    @php($a=1)
                                                    <tbody>
                                                        @foreach($tb2 as $row2)
                                                    <tr>
                                                             <td>{{$tb2->firstItem()+$loop->index}}</td>
                                                            <td class="number">{{$row2->Ebooknumber}}</td>
                                                            <td><?php
                                                                $myDate= $row2->Edate_receive;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td>{{$row2->Ebookeagency}}</td>
                                                            <td>{{$row2->Esubject}}</td>
                                                            <td>{{$row2->Ebook_receipt}}</td>
                                                            <td><?php
                                                                $myDate= $row2->Edate_out;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td class="dpmb">
                                                            @if($row2->agency->agency_name=='บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')
                                                            {{$row2->Ename_receive}}/{{$row2->Department->Dpmname}}

                                                            @elseif($row2->agency->agency_name=='โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์')
                                                            {{$row2->Ename_receive}}/{{$row2->Department->Dpmname}}/{{$row2->branch->branche_name}}
                                                            
                                                            @elseif($row->agency->agency_name=='สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี')
                                                            {{$row2->Ename_receive}}/{{$row2->Department->Dpmname}}/{{$row2->branch->branche_name}}
                                                            
                                                            @elseif($row->agency->agency_name=='ศูนย์ฝึกอบรม')
                                                            {{$row2->Ename_receive}}/{{$row2->Department->Dpmname}}/{{$row2->branch->branche_name}}
                                                            @endif
                                                            </td>
                                                            <td class="text-center"><button type="button" class="btn btn-primary disabled" style="border-radius: 20px; padding: .45rem .9rem">{{$row2->Status->Sname}}</button></td><!-- สถานะ -->
                                                            <!-- ตอบรับ -->
                                                            @foreach($setallow as $reply)
                                                            @if($reply->id==17&&$reply->adminstatus==1)
                                                            <td class="text-center"><button type="button" class="btn btn-light" style="border-radius: 20px; padding: .25rem .9rem" data-bs-toggle="modal" data-bs-target="#answerstatus"><i class="bi bi-check-square text-green" style="font-size:20px;"></i></button></td>   
                                                            @else
                                                    
                                                            @endif
                                                            @endforeach
                                                            <!-- ตอบรับ -->
                                                            <form action="{{url('/admit/statusaccept/'.$row2->id)}}" method="post">
                                                            @csrf  
                                                            <div class="modal fade" id="answerstatus" tabindex="-1" aria-labelledby="answerstatusLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title fs-5" id="answerstatusLabel">บันทึกข้อมูลผู้ตอบรับ</h4>
                                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="mb-3 row py-2">
                                                                        <div class="col-sm-3 col-form-label">ชื่อผู้ตอบรับ</div>
                                                                            <div class="col-sm-8">
                                                                            <input class="form-control" type="text" placeholder="กรุณากรอกชื่อผู้ตอบรับ" name="Enamereply" aria-label="default input example" required="required">
                                                                            <input class="form-control" type="hidden" value="3" name="Estatus" >
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
                                                            <!-- /ตอบรับ -->

                                                            <!-- ไม่ตอบรับ  -->
                                                            @foreach($setallow as $reply)
                                                            @if($reply->id==17&&$reply->adminstatus==1)
                                                            <td class="text-center"><button type="button" class="btn btn-light" style ="border-radius: 20px; padding: .25rem 1rem"  data-bs-toggle="modal" data-bs-target="#nostatus2{{$row2->id}}"><i class="bi bi-x-square text-red" style="font-size:20px;"></i></i></button></td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            <div class="modal fade" id="nostatus2{{$row2->id}}" tabindex="-1" aria-labelledby="nostatusLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <form action="{{url('/admit/statusno/'.$row2->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title fs-5" id="nostatusLabel">ไม่ตอบรับหนังสือ</h4>
                                                                            <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3 row">
                                                                                <div class="col-sm-3 col-form-label">หมายเหตุ</div>
                                                                                    <div class="col-sm-9">
                                                                                    <input class="form-control" type="text" placeholder="กรุณากรอกหมายเหตุ" aria-label="default input example" name="Enote" required="required">
                                                                                    </div>
                                                                                </div>
                                                                                <!-- @error('Enote')
                                                                                <div class="my-2">
                                                                                    <span class="text-danger">{{$message}}</span>
                                                                                </div>
                                                                              @enderror -->
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                                                <button type="submit"class="btn btn-success">บันทึกข้อมูล</button>
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <!-- /ไม่ตอบรับ  -->

                                                            <!-- แนบไฟล์ -->
                                                            <td class="text-center"><button type="button" class="btn btn-info" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#admitfile2{{$row2->id}}"><i class="bi bi-journals" style="font-size:20px;"></i></button>
                                                                <!--Modal file-->
                                                                @if($row2->Efile==null)
                                                                <div class="modal fade" id="admitfile2{{$row2->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fs-5" id="addModalLabel">แนบไฟล์หนังสือเข้า</h5>
                                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="mb-3 row">
                                                                            <div class="col-sm-12">
                                                                            <i class="bi bi-info-circle text-center" style="font-size:80px;color:#F44C61;margin-right:10px;"></i>
                                                                            <br>
                                                                            <h4> ไม่พบไฟล์ </h4>
                                                                            
                                                                @else
                                                                <div class="modal fade" id="admitfile2{{$row2->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fs-5" id="addModalLabel">แนบไฟล์หนังสือเข้า</h5>
                                                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="mb-3 row">
                                                                            <div class="col-sm-12">
                                                                            <br>
                                                                            <iframe height="400"  width="600" src='{{asset("/files/file/".$row2->Efile)}}'></iframe>
                                                                            <br>
                                                                            @endif
                        
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    @if($row2->Efile==null)
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                                                    
                                                                    </div>                          
                                                                    @else
                                                                    <div class="modal-footer"><div class="form-group">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                    <a class ="btn btn-info" target ="_blank" href="/files/file/{{$row2->Efile}}">ดาวน์โหลด</a>
                                                                    </div>
                                                                    </div>
                                                                    @endif
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div></td>                              
                                                            <!-- {{-- รายละเอียด --}} -->
                                                            <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$row2->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
                                                            <div class="modal fade" id="exampleModal2{{$row2->id}}" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" >
                                                                            <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือเข้า</h4>
                                                                                <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="icon text-center" style="margin-right:10px"><font></font>
                                                                            <i class="bi bi-file-earmark-check text-gray" style="font-size:80px;"></i></div> <br>
                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                                                            <div class="col-7"  style="margin-left:50px">{{$row2->Ename}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                                                            <div class="col-7"  style="margin-left:50px">{{$row2->Eagency}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                                                            <div class="col-7"  style="margin-left:50px">{{$row2->Edepartmentbranch}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่รับ : </div>
                                                                            <div class="col-7" style="margin-left:50px">
                                                                            <?php
                                                                            $myDate= $row2->Edate_receive;
                                                                            $myYear = date('Y', strtotime($myDate));
                                                                            $myYearBuddhist = $myYear+543;
                                                                            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                            ?>  </div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เลขที่หนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Ebooknumber}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">จากหน่วยงาน : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Ebookeagency}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เรื่อง : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Esubject}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เลขรับหนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Ebook_receipt}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่ส่งออก : </div>
                                                                            <div class="col-7" style="margin-left:50px">
                                                                            <?php
                                                                                $myDate= $row2->Edate_out;
                                                                                $myYear = date('Y', strtotime($myDate));
                                                                                $myYearBuddhist = $myYear+543;
                                                                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                                ?> </div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">หน่วยงานผู้รับ: </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->agency->agency_name}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">สาขารับหนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->branch->branche_name}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ฝ่ายรับหนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Department->Dpmname}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ส่งถึง: </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Ename_receive}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">สถานะ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row2->Status->Sname}}</div>
                                                                            </div>

                                                                        </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <!-- {{-- /รายละเอียด --}} -->

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center">
                                                {{$tb2->appends(['รอตอบรับ' => $tb1->currentPage()])->links()}} 
                                            </div> 
                                            @endif
                                            </div>
                                            <!-- /table รอตอบรับ -->

                                    <!-- table ดำเนินการแล้ว -->
                                    <div class="tab-pane fade" id="accept" role="tabpanel" aria-labelledby="accept-tab">
                                     @if($tb3count <= 0)
                                            <div class="alert alert-danger text-center" role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                                            </div>
                                      @else 
                                    <table class="table table-bordered table-sm" >
                                    <thead class="box1 text-white text-center">
                                                        <tr>
                                                            <td>ลำดับ</td>
                                                            <td>เลขที่หนังสือ</td>
                                                            <td>วันที่รับ</td>
                                                            <td>หน่วยงาน</td><!-- <td>จดหมายจาก</td> -->
                                                            <td>เรื่อง</td>
                                                            <td>เลขรับหนังสือ</td>
                                                            <td>ผู้รับหนังสือ</td>
                                                            <td>ชื่อผู้ลงรับ</td>
                                                            <td>วันที่ลงรับ</td>
                                                            <td>เวลาลงรับ</td>
                                                            <td>ไฟล์</td>
                                                            <td>รายละเอียด</td>
                                                        </tr>
                                                    </thead>
                                                    @php($b=1)
                                                    <tbody>
                                                        @foreach($tb3 as $row3)
                                                    <tr>
                                                            <td>{{$tb3->firstItem()+$loop->index}}</td>
                                                            <td >{{$row3->Ebooknumber}}</td>
                                                            <td><?php
                                                                $myDate= $row3->Edate_receive;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td>{{$row3->Ebookeagency}}</td>
                                                            <td>{{$row3->Esubject}}</td>
                                                            <td>{{$row3->Ebook_receipt}}</td>
                                                            <td>
                                                            @if($row3->agency->agency_name=='บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')
                                                            {{$row3->Ename_receive}}/{{$row3->Department->Dpmname}}

                                                            @elseif($row3->agency->agency_name=='โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์')
                                                            {{$row3->Ename_receive}}/{{$row3->Department->Dpmname}}/{{$row3->branch->branche_name}}
                                                            
                                                            @elseif($row3->agency->agency_name=='สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี')
                                                            {{$row3->Ename_receive}}/{{$row3->Department->Dpmname}}/{{$row3->branch->branche_name}}
                                                            
                                                            @elseif($row3->agency->agency_name=='ศูนย์ฝึกอบรม')
                                                            {{$row3->Ename_receive}}/{{$row3->Department->Dpmname}}/{{$row3->branch->branche_name}}
                                                            @endif
                                                            </td>                                                            
                                                            <td>{{$row3->Enamereply}}</td>
                                                            <td><?php
                                                                $myDate= $row3->Edatereply;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td>{{$row3->Etimereply}}</td>
                                                            <td class="text-center"><button type="button" class="btn btn-info" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#admitfile3{{$row3->id}}"><i class="bi bi-journals" style="font-size:20px;"></i></button>
                                                            <!--Modal file-->
                                                                        @if($row3->Efile==null)
                                                                        <div class="modal fade" id="admitfile3{{$row3->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title fs-5" id="addModalLabel">ไฟล์หนังสือเข้า</h4>
                                                                            <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <div class="mb-3 row">
                                                                        <div class="col-sm-12">
                                                                        <br>
                                                                        <i class="bi bi-info-circle text-center" style="font-size:80px;color:#F44C61;margin-right:10px;"></i>
                                                                        <br>
                                                                        <h4> ไม่พบไฟล์ </h4>
                                                                        @else
                                                                        <div class="modal fade" id="admitfile3{{$row3->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title fs-5" id="addModalLabel">ไฟล์หนังสือเข้า</h4>
                                                                            <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <div class="mb-3 row">
                                                                        <div class="col-sm-12">
                                                                        <br>
                                                                        <iframe height="400"  width="600" src='{{asset("/files/file/".$row3->Efile)}}'></iframe>
                                                                        <br>
                                                                        @endif  
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                @if($row3->Efile==null)
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>                                                                    
                                                                </div>                          
                                                                @else
                                                                <div class="modal-footer"><div class="form-group">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                <a class ="btn btn-info" target ="_blank" href="/files/file/{{$row3->Efile}}">ดาวน์โหลด</a>
                                                                </div>
                                                                </div>
                                                                @endif
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div></td>
                                                            <!-- {{-- รายละเอียด --}} -->
                                                            <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#exampleModal3{{$row3->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
                                                            <div class="modal fade" id="exampleModal3{{$row3->id}}" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" >
                                                                            <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือเข้า</h4>
                                                                                <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="icon text-center" style="margin-right:10px"><font></font>
                                                                            <i class="bi bi-file-earmark-check text-gray" style="font-size:80px;"></i></div> <br>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                                                            <div class="col-7"  style="margin-left:50px">{{$row3->Ename}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                                                            <div class="col-7"  style="margin-left:50px">{{$row3->Eagency}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                                                            <div class="col-7"  style="margin-left:50px">{{$row3->Edepartmentbranch}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่รับ : </div>
                                                                            <div class="col-7" style="margin-left:50px">
                                                                            <?php
                                                                                $myDate= $row3->Edate_receive;
                                                                                $myYear = date('Y', strtotime($myDate));
                                                                                $myYearBuddhist = $myYear+543;
                                                                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                                ?> </div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เลขที่หนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Ebooknumber}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">จากหน่วยงาน : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Ebookeagency}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เรื่อง : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Esubject}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เลขรับหนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Ebook_receipt}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่ส่งออก : </div>
                                                                            <div class="col-7" style="margin-left:50px">
                                                                            <?php
                                                                                $myDate= $row3->Edate_out;
                                                                                $myYear = date('Y', strtotime($myDate));
                                                                                $myYearBuddhist = $myYear+543;
                                                                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                                ?> </div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">หน่วยงานผู้รับ: </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->agency->agency_name}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">สาขารับหนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->branch->branche_name}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ฝ่ายรับหนังสือ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Department->Dpmname}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ส่งถึง: </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Ename_receive}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ชื่อผู้ลงตอบรับ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Enamereply}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่ลงตอบรับ : </div>
                                                                            <div class="col-7" style="margin-left:50px"><?php
                                                                            $myDate= $row3->Edatereply;
                                                                            $myYear = date('Y', strtotime($myDate));
                                                                            $myYearBuddhist = $myYear;
                                                                            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                            ?></div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เวลาลงตอบรับ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Etimereply}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">สถานะ : </div>
                                                                            <div class="col-7" style="margin-left:50px">{{$row3->Status->Sname}}</div>
                                                                            </div>

                                                                        </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center">
                                            {{$tb3->appends(['ดำเนินการแล้ว' => $tb4->currentPage()])->links()}} 
                                            </div> 
                                            @endif
                                            </div>
                                            <!-- /table ดำเนินการแล้ว -->


                                    <!-- table ไม่ตอบรับ -->
                                    <div class="tab-pane fade" id="no" role="tabpanel" aria-labelledby="no-tab">
                                    @if($tb4count <= 0)
                                            <div class="alert alert-danger text-center" role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                                            </div>
                                            @else 
                                    <table class="table table-bordered table-sm"  >
                                    <thead class="box1 text-white text-center">
                                                            <td>ลำดับ</td>
                                                            <td>เลขที่หนังสือ</td>
                                                            <td>วันที่รับ</td>
                                                            <td>หน่วยงาน</td><!-- <td>จดหมายจาก</td> -->
                                                            <td>เรื่อง</td>
                                                            <td>เลขรับหนังสือ</td>
                                                            <td>ผู้รับหนังสือ</td>
                                                            <td>สถานะ</td>
                                                            <td>หมายเหตุ</td>
                                                            <!-- แก้ไขหนังสือเข้า -->
                                                            @foreach($setallow as $edit)
                                                            @if($edit->id==15&&$edit->adminstatus==1)
                                                            <td>กรอกข้อมูลใหม่</td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            <td>รายละเอียด</td>
                                                        </tr>
                                                    </thead>
                                                    @php($c=1)
                                                    <tbody>
                                                        @foreach($tb4 as $row4)
                                                    <tr>
                                                           <td>{{$tb4->firstItem()+$loop->index}}</td>
                                                            <td>{{$row4->Ebooknumber}}</td>
                                                            <td><?php
                                                                $myDate= $row4->Edate_receive;
                                                                $myYear = date('Y', strtotime($myDate));
                                                                $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                                                $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                ?></td>
                                                            <td>{{$row4->Ebookeagency}}</td>
                                                            <td>{{$row4->Esubject}}</td>
                                                            <td>{{$row4->Ebook_receipt}}</td>
                                                            <td>
                                                            @if($row4->agency->agency_name=='บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่)')
                                                            {{$row4->Ename_receive}}/{{$row4->Department->Dpmname}}

                                                            @elseif($row4->agency->agency_name=='โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์')
                                                            {{$row4->Ename_receive}}/{{$row4->Department->Dpmname}}/{{$row4->branch->branche_name}}
                                                            
                                                            @elseif($row4->agency->agency_name=='สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี')
                                                            {{$row4->Ename_receive}}/{{$row4->Department->Dpmname}}/{{$row4->branch->branche_name}}
                                                            
                                                            @elseif($row4->agency->agency_name=='ศูนย์ฝึกอบรม')
                                                            {{$row4->Ename_receive}}/{{$row4->Department->Dpmname}}/{{$row4->branch->branche_name}}
                                                            @endif
                                                            </td>                                                           
                                                             <td class="text-center"><button type="button" class="btn btn-danger disabled" style="border-radius: 20px; padding: .45rem .9rem">{{$row4->Status->Sname}}</button></td><!-- สถานะ -->
                                                            <td>{{$row4->Enote}}</td>
                                                             <!-- แก้ไขหนังสือเข้า -->
                                                             @foreach($setallow as $edit)
                                                            @if($edit->id==15&&$edit->adminstatus==1)
                                                            <td class="text-center"><a href="{{url('/admit/editadmit/'.$row4->id)}}" type="button" class="btn btn-warning" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td>
                                                            @else

                                                            @endif
                                                            @endforeach
                                                            <!-- {{-- รายละเอียด --}} -->
                                                            <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#exampleModal4{{$row4->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
                                                            <div class="modal fade" id="exampleModal4{{$row4->id}}" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" >
                                                                            <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือเข้า</h4>
                                                                                <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                                                        </div>
                                                                        <!-- {{-- modal-body --}} -->
                                                                        <div class="modal-body">
                                                                            <div class="icon text-center" style="margin-right:10px"><font></font>
                                                                            <i class="bi bi-file-earmark-check text-gray" style="font-size:80px;"></i></div> <br>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                                                            <div class="col-6"  style="margin-left:50px">{{$row4->Ename}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                                                            <div class="col-6"  style="margin-left:50px">{{$row4->Eagency}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark" >
                                                                            <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                                                            <div class="col-6"  style="margin-left:50px">{{$row4->Edepartmentbranch}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่รับ : </div>
                                                                            <div class="col-6" style="margin-left:50px"><?php 
                                                                            $myDate= $row4->Edate_receive;
                                                                            $myYear = date('Y', strtotime($myDate));
                                                                            $myYearBuddhist = $myYear+543 ;
                                                                            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                            ?></div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เลขที่หนังสือ : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Ebooknumber}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">หน่วยงาน : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Ebookeagency}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เรื่อง : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Esubject}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">เลขรับหนังสือ : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Ebook_receipt}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">วันที่ส่งออก : </div>
                                                                            <div class="col-6" style="margin-left:50px">
                                                                            <?php 
                                                                            $myDate= $row4->Edate_out;
                                                                            $myYear = date('Y', strtotime($myDate));
                                                                            $myYearBuddhist = $myYear+543 ;
                                                                            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                                                            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                                                            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                                                            ?></div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">หน่วยงานผู้รับ: </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->agency->agency_name}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">สาขาผู้รับหนังสือ : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->branch->branche_name}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ฝ่ายผู้รับหนังสือ : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Department->Dpmname}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">ส่งถึง : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Ename_receive}}</div>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">หมายเหตุ : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Enote}}</div>
                                                                            </div>


                                                                            <div class="d-flex justify-content-center text-dark">
                                                                            <div class="col-4">สถานะ : </div>
                                                                            <div class="col-6" style="margin-left:50px">{{$row4->Status->Sname}}</div>
                                                                            </div>
                                                                        </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            <div class="d-flex justify-content-center">
                                            {{$tb4->appends(['ไม่ตอบรับ' => $tb3->currentPage()])->links()}} 
                                            </div> 
                                                @endif
                                            </div>
                                            </div>
                                            <!-- /table ไม่ตอบรับ -->
                    </div>
                    <!-- /mb3 -->
                </div>
            <!-- /cardbody -->
        </div>
        <!-- card -->
    </div>

<!-- end -->
        </div>
    </div>
</div>
<script type="text/javascript">
  var url = document.location.toString();
  if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  } 

  $('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
    if(e.target.hash == "#activity"){
      $('.nano').nanoScroller();
    }
  })
</script>
@endsection