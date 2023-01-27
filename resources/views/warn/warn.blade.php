@extends('layouts.menu.app')
@section('content')

<!-- {{-- content-wrapper --}} -->
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">

            <ul class="nav nav-tabs d-flex justify-content-end" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link text-dark active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">หนังสือเข้า
                @if($admitcount==null)
                @else
                &nbsp; <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">&nbsp;<?php echo $admitcount ?> &nbsp;</span>&nbsp;
                @endif
            </a></li>
              <li class="nav-item">
                <a class="nav-link text-dark" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">หนังสือออก
                    @if($bookoutcount==null)
                    @else
                    &nbsp;<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">&nbsp;<?php echo $bookoutcount ?>&nbsp;</span>&nbsp;
                    @endif
            </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">รายงานการขนส่ง
                @if($transportcount==null)
                @else
                &nbsp;<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">&nbsp;<?php echo $transportcount ?>&nbsp;</span>
                @endif
            </a>
              </li>
            </ul>

        <div class="card py-4">
          <div class="card-header">
            <h1 class="card-title">
              แจ้งเตือน 
              <span class="right badge badge-danger">New</span>
            </h1> <br><br>
          </div>

          <div class="card-body">
                <h5>
                    <div class="row justify-content-around">
                        <div class="col-4"> วันที่ </div>
                        <div class="col-4"> หนังสือจาก </div>
                        <div class="col-4">เรื่อง</div>
                    </div>
                </h5><hr>

            <div class="tab-content" id="custom-content-below-tabContent">
            <!-- {{-- แจ้งเตื่อนหนังสือเข้า --}} -->
        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
        @if($admitcount==null)
        <br><h5 class="text-gray text-center"> ไม่มีแจ้งเตือนในขณะนี้ </h5>
        @else
        @foreach($admit as $rowadmit) 
        @if(Auth::user()->role==0)  
        <a href="{{route('admituser')}}" target ="_blank" class="text-dark">   
        @elseif(Auth::user()->role==1)
        <a href="{{route('admitstaff')}}" target ="_blank" class="text-dark">   
        @elseif(Auth::user()->role==2)
        <a href="{{route('admitadmin')}}" target ="_blank" class="text-dark">   
        @endif       
           <div class="row justify-content-around">          
            <div class="col-4">
            <?php
                        $myDate= $rowadmit->Edate_out;
                        $myYear = date('Y', strtotime($myDate));
                        $myYearBuddhist = $myYear+543 ;
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                        ?>
                    </div>
                    <div class="col-4">
                    {{$rowadmit->Ebookeagency}}<span class="text-warning"> (ส่งถึงฝ่าย{{$rowadmit->Department->Dpmname}})</span>
                    </div>
                     <div class="col-4">
                      {{$rowadmit->Esubject}} <span class="text-warning">({{$rowadmit->Status->Sname}})</span>
                    </div>
                </div><hr></a>
           @endforeach  
        @endif
    </div> 
            <!-- {{-- //แจ้งเตือนหนังสือเข้า --}} -->


            <!-- {{-- แจ้งเตือนหนังสือออก --}} -->
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
              @if($bookoutcount==null)
        <br><h5 class="text-gray text-center"> ไม่มีแจ้งเตือนในขณะนี้ </h5>
        @else
        @foreach($bookout as $rowbookout)  
        @if(Auth::user()->role==0)  
        <a href="{{route('bookoutuser')}}" target ="_blank" class="text-dark">       
        @elseif(Auth::user()->role==1)
        <a href="{{route('bookoutstaff')}}" target ="_blank" class="text-dark">       
        @elseif(Auth::user()->role==2)
        <a href="{{route('bookoutadmin')}}" target ="_blank" class="text-dark">       
        @endif     
          <div class="row justify-content-around">
                    <div class="col-4">
                    <?php
                        $myDate= $rowbookout->form->date;
                        $myYear = date('Y', strtotime($myDate));
                        $myYearBuddhist = $myYear+543 ;
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                        ?>
                    </div>
                    <div class="col-4">
                    ฝ่าย{{$rowbookout->Odepartment}}/{{$rowbookout->Obranch}}
                    </div>
                    <div class="col-4">
                      {{$rowbookout->form->story}} <span class="text-warning"></span>
                    </div>
                </div> <hr></a>
          @endforeach  
          @endif
        </div> <!-- {{-- //แจ้งเตือนหนังสือออก --}} -->

              <!-- {{-- แจ้งเตือนรายงานขนส่ง --}} -->
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
              @if($transportcount==null)
        <br><h5 class="text-gray text-center"> ไม่มีแจ้งเตือนในขณะนี้ </h5>
        @else
         @foreach($transport as $rowtr)
         @if(Auth::user()->role==0)  
         <a href="{{route('transportuser')}}" target ="_blank" class="text-dark">     
        @elseif(Auth::user()->role==1)
        <a href="{{route('transportstaff')}}" target ="_blank" class="text-dark">     
        @elseif(Auth::user()->role==2)
        <a href="{{route('transportadmin')}}" target ="_blank" class="text-dark">     
        @endif      
          <div class="row justify-content-around">
                    <div class="col-4">
                    <?php
                        $myDate= $rowtr->trdate;
                        $myYear = date('Y', strtotime($myDate));
                        $myYearBuddhist = $myYear+543 ;
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                        ?>
                    </div>
                    <div class="col-4">
                    ฝ่าย{{$rowtr->trdepartment}}/{{$rowtr->trbranch}}
                    </div>
                    <div class="col-4">
                      {{$rowtr->form->story}} <span class="text-warning">({{$rowtr->Status->Sname}})</span>
                    </div>
                </div> <hr></a>
          @endforeach  
          <!-- {{-- //แจ้งเตือนรายงานขนส่ง --}} -->
        @endif
          </div>
              </div>
            </div> 
          </div> 


<!-- จบ -->
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



