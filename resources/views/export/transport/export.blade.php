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
                       <h5> ออกรายงานการส่งออก </h5>
                    </div>
                    <form action="/transport/export" method="POST">  
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
                          <a class="btn btn-light" onclick="tablesToExcel(['exporttransport'], ['exporttransport'], 'รายงานการส่งออก.xls', 'Excel')" style ="border-radius: 20px; padding: .20rem 0.5rem"> <i class="bi bi-file-earmark-spreadsheet-fill text-green" style="font-size:22px;"></i></a> 
                         </div>
                         <p class="text-center text-gray" style="font-size:10px;">ค้นหาวันที่จากวันที่ส่ง</p> 
                    </form> 
            <br>
            <div id="search_list"></div>
                <div class="tab-pane fade show active" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                <table class="table table-bordered table-sm" id="exporttransport">
                                <thead class="box1 text-white text-center">
                                    <tr>
                                    <td>ลำดับ</td>
                                        <!-- <td>เลขที่หนังสือ</td> -->
                                        <td>วันที่ฝากส่ง</td>
                                        <td>ผู้ฝากส่ง</td>
                                        <td>ผู้รับ</td>
                                        <td>ประเภทการส่ง</td>
                                        <td>เลขขนส่ง</td>
                                        <td>วันที่ส่ง</td>        
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($transport as $row)
                                <tr>
                                        <td >{{$i++}}</td>
                                        <!-- <td>{{$row->trnumber}}</td> -->
                                        <td><?php
                                        $myDate= $row->trdate;
                                        $myYear = date('Y', strtotime($myDate));
                                        // $myYearBuddhist = $myYear + 543;
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        // $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        <td>{{$row->trdepositor}}</td>
                                        <td>{{$row->bookout->Oname_receive}}</td>
                                        <td>{{$row->trtaye}}</td>
                                        <td>{{$row->ttransport}}</td>
                                        @if($row->trdatesent==null)
                                        <td></td>
                                        @else
                                        <td> <?php
                                        $myDate= $row->trdatesent;
                                        $myYear = date('Y', strtotime($myDate));
                                        // $myYearBuddhist = $myYear + 543;
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        // $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        @endif                   
                                    </tr>                         
                                </tbody>
                                @endforeach
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
<script>
    $("#pdf").on("submit", function() {
    
    $.ajax({
        url: "/transport/staff/export",
        data: $("#pdf").serialize(),
        success: function(response) {
            jQuery('#pdf').html(result)
        }
    });

    $.ajax({
        url: "/transport/staff/pdf",
        data: $("#pdf").serialize(),
        success: function(response) {
            jQuery('#pdf').html(result)
        }
    });
})
</script>

@endsection