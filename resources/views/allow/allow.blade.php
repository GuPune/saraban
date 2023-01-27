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
    #checkbox1{
        height: 20px;
        width: 20px;
        text-align: center;
    }
    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <!-- start -->
                    <br>
                <!-- card -->
                <div class="card">
                    <!-- cardhead -->
                    <div class="card-header"> กำหนดสิทธิ์ผู้ใช้งาน
                    <!-- /cardhead -->
                      
                    <!-- cardbody -->
                        <div class="card-body">
                            <!-- search date -->
                                <div class="container-right input-group" style="width: 30rem;">

                                </div>
                                <!-- /search date -->
                                <br>
                                <!-- nav-tabs status -->
                                <div class="d-flex justify-content-left">
                                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-dark " id="admin-tab" data-toggle="pill" href="#admin" role="tab" aria-controls="admin" aria-selected="true">แอดมิน</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" id="ataff-tab" data-toggle="pill" href="#staff" role="tab" aria-controls="staff" aria-selected="false" >เจ้าหน้าที่</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" id="user-tab" data-toggle="pill" href="#user" role="tab" aria-controls="user" aria-selected="false"> ผู้ใช้ </a>
                                    </li>
                                    </ul>
                                </div>
                                <br>

                                <!-- admin -->
                                    <div class="tab-content" id="custom-tabs-five-tabContent">
                                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">

                                        <table class="table table-hover" style="margin-left:20px;">
                                                <thead >
                                                    <tr>
                                                        <td><h4>รายการแอดมิน</h4></td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                            <tbody class="text-gray">
                                                    <tr>
                                                    <form action="/allow/status" method="GET"> 
                                                        <td>sidebar</td>
                                                        <td class="text-center">
                                                        <button class="btn btn-warning text-white"  type="submit" name="allow" value="asidebar" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button>
                                                    </tr>
                                                    <tr>
                                                        <td>หนังสือเข้า</td>
                                                        <td class="text-center"><button class="btn btn-warning text-white" type="submit" name="allow" value="aadmit" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>หนังสือออก</td>
                                                        <td class="text-center"><button class="btn btn-warning text-white" type="submit" name="allow" value="abookout" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>รายงานการขนส่ง</td>
                                                        <td class="text-center"><button class="btn btn-warning text-white" type="submit" name="allow" value="atransport" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    </form>
                                                </tbody>
                                            </table>
                                            </div>
                                            
                      
                                       <!-- staff -->
                                        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                                        <table class="table table-hover" style="margin-left:20px;">
                                                <thead >
                                                    <tr>
                                                        <td><h4>รายการเจ้าหน้าที่</h4></td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                            <tbody class="text-gray">
                                                    <tr>
                                                    <form action="/allow/status" method="GET"> 
                                                        <td>sidebar</td>
                                                        <td class="text-center">
                                                        <button class="btn btn-success text-white"  type="submit" name="allow" value="ssidebar" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button>
                                                    </tr>
                                                    <tr>
                                                        <td>หนังสือเข้า</td>
                                                        <td class="text-center"><button class="btn btn-success text-white" type="submit" name="allow" value="sadmit" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>หนังสือออก</td>
                                                        <td class="text-center"><button class="btn btn-success text-white" type="submit" name="allow" value="sbookout" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>รายงานการขนส่ง</td>
                                                        <td class="text-center"><button class="btn btn-success text-white" type="submit" name="allow" value="stransport" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- user -->
                                        <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                                        <table class="table table-hover" style="margin-left:20px;">
                                                <thead >
                                                    <tr>
                                                        <td><h4>รายการผู้ใช้งาน</h4></td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                            <tbody class="text-gray">
                                                    <tr>
                                                    <form action="/allow/status" method="GET"> 
                                                        <td>sidebar</td>
                                                        <td class="text-center">
                                                        <button class="btn btn-info text-white"  type="submit" name="allow" value="usidebar" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button>
                                                    </tr>
                                                    <tr>
                                                        <td>หนังสือเข้า</td>
                                                        <td class="text-center"><button class="btn btn-info text-white" type="submit" name="allow" value="uadmit" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>หนังสือออก</td>
                                                        <td class="text-center"><button class="btn btn-info text-white" type="submit" name="allow" value="ubookout" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>รายงานการขนส่ง</td>
                                                        <td class="text-center"><button class="btn btn-info text-white" type="submit" name="allow" value="utransport" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-pencil-square" style="font-size:18px"></i></button></td>
                                                    </tr>
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                        </div>
                    </div>
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


