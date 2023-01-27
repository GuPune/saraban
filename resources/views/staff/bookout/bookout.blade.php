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
     
        .btn-4{
     color:#fff;
	 	background-color:#299942;
			}
.btn-4:hover,.btn-4:focus,.btn-4.focus{
		color:#fff;
		background:#0E8929;
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



</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

             @error('File') 
            <br>
            <div class="text-danger text-center">{{$message}}</div>
            <br>
            @enderror

            <div class="card">
            <div class="card-header">   
            <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                     หนังสือส่งออก
                    </div>
                    @foreach($setallow as $export)
                    @if($export->id==23&&$export->staffstatus==1)
                    <div class="p-2">
                    <a href="{{url('/bookout/export')}}" target="_blank" type="button" class="btn btn-outline-secondary">ออกรายงาน</a>
                    </div>
                    @else

                @endif
                @endforeach 
                </div>
                </div>
                    <div class="card-body">
                    <form action="/bookout/staff" method="GET">          
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
                        </form>

                          <br>
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-dark" id="custom-tabs-five-normal-tab" data-toggle="pill" href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal" aria-selected="true"> ทั้งหมด</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-dark" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="false"  ><i class="bi bi-check-circle" id="titleicon2"></i> ต้องการหนังสือตอบกลับ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false"><i class="bi bi-x-circle text-orange"></i> ไม่ต้องการหนังสือตอบกลับ</a>
                                </li>
                                </ul>
                                </div><br>

                        <!-- ต้องการตอบกลับ -->
                <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div class="tab-pane fade" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                        @if($bookoutrowyescount <= 0)
                            <div class="alert alert-danger text-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                            </div>
                            @else 
                        <table class="table table-bordered table-sm" >
                                <thead class="box1 text-white text-center">
                                    <tr>
                                    <td>ลำดับ</td>
                                        <td>เลขที่หนังสือ</td>
                                        <td>ชื่อหน่วยงาน</td>
                                        <td>เรื่อง</td>     
                                        <td>วันที่หนังสือ</td>  
                                        <td>ฝ่าย/สาขา</td> 
                                        <td>ชื่อผู้ออกหนังสือ</td>
                                         <!-- หนังสือตอบกลับ -->
                                         @foreach($setallow as $reply)
                                        @if($reply->id==19&&$reply->staffstatus==1)
                                        <td>หนังสือตอบกลับ</td> 
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขฟอร์ม -->
                                        @foreach($setallow as $editform)
                                        @if($editform->id==20&&$editform->staffstatus==1)
                                        <td>หนังสือ</td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขรายละเอียดหนังสือ -->
                                        @foreach($setallow as $editdetailbook)
                                        @if($editdetailbook->id==21&&$editdetailbook->staffstatus==1)
                                        <td>แก้ไข</td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- ดาวน์โหลด -->
                                        @foreach($setallow as $download)
                                        @if($download->id==22&&$download->staffstatus==1)
                                        <td>ดาวน์โหลด</td>
                                        @else

                                        @endif
                                        @endforeach
                                        <td>รายละเอียด</td>
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($bookoutrowyes as $rowyes)
                                <tr>
                                <td >{{$bookoutrowyes->firstItem()+$loop->index}}</td>
                                        <td>{{$rowyes->Onumber}}</td>
                                         <!-- ถึงหน่วยงาน -->
                                         <td>
                                        <?php 
                                        if(strlen($rowyes->Oag_receive) > 30){
                                        echo mb_substr($rowyes->Oag_receive, 0, 30).'...';
                                        }
                                        elseif(strlen($rowyes->Oag_receive) <= 30){
                                            echo mb_substr($rowyes->Oag_receive, 0, 30);
                                        }
                                        ?>
                                        </td>
                                        <!-- เรื่อง -->
                                        <td><?php 
                                        if(strlen($rowyes->form->story) > 30){
                                        echo mb_substr($rowyes->form->story, 0, 30).'...';
                                        }
                                        elseif(strlen($rowyes->form->story) <= 30){
                                            echo mb_substr($rowyes->form->story, 0, 30);
                                        }
                                        ?></td>
                                        <td><?php
                                        $myDate= $rowyes->form->date;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        <td>ฝ่าย{{$rowyes->Odepartment}}/{{$rowyes->Obranch}}</td>
                                        <td>{{$rowyes->Oname}}</td>
                                         <!-- หนังสือตอบกลับ -->
                                         @foreach($setallow as $reply)
                                        @if($reply->id==19&&$reply->staffstatus==1)
                                        <td class="text-center"> 
                                        @if($rowyes->Ostatus=='ต้องการหนังสือตอบกลับ')
                                        <button type="button" class="btn btn-info" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#bookstatusModal{{$rowyes->id}}"><i class="bi bi-journals" style="font-size:20px;"></i></button>
                                        <!--Modal upload-->
                                        <div class="modal fade" id="bookstatusModal{{$rowyes->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="bookstatusModal">หนังสือตอบกลับ</h4>
                                                <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3 row">
                                                    <div class="col-sm-12">

                                                    @if($rowyes->Oupload==null)
                                                    <form action="{{url('/status/update/'.$rowyes->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <i class="bi bi-exclamation-triangle text-center" style="font-size:50px;color:#F44C61;margin-right:10px;"></i>
                                                    <br>
                                                    <h5> กรุณาเพิ่มหนังสือตอบกลับ </h5><br>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">อัปโหลด</div>
                                                        <div class="col-sm-8">
                                                            <input type="file" class = "form-control" name="File" placeholder="File"value="{{$rowyes->Oupload}}">
                                                        </div>
                                                    </div>  
                                                    @error('File')
                                                        <div class="text-danger text-center" style="font-size:10px">{{$message}}</div>
                                                    @enderror   

                                                    @else
                                                    <form action="{{url('/status/update/'.$rowyes->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <iframe height="400"  width="600" src='{{asset("/files/file/".$rowyes->Oupload)}}'></iframe>
                                                    <br><br>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-2 col-form-label">แก้ไข</div>
                                                        <div class="col-sm-8">
                                                            <input type="file" class="form-control" name="File"  placeholder="File"value="{{$rowyes->Oupload}}">
                                                        </div>
                                                    </div>   

                                                    @error('File')
                                                        <div class="text-danger text-center" style="font-size:10px">{{$message}}</div>
                                                    @enderror  
                                                    
                                                    @endif
                                                        <br>     
                                                    </div>
                                                </div>
                                            </div> 
                                          
                                                @if($rowyes->Oupload==null)
                                                <div class="modal-footer">
                                                <input type="submit" name="File" class = "btn btn-success" value="อัปโหลด">
                                                </div>
                                                </form> 
                                                                
                                                @else
                                                <div class="modal-footer"><div class="form-group">
                                                <input type="submit" name="File" class ="btn btn-success" value="แก้ไขข้อมูล">
                                                <a class ="btn btn-info" target ="_blank" href="/files/file/{{$rowyes->Oupload}}">ดาวน์โหลด</a>
                                                </div>
                                                </div>
                                                </form>
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                            @elseif($row->Ostatus=='ไม่ต้องการหนังสือตอบกลับ')
                                                                                    
                                            @endif
                                        </td> 
                                        @else
                                        @endif
                                        @endforeach 

                                        <!-- แก้ไขฟอร์ม -->
                                        @foreach($setallow as $editform)
                                        @if($editform->id==20&&$editform->staffstatus==1)
                                        <td class="text-center"><a href="{{url('/form/pdf/view/'.$rowyes->form->id)}}" type="button" class="btn btn-2" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td> 
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขรายละเอียดหนังสือ -->
                                        @foreach($setallow as $editdetailbook)
                                        @if($editdetailbook->id==21&&$editdetailbook->staffstatus==1)
                                        <td class="text-center"><a href="{{url('/bookout/edit/'.$rowyes->id)}}" type="button" class="btn btn-warning" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- ดาวน์โหลด -->
                                        @foreach($setallow as $download)
                                        @if($download->id==22&&$download->staffstatus==1)
                                        <div class="dropdown">
                                        <td class="text-center"><a class="btn btn-success dropdown-toggle" style ="border-radius: 20px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ดาวน์โหลด
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{url('/pdf/form/pdf/'.$rowyes->Form->id)}}"><i class="bi bi-file-earmark-pdf-fill text-red" style="font-size:20px;"></i> &nbsp;&nbsp;PDF</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/bookout/wordExport/'.$rowyes->Form->id) }}"><i class="bi bi-file-word text-blue" style="font-size:20px;"></i> &nbsp;&nbsp;Word</a></li>
                                        </ul></td></div>                                       
                                        @else

                                        @endif
                                        @endforeach                                
                                        </div>
             <!-- รายละเอียด --> 
            <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#detailyes{{$rowyes->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
            <div class="modal fade" id="detailyes{{$rowyes->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                                <div class="modal-header" >
                                <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือออก</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body">                          
                                    
                                <div class="icon text-center" style="margin-right:10px"><font></font>
                               <i class="bi bi-file-arrow-up text-gray" style="font-size:80px;"></i></div> <br>
              
                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">เลขที่หนังสือ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->Onumber}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ประเภทหนังสือ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->form->type}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">เรื่อง : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->form->story}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                <div class="col-7"  style="margin-left:50px">{{$rowyes->Oname}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                <div class="col-7"  style="margin-left:50px">{{$rowyes->Oagency}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                <div class="col-7"  style="margin-left:50px">{{$rowyes->Odepartment}}/{{$rowyes->Obranch}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">วันที่ : </div>
                                <div class="col-7" style="margin-left:50px">
                                <?php
                                $myDate= $rowyes->form->date;
                                $myYear = date('Y', strtotime($myDate));
                                $myYearBuddhist = $myYear+543;
                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                ?> </div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ชื่อหน่วยงานผู้รับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->Oag_receive}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ชื่อ-นามสกุลผู้รับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->Oname_receive}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">หมายเลขติดต่อ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->form->ctphone}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">หนังสือตอบกลับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowyes->Ostatus}}</div>
                                </div>

                              <!-- /justify-content-around -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                </div>
                                </div>
                        </div>
                    </div>
                    <!-- /modal -->
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                            {{$bookoutrowyes->appends(['bookoutrowyes' => $bookoutrowno->currentPage()])->links()}} 
                            </div> 
                            @endif
                        </div>
                   <!-- /ต้องการตอบกลับ  -->
     
                   
                  <!-- ไม่ต้องการ --> 
                  <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    @if($bookoutrownocount <= 0)
                            <div class="alert alert-danger text-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                            </div>
                            @else 
                     <table class="table table-bordered table-sm" >
                                <thead class="box1 text-white text-center">
                                    <tr>
                                        <td>ลำดับ</td>
                                        <td>เลขที่หนังสือ</td>
                                        <td>ชื่อหน่วยงาน</td>
                                        <td>เรื่อง</td>     
                                        <td>วันที่หนังสือ</td>  
                                        <td>ฝ่าย/สาขา</td> 
                                        <td>ชื่อผู้ออกหนังสือ</td>                 
                                        <!-- แก้ไขฟอร์ม -->
                                        @foreach($setallow as $editform)
                                        @if($editform->id==20&&$editform->staffstatus==1)
                                        <td>หนังสือ</td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขรายละเอียดหนังสือ -->
                                        @foreach($setallow as $editdetailbook)
                                        @if($editdetailbook->id==21&&$editdetailbook->staffstatus==1)
                                        <td>แก้ไข</td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- ดาวน์โหลด -->
                                        @foreach($setallow as $download)
                                        @if($download->id==22&&$download->staffstatus==1)
                                        <td>ดาวน์โหลด</td>
                                        @else

                                        @endif
                                        @endforeach
                                        <td>รายละเอียด</td>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                <tr>
                                @foreach($bookoutrowno as $rowno)
                                <td >{{$bookoutrowno->firstItem()+$loop->index}}</td>
                                        <td>{{$rowno->Onumber}}</td>
                                         <!-- ถึงหน่วยงาน -->
                                         <td>
                                        <?php 
                                        if(strlen($rowno->Oag_receive) > 30){
                                        echo mb_substr($rowno->Oag_receive, 0, 30).'...';
                                        }
                                        elseif(strlen($rowno->Oag_receive) <= 30){
                                            echo mb_substr($rowno->Oag_receive, 0, 30);
                                        }
                                        ?>
                                        </td>
                                        <!-- เรื่อง -->
                                        <td><?php 
                                        if(strlen($rowno->form->story) > 30){
                                        echo mb_substr($rowno->form->story, 0, 30).'...';
                                        }
                                        elseif(strlen($rowno->form->story) <= 30){
                                            echo mb_substr($rowno->form->story, 0, 30);
                                        }
                                        ?></td>
                                        <td><?php
                                        $myDate= $rowno->form->date;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        <td>ฝ่าย{{$rowno->Odepartment}}/{{$rowno->Obranch}}</td>
                                        <td>{{$rowno->Oname}}</td>
                                         <!-- แก้ไขฟอร์ม -->
                                         @foreach($setallow as $editform)
                                        @if($editform->id==20&&$editform->staffstatus==1)
                                        <td class="text-center"><a href="{{url('/form/pdf/view/'.$rowno->form->id)}}" type="button" class="btn btn-2" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td> 
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขรายละเอียดหนังสือ -->
                                        @foreach($setallow as $editdetailbook)
                                        @if($editdetailbook->id==21&&$editdetailbook->staffstatus==1)
                                        <td class="text-center"><a href="{{url('/bookout/edit/'.$rowno->id)}}" type="button" class="btn btn-warning" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- ดาวน์โหลด -->
                                        @foreach($setallow as $download)
                                        @if($download->id==22&&$download->staffstatus==1)
                                        <div class="dropdown">
                                        <td class="text-center"><a class="btn btn-success dropdown-toggle" style ="border-radius: 20px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ดาวน์โหลด
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{url('/pdf/form/pdf/'.$rowno->Form->id)}}"><i class="bi bi-file-earmark-pdf-fill text-red" style="font-size:20px;"></i> &nbsp;&nbsp;PDF</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/bookout/wordExport/'.$rowno->Form->id) }}"><i class="bi bi-file-word text-blue" style="font-size:20px;"></i> &nbsp;&nbsp;Word</a></li>
                                        </ul></td></div>
                                        @else

                                        @endif
                                        @endforeach
                                         <!-- รายละเอียด --> 
            <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#detailno{{$rowno->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
            <div class="modal fade" id="detailno{{$rowno->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                                <div class="modal-header" >
                                <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือออก</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body">                          
                                    
                                <div class="icon text-center" style="margin-right:10px">
                               <i class="bi bi-file-arrow-up text-gray" style="font-size:80px;"></i></div> <br>
              
                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">เลขที่หนังสือ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->Onumber}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ประเภทหนังสือ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->form->type}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">เรื่อง : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->form->story}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                <div class="col-7"  style="margin-left:50px">{{$rowno->Oname}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                <div class="col-7"  style="margin-left:50px">{{$rowno->Oagency}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                <div class="col-7"  style="margin-left:50px">{{$rowno->Odepartment}}/{{$rowno->Obranch}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">วันที่ : </div>
                                <div class="col-7" style="margin-left:50px"><?php
                                        $myDate= $rowno->form->date;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = $myYear+543;
                                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ชื่อหน่วยงานผู้รับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->Oag_receive}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ชื่อ-นามสกุลผู้รับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->Oname_receive}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">หมายเลขติดต่อ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->form->ctphone}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">หนังสือตอบกลับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$rowno->Ostatus}}</div>
                                </div>

                              <!-- /justify-content-around -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                </div>
                                </div>
                        </div>
                    </div>
                    <!-- /modal -->
                                        </tr>
                                </tbody>  
                     @endforeach
                            </table> 
                            <div class="d-flex justify-content-center">
                            {{$bookoutrowno->appends(['bookoutrowyes' => $bookoutrow->currentPage()])->links()}} 
                            </div> 
                            @endif
                         </div>
              <!-- /ไม่ต้องการ -->

              <!-- ทั้งหมด -->
                <div class="tab-pane fade show active" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                @if($bookoutrowcount <= 0)
                            <div class="alert alert-danger text-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> ไม่มีข้อมูลในตาราง ณ ขณะนี้
                            </div>
                            @else 
                <table class="table table-bordered table-sm" >
                                <thead class="box1 text-white text-center">
                                    <tr>
                                        <td>ลำดับ</td>
                                        <td>เลขที่หนังสือ</td>
                                        <td>ชื่อหน่วยงาน</td>
                                        <td>เรื่อง</td>     
                                        <td>วันที่หนังสือ</td>  
                                        <td>ฝ่าย/สาขา</td>
                                        <td>ชื่อผู้ออกหนังสือ</td>
                                         <!-- หนังสือตอบกลับ -->
                                         @foreach($setallow as $reply)
                                        @if($reply->id==19&&$reply->staffstatus==1)
                                        <td>หนังสือตอบกลับ</td> 
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขฟอร์ม -->
                                        @foreach($setallow as $editform)
                                        @if($editform->id==20&&$editform->staffstatus==1)
                                        <td>หนังสือ</td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขรายละเอียดหนังสือ -->
                                        @foreach($setallow as $editdetailbook)
                                        @if($editdetailbook->id==21&&$editdetailbook->staffstatus==1)
                                        <td>แก้ไข</td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- ดาวน์โหลด -->
                                        @foreach($setallow as $download)
                                        @if($download->id==22&&$download->staffstatus==1)
                                        <td>ดาวน์โหลด</td>
                                        @else

                                        @endif
                                        @endforeach
                                        <td>รายละเอียด</td>            
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($bookoutrow as $row)
                                <tr>
                                        <td >{{$bookoutrow->firstItem()+$loop->index}}</td>
                                        <td>{{$row->Onumber}}</td>
                                         <!-- ถึงหน่วยงาน -->
                                         <td>
                                        <?php 
                                        if(strlen($row->Oag_receive) > 30){
                                        echo mb_substr($row->Oag_receive, 0, 30).'...';
                                        }
                                        elseif(strlen($row->Oag_receive) <= 30){
                                            echo mb_substr($row->Oag_receive, 0, 30);
                                        }
                                        ?>
                                        </td>
                                        <!-- เรื่อง -->
                                        <td><?php 
                                        if(strlen($row->form->story) > 30){
                                        // echo strlen($row->Ostory);
                                        echo mb_substr($row->form->story, 0, 30).'...';
                                        }
                                        elseif(strlen($row->form->story) <= 30){
                                            // echo strlen($row->Ostory);
                                            echo mb_substr($row->form->story, 0, 30);
                                        }
                                        ?></td>
                                        <td>
                                        <?php
                                        $myDate= $row->form->date;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        <td>{{$row->Odepartment}}/{{$row->Obranch}}</td>
                                        <td>{{$row->Oname}} </td>
                                         <!-- หนังสือตอบกลับ -->
                                         @foreach($setallow as $editform)
                                        @if($editform->id==19&&$editform->staffstatus==1)
                                        <td class="text-center"> 
                                        @if($row->Ostatus=='ต้องการหนังสือตอบกลับ')
                                        <button type="button" class="btn btn-info" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#bookstatusModal{{$row->id}}"><i class="bi bi-journals" style="font-size:20px;"></i></button>
                                        <!--Modal upload-->
                                        <div class="modal fade" id="bookstatusModal{{$row->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="addModalLabel">หนังสือตอบกลับ</h4>
                                                <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3 row">
                                                    <div class="col-sm-12">

                                                    @if($row->Oupload==null)
                                                    <form action="{{url('/status/update/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <i class="bi bi-exclamation-triangle text-center" style="font-size:50px;color:#F44C61;margin-right:10px;"></i>
                                                    <br>
                                                    <h5> กรุณาเพิ่มหนังสือตอบกลับ </h5><br>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-3 col-form-label">อัปโหลด</div>
                                                        <div class="col-sm-8">
                                                            <input type="file" class = "form-control" name="File" placeholder="File"value="{{$row->Oupload}}">
                                                        </div>
                                                    </div>
                                                    @error('File')
                                                        <div class="text-danger text-center" style="font-size:10px">{{$message}}</div>
                                                    @enderror      

                                                    @else
                                                    <form action="{{url('/status/update/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <iframe height="400"  width="600" src='{{asset("/files/file/".$row->Oupload)}}'></iframe>
                                                    <br><br>
                                                    <div class="mb-3 row">
                                                    <div class="col-sm-2 col-form-label">แก้ไข</div>
                                                        <div class="col-sm-8">
                                                            <input type="file" class="form-control" name="File"  placeholder="File"value="{{$row->Oupload}}">
                                                        </div>
                                                    </div> 
                                                    
                                                    @error('File')
                                                        <div class="text-danger text-center" style="font-size:10px">{{$message}}</div>
                                                    @enderror

                                                    @endif
                                                        <br>     
                                                    </div>
                                                </div>
                                            </div> 
                                          
                                                @if($row->Oupload==null)
                                                <div class="modal-footer">
                                                <input type="submit" name="File" class = "btn btn-success" value="อัปโหลด">
                                                </div>
                                                </form> 
                                                                
                                                @else
                                                <div class="modal-footer"><div class="form-group">
                                                <input type="submit" name="File" class ="btn btn-success" value="แก้ไขข้อมูล">
                                                <!-- <a href="{{url('/download/'.$row->Oupload)}}" class ="btn btn-info" download="{{$row->Oupload}}">ดาวน์โหลด</a> -->
                                                <a class ="btn btn-info" target ="_blank" href="/files/file/{{$row->Oupload}}">ดาวน์โหลด</a>
                                                </div>
                                                </div>
                                                </form>
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        @elseif($row->Ostatus=='ไม่ต้องการหนังสือตอบกลับ')
                                                                                
                                        @endif
                                        </td>   
                                        @else
                                        @endif
                                        @endforeach  
                                        <!-- แก้ไขฟอร์ม -->
                                        @foreach($setallow as $editform)
                                        @if($editform->id==20&&$editform->staffstatus==1)
                                        <td class="text-center"><a href="{{url('/form/pdf/view/'.$row->form->id)}}" type="button" class="btn btn-2" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td> 
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- แก้ไขรายละเอียดหนังสือ -->
                                        @foreach($setallow as $editdetailbook)
                                        @if($editdetailbook->id==21&&$editdetailbook->staffstatus==1)
                                        <td class="text-center"><a href="{{url('/bookout/edit/'.$row->id)}}" type="button" class="btn btn-warning" style ="border-radius: 20px; padding: .25rem 1rem" ><i class="bi bi-pencil-square text-white" style="font-size:20px;"></i></a></td>
                                        @else
                                        @endif
                                        @endforeach    
                                        <!-- ดาวน์โหลด -->
                                        @foreach($setallow as $download)
                                        @if($download->id==22&&$download->staffstatus==1)
                                        <div class="dropdown">
                                        <td class="text-center"><a class="btn btn-success dropdown-toggle" style ="border-radius: 20px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            ดาวน์โหลด
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{url('/pdf/form/pdf/'.$row->Form->id)}}"><i class="bi bi-file-earmark-pdf-fill text-red" style="font-size:20px;"></i> &nbsp;&nbsp;PDF</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/bookout/wordExport/'.$row->Form->id) }}"><i class="bi bi-file-word text-blue" style="font-size:20px;"></i> &nbsp;&nbsp;Word</a></li>
                                        </ul></td></div>
                                        @else

                                        @endif
                                        @endforeach    
                                       
                                        <div class="modal fade" id="addModal{{$row->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                        <form action="{{url('/status/update/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="addModalLabel">เพิ่มหนังสือตอบกลับ</h4>
                                                <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3 row">
                                                <div class="col-sm-3 col-form-label">อัปโหลด</div>
                                                    <div class="col-sm-9">
                                                        <input type="file" class = "form-control" name="File" placeholder="File"value="{{$row->Oupload}}">
                                                        <br>  
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <div class="form-group"><input type="submit" name="File" class = "btn btn-success" value="อัปโหลด"></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                        <!-- / model อัปโหลด -->

             <!-- รายละเอียด --> 
            <td class="text-center"><button type="button" class="btn btn-dark" style ="border-radius: 20px; padding: .25rem 1rem" data-bs-toggle="modal" data-bs-target="#detail{{$row->id}}"><i class="bi bi-eye" style="font-size:20px;"></i></button></td>
            <div class="modal fade" id="detail{{$row->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                                <div class="modal-header" >
                                <h4 class="modal-title fs-5 " id="staticBackdropLabel">รายละเอียดหนังสือออก</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <div class="modal-body">                          
                                    
                                <div class="icon text-center" style="margin-right:10px"><font></font>
                               <i class="bi bi-file-arrow-up text-gray" style="font-size:80px;"></i></div> <br>
              
                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">เลขที่หนังสือ : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->Onumber}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ประเภทหนังสือ : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->form->type}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">เรื่อง : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->form->story}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >ผู้บันทึกข้อมูล : </div>
                                <div class="col-7"  style="margin-left:50px">{{$row->Oname}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >หน่วยงานผู้บันทึก : </div>
                                <div class="col-7"  style="margin-left:50px">{{$row->Oagency}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark" >
                                <div class="col-4" >ฝ่าย/สาขาผู้บันทึก : </div>
                                <div class="col-7"  style="margin-left:50px">{{$row->Odepartment}}/{{$row->Obranch}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">วันที่ : </div>
                                <div class="col-7" style="margin-left:50px"><?php
                                        $myDate= $row->form->date;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = $myYear+543;
                                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ชื่อหน่วยงานผู้รับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->Oag_receive}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">ชื่อ-นามสกุลผู้รับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->Oname_receive}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">หมายเลขติดต่อ : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->form->ctphone}}</div>
                                </div>

                                <div class="d-flex justify-content-center text-dark">
                                <div class="col-4">หนังสือตอบกลับ : </div>
                                <div class="col-7" style="margin-left:50px">{{$row->Ostatus}}</div>
                                </div>

                              <!-- /justify-content-around -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                </div>
                                </div>
                    </div></div>
                    <!-- /modal -->

                                    </tr>                      
                                </tbody>
                                @endforeach
                            </table>
                    <div class="d-flex justify-content-center">
                    {{$bookoutrow->appends(['bookoutrowyes' => $bookoutrowyes->currentPage()])->links()}} 
                    </div> 
                            @endif
                          </div>
                          <!-- /ทั้งหมด -->
                    </div>
                </div>

                        <br>
                    </div>
            </div>

        </div>
    </div>
</div>

@endsection