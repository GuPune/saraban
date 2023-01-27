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

                <!-- card -->
                <br>
               
               
                <div class="card"> 
                    
                @if($_GET['allow']=='asidebar')
                <div class="card-header">กำหนดสิทธิ์เมนูด้านข้างแอดมิน</div>
                
                @elseif($_GET['allow']=='aadmit')
                <div class="card-header">กำหนดสิทธิ์หนังสือเข้าแอดมิน </div>
                @elseif($_GET['allow']=='abookout')
                <div class="card-header">กำหนดสิทธิ์หนังสือออกแอดมิน </div>
                @elseif($_GET['allow']=='atransport')
                <div class="card-header">กำหนดสิทธิ์รายงานขนส่งแอดมิน </div>

                @elseif($_GET['allow']=='ssidebar')
                <div class="card-header">กำหนดสิทธิ์เมนูด้านข้างเจ้าหน้าที่ </div>
                @elseif($_GET['allow']=='sadmit')
                <div class="card-header">กำหนดสิทธิ์หนังสือเข้าเจ้าหน้าที่ </div>
                @elseif($_GET['allow']=='sbookout')
                <div class="card-header">กำหนดสิทธิ์หนังสือออกเจ้าหน้าที่ </div>
                @elseif($_GET['allow']=='stransport')
                <div class="card-header">กำหนดสิทธิ์รายงานขนส่งเจ้าหน้าที่ </div>

                @elseif($_GET['allow']=='usidebar')
                <div class="card-header"> กำหนดสิทธิ์เมนูด้านข้างผู้ใช้งาน </div>
                @elseif($_GET['allow']=='uadmit')
                <div class="card-header"> กำหนดสิทธิ์หนังสือเข้าผู้ใช้งาน </div>
                @elseif($_GET['allow']=='ubookout')
                <div class="card-header"> กำหนดสิทธิ์หนังสือออกผู้ใช้งาน </div>
                @elseif($_GET['allow']=='utransport')
                <div class="card-header"> กำหนดสิทธิ์รายงานขนส่งผู้ใช้งาน </div>
                @else
                <div class="card-header">กำหนดสิทธิ์ผู้ใช้งาน</div>
                @endif 
                    <!-- <div class="card-header"></div> -->
                        <div class="card-body">
                                            <table  class="table table-hover" style="margin-left:20px;">
                                                <thead >
                                                    <tr>
                                                        <td>แถบเมนู</td>
                                                        <td>สถานะ</td>
                                                    </tr>
                                                </thead>

                                            <!-- sidebaradmin -->
                                            @if($_GET['allow']=='asidebar')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowadminsidebar as $rowadminsidebar)
                                                    <tr>
                                                        <td>{{$rowadminsidebar->pername}}</td>
                                                        <td>
                                                            @if($rowadminsidebar->adminstatus==1)
                                                                <a href="{{ url('/allow/allow/'.$rowadminsidebar->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowadminsidebar->adminstatus==0)
                                                                <a href="{{ url('/allow/allow/'.$rowadminsidebar->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                             <!-- sidebarstaff -->
                                             @elseif($_GET['allow']=='ssidebar')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowstaffsidebar as $rowstaffsidebar)
                                                    <tr>
                                                        <td>{{$rowstaffsidebar->pername}}</td>
                                                        <td>
                                                            @if($rowstaffsidebar->staffstatus==1)
                                                                <a href="{{ url('/allow/staff/'.$rowstaffsidebar->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowstaffsidebar->staffstatus==0)
                                                                <a href="{{ url('/allow/staff/'.$rowstaffsidebar->id) }}"  class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                              <!-- sidebaruser-->
                                           @elseif($_GET['allow']=='usidebar')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowusersidebar as $rowusersidebar)
                                                    <tr>
                                                        <td>{{$rowusersidebar->pername}}</td>
                                                        <td>
                                                            @if($rowusersidebar->userstatus==1)
                                                                <a href="{{ url('/allow/user/'.$rowusersidebar->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowusersidebar->userstatus==0)
                                                                <a href="{{ url('/allow/user/'.$rowusersidebar->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>

                                             
                                            <!-- admitadmin -->
                                            @elseif($_GET['allow']=='aadmit')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowadminadmit as $rowadminadmit)
                                                    <tr>
                                                        <td>{{$rowadminadmit->pername}}</td>
                                                        <td>
                                                            @if($rowadminadmit->adminstatus==1)
                                                                <a href="{{ url('/allow/allow/'.$rowadminadmit->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowadminadmit->adminstatus==0)
                                                                <a href="{{ url('/allow/allow/'.$rowadminadmit->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                             <!-- admitstaff -->
                                             @elseif($_GET['allow']=='sadmit')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowstaffadmit as $rowstaffadmit)
                                                    <tr>
                                                        <td>{{$rowstaffadmit->pername}}</td>
                                                        <td>
                                                            @if($rowstaffadmit->staffstatus==1)
                                                                <a href="{{ url('/allow/staff/'.$rowstaffadmit->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowstaffadmit->staffstatus==0)
                                                                <a href="{{ url('/allow/staff/'.$rowstaffadmit->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                           <!-- admituser-->
                                           @elseif($_GET['allow']=='uadmit')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowuseradmit as $rowuseradmit)
                                                    <tr>
                                                        <td>{{$rowuseradmit->pername}}</td>
                                                        <td>
                                                            @if($rowuseradmit->userstatus==1)
                                                                <a href="{{ url('/allow/user/'.$rowuseradmit->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowuseradmit->userstatus==0)
                                                                <a href="{{ url('/allow/user/'.$rowuseradmit->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>

                                             <!-- bookoutadmin -->
                                             @elseif($_GET['allow']=='abookout')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowadminbookout as $rowadminbookout)
                                                    <tr>
                                                        <td>{{$rowadminbookout->pername}}</td>
                                                        <td>
                                                            @if($rowadminbookout->adminstatus==1)
                                                                <a href="{{ url('/allow/allow/'.$rowadminbookout->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowadminbookout->adminstatus==0)
                                                                <a href="{{ url('/allow/allow/'.$rowadminbookout->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                            <!-- bookoutstaff -->
                                            @elseif($_GET['allow']=='sbookout')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowstaffbookout as $rowstaffbookout)
                                                    <tr>
                                                        <td>{{$rowstaffbookout->pername}}</td>
                                                        <td>
                                                            @if($rowstaffbookout->staffstatus==1)
                                                                <a href="{{ url('/allow/staff/'.$rowstaffbookout->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowstaffbookout->staffstatus==0)
                                                                <a href="{{ url('/allow/staff/'.$rowstaffbookout->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                            <!-- bookoutuser-->
                                           @elseif($_GET['allow']=='ubookout')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowuserbookout as $rowuserbookout)
                                                    <tr>
                                                        <td>{{$rowuserbookout->pername}}</td>
                                                        <td>
                                                            @if($rowuserbookout->userstatus==1)
                                                                <a href="{{ url('/allow/user/'.$rowuserbookout->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowuserbookout->userstatus==0)
                                                                <a href="{{ url('/allow/user/'.$rowuserbookout->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>

                                             <!-- transportadmin -->
                                             @elseif($_GET['allow']=='atransport')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowadmintransport as $rowadmintransport)
                                                    <tr>
                                                        <td>{{$rowadmintransport->pername}}</td>
                                                        <td>
                                                            @if($rowadmintransport->adminstatus==1)
                                                                <a href="{{ url('/allow/allow/'.$rowadmintransport->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowadmintransport->adminstatus==0)
                                                                <a href="{{ url('/allow/allow/'.$rowadmintransport->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                             <!-- transportstaff -->
                                            @elseif($_GET['allow']=='stransport')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowstafftransport as $rowstafftransport)
                                                    <tr>
                                                        <td>{{$rowstafftransport->pername}}</td>
                                                        <td>
                                                            @if($rowstafftransport->staffstatus==1)
                                                                <a href="{{ url('/allow/staff/'.$rowstafftransport->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowstafftransport->staffstatus==0)
                                                                <a href="{{ url('/allow/staff/'.$rowstafftransport->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                           <!-- transportuser-->
                                           @elseif($_GET['allow']=='utransport')
                                            <tbody class="text-secondary ">    
                                                @foreach($allowusertransport as $rowusertransport)
                                                    <tr>
                                                        <td>{{$rowusertransport->pername}}</td>
                                                        <td>
                                                            @if($rowusertransport->userstatus==1)
                                                                <a href="{{ url('/allow/user/'.$rowusertransport->id) }}" class="btn btn-sm btn-success" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye" style="font-size:20px"></i></a>
                                                            @elseif($rowusertransport->userstatus==0)
                                                                <a href="{{ url('/allow/user/'.$rowusertransport->id) }}" class="btn btn-sm btn-danger" style ="border-radius: 20px; padding: .25rem 1rem"><i class="bi bi-eye-slash" style="font-size:20px"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                   @endforeach   
                                            </tbody>
                                            @endif
                                            </table>
                                            </div>
                                            
                                    </div>
                        </div>

            
                    <!-- button -->
                              <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin:20px">
                                <a href="{{route('allow')}}" class="btn btn-secondary" type="button">ย้อนกลับ</a>
                            </div>
                        <!--/button  -->
    </div>
    <!-- end -->
            </div>
        </div>
    </div>

@endsection


