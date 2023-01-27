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
    width:40px;
    color: #fff;
    text-align: center;
    color: gray;
    border:none;
}
     
    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <!-- start -->

                <!-- card -->
                <div class="card">
                    <!-- cardhead -->
                    <div class="card-header"> ข้อมูลผู้ใช้ระบบ </div>
                    <!-- /cardhead -->

                    <!-- cardbody -->
                        <div class="card-body">
                        <div class="card-body">
                    <form action="/user/information" method="GET">          
                       <div class="mb-3 row">
                         <div class="container input-group" style="width: 30rem;">
                               คำค้นหา  &nbsp;
                            <input type="search" name="search" placeholder="Search" aria-label="Search" class="form-control">
                               &nbsp;<button class="btn btn-1" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                               &nbsp;<button type="reset" class="btn btn-3"><i class="fa fa-times"></i></button>
                         </div>
                        </div>
                        </form>

                            <div class=" container input-group mb-3" style="width: 18rem;">
                                วันที่ &nbsp; <input class="form-control form-control-sm" type="date" value="<?php echo date("Y-m-d"); ?>"  >
                            </div>
                            <!-- /search date -->
                            <br>
                            <!-- search date -->
                                <div class="container-right input-group" style="width: 30rem;">

                                </div>
                                <!-- /search date -->
                                <!-- nav-tabs status -->
                                <div class="d-flex justify-content-end">
                                <a href="{{ route('addclaim') }}"> <span class="btn btn-info"><i class=" bi bi-person-plus" style="font-size:20px;"></i></span></a> 
                                </div>
                                <div class="d-flex justify-content-left">
                                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active  text-dark" id="user-tab" data-toggle="pill" href="#user" role="tab" aria-controls="user" aria-selected="true"> user</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark " id="staff-tab" data-toggle="pill" href="#staff" role="tab" aria-controls="staff" aria-selected="false"  id="titleicon1">staff</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" id="admin-tab" data-toggle="pill" href="#admin" role="tab" aria-controls="admin" aria-selected="false" id="titleicon2"> admin </a>
                                    </li>
                                    </ul>
                                    
                                </div>
                                <!-- /nav-tabs status -->
                                <br>
                                            <!-- tab table -->
                                            <div class="tab-content" id="custom-tabs-five-tabContent">
                                            <!-- table user-->
                                                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab" >
                                                <table  class="table table-hover">
                                                        <thead class="">
                                                            <tr>
                                                                <td>แก้ไข</td>
                                                                <td>ลบ</td>
                                                                <td>ลำดับ</td>
                                                                <td>ชื่อ</td>
                                                                <td>หน่วยงาน</td>
                                                                <td>สาขา</td>
                                                                <td>แผนก</td>
                                                                <td>เบอร์โทร</td>
                                                                <td>email</td>
                                                            </tr>
                                                            @php($i=1)
                                                        </thead>
                                                        <tbody class="text-secondary">
                                                            @foreach($tb3 as $row1)
                                                            <tr>
                                                                <td> <a class="text-gray" type="button" href="{{url('/user/edit/'.$row1->id)}}"> <i class="bi bi-pencil-square "></i></a></td>
                                                                <td><a class="text-danger" href="{{url('/admin/claim/claim/'.$row1->id)}}"><i class="bi bi-trash-fill"></i></a></td>
                                                                <td>{{$tb3->firstItem()+$loop->index}}</td>
                                                                <td>{{$row1->name}}&nbsp;&nbsp;{{$row1->Lastname}}</td>
                                                                <td><?php echo mb_substr($row1->Agency, 0, 20, 'utf-8'). "...";  ?></td>
                                                                <td>{{$row1->Branch}}</td>
                                                                <td>{{$row1->Department}}</td>
                                                                <td>{{$row1->Tel}}</td>
                                                                <td>{{$row1->email}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        
                                                    </table>
                                                <div class="d-flex justify-content-center" >
                                                {{$tb3->appends(['tb2' => $tb2->currentPage()])->links()}} 
                                             
                                                </div>
                                                    </div>
                                                <!-- /table user -->
                                                        
                                            <!-- table staff-->
                                                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab" >
                                                <table class="table table-hover ">
                                                        <thead >
                                                            <tr>
                                                                <td>แก้ไข</td>
                                                                <td>ลบ</td>
                                                                <td>ลำดับ</td>
                                                                <td>ชื่อ</td>
                                                                <td>หน่วยงาน</td>
                                                                <td>สาขา</td>
                                                                <td>แผนก</td>
                                                                <td>เบอร์โทร</td>
                                                                <td>email</td>
                                                            </tr>
                                                            @php($i=1)
                                                        </thead>
                                                        <tbody class="text-secondary">
                                                            @foreach($tb2 as $row2)
                                                        <tr>
                                                                <td> <a class="text-gray" type="button" href="{{url('/user/edit/'.$row2->id)}}"> <i class="bi bi-pencil-square "></i></a></td>
                                                                <td><a class="text-danger" href="{{url('/admin/claim/claim/'.$row2->id)}}"><i class="bi bi-trash-fill"></i></a></td>
                                                                <td >{{$tb2->firstItem()+$loop->index}}</td>
                                                                <td>{{$row2->name}}&nbsp;&nbsp;{{$row2->Lastname}}</td>
                                                                <td><?php echo mb_substr($row2->Agency, 0, 20, 'utf-8'). "...";  ?></td>
                                                                <td>{{$row2->Branch}}</td>
                                                                <td>{{$row2->Department}}</td>
                                                                <td>{{$row2->Tel}}</td>
                                                                <td>{{$row2->email}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="d-flex justify-content-center" >
                                                    {{$tb2->appends(['tb3' => $tb3->currentPage()])->links()}} 
                                                </div>
                                                </div>
                                                <!-- /table staff -->

                                                <!-- table admin-->
                                                <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab" >
                                                <table class="table table-hover ">
                                                <thead >
                                                                    <tr>
                                                                       <td>แก้ไข</td>
                                                                        <td>ลบ</td>
                                                                        <td>ลำดับ</td>
                                                                        <td>ชื่อ</td>
                                                                        <td>หน่วยงาน</td>
                                                                        <td>สาขา</td>
                                                                        <td>แผนก</td>
                                                                        <td>เบอร์โทร</td>
                                                                        <td>email</td>
                                                                    </tr>
                                                                    @php($i=1)
                                                                </thead>
                                                                <tbody class="text-secondary">
                                                                    @foreach($tb1 as $row3)
                                                                <tr>
                                                                        <td> <a class="text-gray" type="button" href="{{url('/user/edit/'.$row3->id)}}"> <i class="bi bi-pencil-square "></i></a></td>
                                                                        <td><a class="text-danger" href="{{url('/admin/claim/claim/'.$row3->id)}}"><i class="bi bi-trash-fill"></i></a></td>
                                                                        <td >{{$tb1->firstItem()+$loop->index}}</td>
                                                                        <td>{{$row3->name}}&nbsp;&nbsp;{{$row3->Lastname}}</td>
                                                                        <td><?php echo mb_substr($row3->Agency, 0, 20, 'utf-8'). "...";  ?></td>
                                                                        <td>{{$row3->Branch}}</td>
                                                                        <td>{{$row3->Department}}</td>
                                                                        <td>{{$row3->Tel}}</td>
                                                                        <td>{{$row3->email}}</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                       <div class="d-flex justify-content-center" >
                                                    {{$tb1->appends(['tb2' => $tb2->currentPage()])->links()}}
                                                         </div>                                                     
                                                           </div>
                                                    <!-- /table admin -->
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

//links
    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {

        var l = window.location;

        $.ajax({
            url: l.origin + l.pathname + "?page=" + page,
            success: function(satwork) {
                $('#table_data').html(satwork);
            }
        });
        }
    });

</script>

@endsection


