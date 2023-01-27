@if(Auth::user()->Image==null)
<style>
      .inner {
  font-size: 25px;
}
#bg{
    background: #087990;
}
#bguser{
    background:#4e5459;
    
    height: 170px;
}
</style>
@else
<style>
      .inner {
  font-size: 25px;
}
#bg{
    background: #087990;
}
#bguser{
    background:#4e5459;
}
</style>
@endif

@extends('layouts.menu.app')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid py-2">

<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ระบบสารบรรณ Admin</h1>
          </div><br><br> <!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-5">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4 class="py-2">หนังสือรับเข้า</h4>
                <p>ข้อมูลหนังสือรับเข้า</p>
              </div>
              <div class="icon">
                <i class="bi bi-file-earmark-check"></i>
              </div>
              <a href="{{ route('admitadmin') }}" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-6 ">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-white">
              <h4 class="py-2">หนังสือส่งออก</h4>
                <!-- <h3>44</h3>-->
                <p>ข้อมูลหนังสือส่งออก</p> 
              </div>
              <div class="icon">
                <i class="bi bi-file-arrow-up"></i>
              </div>
              <a href="{{route('bookoutadmin')}}" class="small-box-footer "><span class="text-white"> รายละเอียด </span><i class="fas fa-arrow-circle-right text-white"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-5">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h4 class="py-2">การส่งออก</h4>
                <!-- <h3>65</h3>-->

                <p>ข้อมูลรายงานการส่งออก</p> 
              </div>
              <div class="icon">
                <i class="bi bi-envelope-paper"></i>
              </div>
              <a href="{{route('transportadmin')}}" class="small-box-footer">รายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


  <!-- Main row -->
  <div class="row">
  <!-- col-lg-7 connectedSortable py-2-->
  <section class="col-lg-7 connectedSortable py-2">
    <!-- Custom tabs (Charts with tabs)-->
        <!-- TO DO List -->
    <div class="card">
      <div class="card-header " id="bg">
        <h3 class="card-title text-light">
          <i class="bi bi-bookmark-star-fill"></i>
          แจ้งเตือนใหม่ 
        </h3>
      </div>

      <div class="card-body ">
          <!-- tab table -->
          <div class="tab-content" id="custom-tabs-five-tabContent">
                  <table  class="table table-hover ">
                  <thead class="text">
                          <tr>
                              <td><small class="text-secondary">จำนวน</small></td>
                              <td><small class="text-secondary">ประเภท</small></td>
                              <td><i class="bi bi-calendar2-week-fill text-secondary"></i> </td>
                              </tr> 
                      </thead>

                      <tbody class="able table-borderless table-sm">
                             <tr>
                              <td>
                              <a href="{{route('admitadmin')}}" target ="_blank" class="text-dark"> 
                                   <small class="text "> <i class="fas fa-ellipsis-v text-secondary"></i><i class="fas fa-ellipsis-v text-secondary"></i>&nbsp;&nbsp;<span class="right badge badge-primary"><?php echo $admitcount ?></span></small>
                                   </a></td>
                              <td>
                                
                                <small class="">จดหมายรับเข้า</small>
                                <!-- <small class="text-secondary"> </small> -->
                              </td>
                              <td>
                                <small class="text-secondary">
                                @foreach($admit as $rowadmit)      
                                <?php
                                  $myDate= $rowadmit->Edate_out;
                                  $myYear = date('Y', strtotime($myDate));
                                  $myYearBuddhist = $myYear+543 ;
                                  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                  $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                  echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                  ?>
                                @endforeach
                                <i class="bi bi-clock"></i></small>
                              </td>
                           </tr>

                             <tr>
                              <td>
                              <a href="{{route('bookoutadmin')}}" target ="_blank" class="text-dark"> 
                                <small class="text "><i class="fas fa-ellipsis-v text-secondary"></i><i class="fas fa-ellipsis-v text-secondary"></i>&nbsp;&nbsp;<span class="right badge badge-warning text-white"><?php echo $bookoutcount ?></small>
                                </a></td>
                              <td>
                                <small class="">จดหมายส่งออก</small>
                              </td>
                              <td>
                                  <small class="text-secondary">
                                @foreach($bookout as $rowbookout)  
                                <?php
                                $myDate= $rowbookout->form->date;
                                $myYear = date('Y', strtotime($myDate));
                                $myYearBuddhist = $myYear+543 ;
                                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                                $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                ?>
                                @endforeach
                                <i class="bi bi-clock"></i></small>
                                </td> 
                           </tr>

                           <tr>
                            <td>
                            <a href="{{route('transportadmin')}}" target ="_blank" class="text-dark"> 
                              <small class="text "> <i class="fas fa-ellipsis-v text-secondary"></i><i class="fas fa-ellipsis-v text-secondary"></i>&nbsp;&nbsp;<span class="right badge badge-success"><?php echo $transportcount ?></small>
                              </a></td>
                            <td>
                              <small class="">รายงานการขนส่ง</small>
                              <!-- <small class="text-secondary"> จดหมายไปรษณีย์</small> -->
                            </td>
                             <td>
                              <small class="text-secondary">
                       @foreach($transport as $rowtr)   
                        <?php
                        $myDate= $rowtr->trdate;
                        $myYear = date('Y', strtotime($myDate));
                        $myYearBuddhist = $myYear+543 ;
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                        ?>
                         @endforeach
                         <i class="bi bi-clock"></i></small>
                            </td>
                         </tr>
                     </tbody>
                  </table>
             </div>
             <!-- /table table -->
        </div>
    </div>
    <!-- /.card -->
  </section>
 <!-- col-lg-7 connectedSortable py-2-->
 <section class="col-lg-5 connectedSortable py-2">
        <div class="card card-widget widget-user">
            <div class="widget-user-header" id="bguser">
                <h5 class="widget-user-desc text-light">{{Auth::user()->name}} {{Auth::user()->Lastname}}</h5>
                <h6 class="widget-user-desc text-light">{{Auth::user()->email}} </h6>
            </div>
            <div class="widget-user-image">
            @if(Auth::user()->Image==null)
              <i class="bi bi-person-circle" style="font-size:80px;color:#ffffff;margin-left:15px;" ></i>
              </div>
              <div class="card-footer" style="margin-top:-35px;" >
              @else
              <img class="img-circle elevation-2" src="/files/file/{{ Auth::user()->Image }}"  alt="User Avatar">
              </div>
              <div class="card-footer">
              @endif
                <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">หน่วยงาน</h5>
                      <small class="description-text">{{Auth::user()->Agency}}</small>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                    <h5 class="description-header">สาขา</h5>
                    <small class="description-text">{{Auth::user()->Branch}} </small>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">แผนก</h5>
                      <small class="description-text">{{Auth::user()->Department}}</small>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            </div>
            <!-- /card card-widget widget-use  -->
            </section>
        </div>
         <!-- /col-lg-5 connectedSortable py-2 -->
    </section>
</div>
 <!--// Main row -->


@endsection