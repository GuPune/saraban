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
 #titleicon1{
    color:#ff8000;
    }
#titleicon2{
    color:#22bf28;
    }
    .box1{
    background-color:#5A5E63;
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
.pdf{
     color:#F44C61;
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


.dropdown-toggle{
    width: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center; 
}
.dropdown-toggle:focus{
    box-shadow: none !important;
}
.dropdown-toggle::after {
  display: none;
}
.dropdown-menu{
    width: 100px;
    /* border: 2px solid #F44336; */
    padding: 0rem 0;
    transform: translate3d(0px, 50px, 0px) !important;
}
.dropdown-item:focus, .dropdown-item:hover {
    /* color: #ffffff; */
    /* background-color: #252627; */
    padding: 12px;
}

.dropdown-item {
    display: block;
    margin-left:10px;
    width: 100%;
    padding: 5px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header"> 
                    <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                       <h5> ออกรายงานหนังสือเข้า </h5>
                    </div>
                    <form action="/admit/export" method="POST">  
                    @csrf
                </div>
                </div>
                    <div class="card-body">
                        <div class=" container input-group mb-3" style="width: 30rem;">
                          วันที่ &nbsp; 
                            <input class="form-control form-control-sm" type="date" id="searchdate" style="width: 100px" name="searchdate" >&nbsp; 
                            <input class="form-control form-control-sm" type="date" id="searchend" style="width: 100px" name="searchend">&nbsp; 
                          &nbsp;<button class="btn btn-dark" type="submit" id="button-addon2"  name="search"  style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-search" style="font-size:15px;"></i></button>&nbsp;    
                          <button class="btn btn-light"type="submit" name="exportPDF" style ="border-radius: 20px; padding: .20rem 0.5rem"><i class="bi bi-file-earmark-pdf-fill text-red" style="font-size:22px;"></i></button>
                          <a class="btn btn-light" onclick="tablesToExcel(['exportadmit'], ['exportadmit'], 'รายงานหนังสือเข้า.xls', 'Excel')" style ="border-radius: 20px; padding: .20rem 0.5rem"> <i class="bi bi-file-earmark-spreadsheet-fill text-green" style="font-size:22px;"></i></a> 
                         </div>
                         <p class="text-center text-gray" style="font-size:10px;">ค้นหาวันที่จากวันที่ลงรับ</p> 
                    </form> 
                    
            <br>
            <div id="search_list"></div>
                <div class="tab-pane fade show active" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                <table class="table table-bordered table-sm" id="exportadmit">
                                <thead class="box1 text-white text-center">
                                    <tr>
                                    <td>ลำดับ</td>
                                        <td>เลขที่หนังสือ</td>
                                        <td>วันที่รับ</td>
                                        <td>หน่วยงาน</td><!-- <td>จดหมายจาก</td> -->
                                        <td>เรื่อง</td>
                                        <td>เลขรับหนังสือ</td>
                                        <td>ผู้รับหนังสือฝ่าย/สาขา</td>
                                        <td>ชื่อผู้ลงรับ</td>
                                        <td>วันที่ลงรับ</td>
                                        <td>เวลาลงรับ</td>
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($admit as $row)
                                <tr>
                                        <td >{{$i++}}</td>
                                        <td >{{$row->Ebooknumber}}</td>
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
                                        <td>{{$row->Department->Dpmname}}/{{$row->branch->branche_name}}</td>                                                            
                                        <td>{{$row->Enamereply}}</td>
                                        <td><?php
                                            $myDate= $row->Edate_out;
                                            $myYear = date('Y', strtotime($myDate));
                                            $myYearBuddhist = mb_strimwidth($myYear , -2, 2);
                                            $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                            ?></td>
                                            <td>{{$row->Etimereply}}</td>                                                         
                                             </tr>
                                          @endforeach
                                       </tbody>
                                    </table><br>
                          </div>
                    </div>
                </div>

                        <br>
                    </div>
<!-- จบ -->
        </div>
    </div>
</div>
<script src="{{URL::to('js_export/export.js')}}" ></script>
@endsection