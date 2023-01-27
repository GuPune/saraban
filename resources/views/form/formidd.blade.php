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
             <img src="{{ asset('dist/img/logoIDD.png') }}" width="158" height="90">
             </div><br>
             <!-- ความจริงกว้างสูง 268x152 -->
             <!-- head-form -->
             <div class="d-flex justify-content-start" style="margin-left: 40px">
             <h5>โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</h5>&nbsp;
             บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531
            </div>
             <div class="d-flex justify-content-start">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             <br></div><hr noshade="noshade" size="2"><br>
              <!-- /head-form -->

           <!-- bodyform -->
            <div class="card-body" style="margin: 20px">
            <form action="{{url('/form/add')}}" method="post" enctype="multipart/form-data">

            <!-- <form action="{{url('/addsendbook')}}" method="post" enctype="multipart/form-data"> -->
                                @csrf      
                                <div class="d-flex justify-content-end">
                                เลขที่หนังสือ&nbsp; @if(Auth::user()->Department=='ไอที')
                              ITI/@if($iti==null){{ __('001') }}@elseif($iti<=8)00{{$iti+1}}@elseif($iti>=9)0{{$iti+1}}@elseif($iti>=99){{$iti+1}}@endif/@if($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='บัญชี')
                              ACC/@if($acc==null){{ __('001') }}@elseif($acc<=8)00{{$acc+1}}@elseif($acc>=9)0{{$acc+1}}@elseif($acc>=99){{$acc+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='จัดซื้อ')
                              PUR/@if($pur==null){{ __('001') }}@elseif($pur<=8)00{{$pur+1}}@elseif($pur>=9)0{{$pur+1}}@elseif($pur>=99){{$pur+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='บุคคล')
                              HR/@if($hr==null){{ __('001') }}@elseif($hr<=8)00{{$hr+1}}@elseif($hr>=9)0{{$hr+1}}@elseif($hr>=99){{$hr+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='ธุรการ')
                              AD/@if($ad==null){{ __('001') }}@elseif($ad<=8)00{{$ad+1}}@elseif($ad>=9)0{{$ad+1}}@elseif($ad>=99){{$ad+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->Department=='การเงิน')
                              FIN/@if($fin==null){{ __('001') }}@elseif($fin<=8)00{{$fin+1}}@elseif($fin>=9)0{{$fin+1}}@elseif($fin>=99){{$fin+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->Department=='มาร์เก็ตติ้ง')
                              MKT/@if($mkt==null){{ __('001') }}@elseif($mkt<=8)00{{$mkt+1}}@elseif($mkt>=9)0{{$mkt+1}}@elseif($mkt>=99){{$mkt+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->Department=='บริหารงานพัฒนาผลิตภัณฑ์')
                              ITD/@if($itd==null){{ __('001') }}@elseif($itd<=8)00{{$itd+1}}@elseif($itd>=9)0{{$itd+1}}@elseif($itd>=99){{$itd+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}
                              
                              @elseif(Auth::user()->Department=='เซลล์')
                              SALE/@if($sale==null){{ __('001') }}@elseif($sale<=8)00{{$sale+1}}@elseif($sale>=9)0{{$sale+1}}@elseif($sale>=99){{$sale+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='กฎหมาย')
                              LEG/@if($leg==null){{ __('001') }}@elseif($leg<=8)00{{$leg+1}}@elseif($leg>=9)0{{$leg+1}}@elseif($leg>=99){{$leg+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='ส่วนงานเลขานุการ')
                              CS/@if($cs==null){{ __('001') }}@elseif($cs<=8)00{{$cs+1}}@elseif($cs>=9)0{{$cs+1}}@elseif($cs>=99){{$cs+1}}@endif/@if($total==null){{ __('001') }} @elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='ส่วนงานบริหารงานคุณภาพ')
                              ISO/@if($iso==null){{ __('001') }}@elseif($iso<=8)00{{$iso+1}}@elseif($iso>=9)0{{$iso+1}}@elseif($iso>=99){{$iso+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @elseif(Auth::user()->Department=='บริหารงานโครงการ')
                              PM/@if($pm==null){{ __('001') }}@elseif($pm<=8)00{{$pm+1}}@elseif($pm>=9)0{{$pm+1}}@elseif($pm>=99){{$pm+1}}@endif/@if($total==null){{ __('001') }}@elseif($total<=8)00{{$total+1}}@elseif($total<=9)0{{$total+1}}@elseif($total<=99){{$total+1}}@endif/{{$year}}

                              @endif

                              
                        
            <!-- <input type="hidden" class="form-control" placeholder="เลขที่หนังสือ" style="width: 300px"> -->
            </div>

            <div class="d-flex justify-content-end">
                            @if(Auth::user()->Department=='ไอที')
                              <input type="hidden" value="ITI" class="form-control" style="width: 60px" name="fdepartment">
                            @if($iti==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iti<=8)
                            <input type="hidden" value=<?php echo '00'.$iti+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iti>=9)
                            <input type="hidden" value=<?php echo '0'.$iti+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iti>=99)
                            <input type="hidden" value=<?php echo $iti+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">


                            @elseif(Auth::user()->Department=='บัญชี')
                              <input type="hidden" value="ACC" class="form-control" style="width: 60px" name="fdepartment">
                            @if($acc==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($acc<=8)
                            <input type="hidden" value=<?php echo '00'.$acc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($acc>=9)
                            <input type="text" value=<?php echo '0'.$acc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($acc>=99)
                            <input type="hidden" value=<?php echo $acc+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">


                            @elseif(Auth::user()->Department=='จัดซื้อ')
                            <input type="hidden" value="PUR" class="form-control" style="width: 60px" name="fdepartment">
                            @if($pur==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pur<=8)
                            <input type="hidden" value=<?php echo '00'.$pur+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pur>=9)
                            <input type="hidden" value=<?php echo '0'.$pur+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pur>=99)
                            <input type="hidden" value=<?php echo $pur+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">

                            @elseif(Auth::user()->Department=='บุคคล')
                            <input type="hidden" value="HR" class="form-control" style="width: 60px" name="fdepartment">
                            @if($hr==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($hr<=8)
                            <input type="hidden" value=<?php echo '00'.$hr+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($hr>=9)
                            <input type="hidden" value=<?php echo '0'.$hr+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($hr>=99)
                            <input type="hidden" value=<?php echo $hr+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">


                            @elseif(Auth::user()->Department=='ธุรการ')
                            <input type="hidden" value="AD" class="form-control" style="width: 60px" name="fdepartment">
                            @if($ad==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ad<=8)
                            <input type="hidden" value=<?php echo '00'.$ad+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ad>=9)
                            <input type="hidden" value=<?php echo '0'.$ad+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($ad>=99)
                            <input type="hidden" value=<?php echo $ad+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
                            

                            @elseif(Auth::user()->Department=='การเงิน')
                            <input type="hidden" value="FIN" class="form-control" style="width: 60px" name="fdepartment">
                            @if($fin==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($fin<=8)
                            <input type="hidden" value=<?php echo '00'.$fin+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($fin>=9)
                            <input type="hidden" value=<?php echo '0'.$fin+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($fin>=99)
                            <input type="hidden" value=<?php echo $fin+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
                            

                            @elseif(Auth::user()->Department=='มาร์เก็ตติ้ง')
                            <input type="hidden" value="MKT" class="form-control" style="width: 60px" name="fdepartment">
                            @if($mkt==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($mkt<=8)
                            <input type="hidden" value=<?php echo '00'.$mkt+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($mkt>=9)
                            <input type="hidden" value=<?php echo '0'.$mkt+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($mkt>=99)
                            <input type="hidden" value=<?php echo $mkt+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">

                            @elseif(Auth::user()->Department=='บริหารงานพัฒนาผลิตภัณฑ์')
                            <input type="hidden" value="ITD" class="form-control" style="width: 60px" name="fdepartment">
                            @if($itd==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($itd<=8)
                            <input type="hidden" value=<?php echo '00'.$itd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($itd>=9)
                            <input type="hidden" value=<?php echo '0'.$itd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($itd>=99)
                            <input type="hidden" value=<?php echo $itd+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">


                            @elseif(Auth::user()->Department=='เซลล์')
                            <input type="hidden" value="SALE" class="form-control" style="width: 70px" name="fdepartment">
                            @if($sale==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($sale<=8)
                            <input type="hidden" value=<?php echo '00'.$sale+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($sale>=9)
                            <input type="hidden" value=<?php echo '0'.$sale+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($sale>=99)
                            <input type="hidden" value=<?php echo $sale+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
                          

                            @elseif(Auth::user()->Department=='กฎหมาย')
                            <input type="hidden" value="LEG" class="form-control" style="width: 60px" name="fdepartment">
                            @if($leg==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($leg<=8)
                            <input type="hidden" value=<?php echo '00'.$leg+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($leg>=9)
                            <input type="hidden" value=<?php echo '0'.$leg+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($leg>=99)
                            <input type="hidden" value=<?php echo $leg+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
                          

                            @elseif(Auth::user()->Department=='ส่วนงานเลขานุการ')
                            <input type="hidden" value="CS" class="form-control" style="width: 60px" name="fdepartment">
                            @if($cs==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($cs<=8)
                            <input type="hidden" value=<?php echo '00'.$cs+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($cs>=9)
                            <input type="hidden" value=<?php echo '0'.$cs+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($cs>=99)
                            <input type="hidden" value=<?php echo $cs+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">


                            @elseif(Auth::user()->Department=='ส่วนงานบริหารงานคุณภาพ')
                            <input type="hidden" value="ISO" class="form-control" style="width: 60px" name="fdepartment">
                            @if($iso==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iso<=8)
                            <input type="hidden" value=<?php echo '00'.$iso+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iso>=9)
                            <input type="hidden" value=<?php echo '0'.$iso+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($iso>=99)
                            <input type="hidden" value=<?php echo $iso+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
                          

                            @elseif(Auth::user()->Department=='บริหารงานโครงการ')
                            <input type="hidden" value="PM" class="form-control" style="width: 60px" name="fdepartment">
                            @if($pm==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pm<=8)
                            <input type="hidden" value=<?php echo '00'.$pm+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pm>=9)
                            <input type="hidden" value=<?php echo '0'.$pm+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @elseif($pm>=99)
                            <input type="hidden" value=<?php echo $pm+1;?> class="form-control" style="width: 60px" name="dnumber">
                            @endif
                            @if($total==null)
                            <input type="hidden" value="001" class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total<=8)
                            <input type="hidden" value=<?php echo '00'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=9)
                            <input type="hidden" value=<?php echo '0'.$total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @elseif($total>=99)
                            <input type="hidden" value=<?php echo $total+1;?> class="form-control" style="width: 60px" name="cnumber">
                            @endif
                            <input type="hidden" value=<?php echo $year;?> class="form-control" style="width: 50px" name="year">
                            @endif
            </div><br><br>
            


            <div class="d-flex justify-content-center">
            วันที่&nbsp;
            <input type="date" class="form-control"  style="width: 300px" value="<?php echo date("Y-m-d"); ?>" name="date">
            </div><br><br><br><br>

            <div class="d-flex justify-content-start">
            เรื่อง&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกเรื่อง" style="width: 500px" name="story">
            </div>

            <div class="d-flex justify-content-start">
            เรียน&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกเรียน" style="width: 500px" name="learn">
            </div>

            <div class="d-flex justify-content-start">
            อ้างถึง&nbsp;&nbsp;
            <input type="text" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 500px" name="quote">
            </div>

            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
            <div class="d-flex justify-content-start">
            สิ่งที่ส่งมาด้วย&nbsp;&nbsp;
            <textarea id="txtMessage" name="enclosure"></textarea>
            </div><br><br><br>

            <div class="d-flex justify-content-start" style="margin-left: 40px">
            <textarea  id="txtMessage1" name="details"></textarea>

            <!-- teaxareasize -->
            <!-- สิ่งที่ส่งมาด้วย -->
                        <script>CKEDITOR.replace( 'txtMessage',{
                        height : 100,
                        width : 700
                        } )
            // รายละเอียด
                        CKEDITOR.replace( 'txtMessage1',{
                        height : 100,
                        width : 950
                        } );
                        //]]>
                        </script>
                        <script type="text/javascript">
                        //<![CDATA[</script>
              <!-- /textarea -->
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

            <!-- <div style="border: 2px solid #ff0000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br> -->
            <div style="border: 2px solid #000000; overflow: auto; width: 350px; height:auto;" style="margin: 20px"><br>
            <div class="d-flex justify-content-start"  style="margin-left: 20px">
            สอบถามได้ที่
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px">
            ชื่อ&nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกชื่อ" style="width: 200px" name="ctname">
            </div>
            <div class="d-flex justify-content-start" style="margin-left: 20px">
            เบอร์โทรศัพท์&nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกเบอร์โทร" style="width: 200px" name="ctphone">
            </div>
            <div class="d-flex justify-content-start"style="margin-left: 20px">
            E-mail &nbsp;<input type="text" class="form-control" placeholder="กรุณากรอกอีเมล" style="width: 200px" name="ctemail">
            </div><br>
            </div><br><br>

            <div class="d-flex justify-content-end">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div>

            <div class="d-flex justify-content-center">
            <div style="border: 2px solid #000000; overflow: auto; width: auto; height: auto; text-align: center;">
            <!-- <div style="border: 2px solid #e46c0a; overflow: auto; width: auto; height: auto; text-align: center;"> -->
            <img src="{{ asset('dist/img/logo1.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo2.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo3.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo4.png') }}" width="81px">
            <img src="{{ asset('dist/img/logo5.png') }}" width="70px">
            <img src="{{ asset('dist/img/logo6.png') }}" width="252px">
            <img src="{{ asset('dist/img/logo7.png') }}" width="81px">
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
  <input type="hidden" value="โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์" class="form-control" placeholder="กรุณากรอกการอ้างถึง" style="width: 300px" name="type">
   </div><br>
<!-- save cancel -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<button class="btn btn-primary" type="submit" style="margin-right:10px" >บันทึก</button>
  <a href="{{ route('form') }}" class="btn btn-secondary" type="button">ยกเลิก</a>
</div>
<!-- /save cancel -->

<!-- จบ -->
      </div>
    </div>
</div>
@endsection