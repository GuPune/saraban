<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}"  />
    <title>ระบบสารบรรณ</title>
<!-- icon -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<style>
  .font1{
    font-family: 'Sarabun', sans-serif;
  }
    .box {
        width: 30px;
        height: 30px;
        border: solid 1px #ff0000;
        font-size: 18px;
    }
    .card {
        /* margin: 2.5cm; */
        margin: 2.5cm;
        size: 21cm 29.7cm landscape;
    }
    @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
      body {
        font-family: "THSarabunNew";
        font-size: 18px;
      }
      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
      }
      .box2 {
        float: left;
        width: 110px;
        height: 100px;
        margin-right: 1px;
      }
      .box1 {
        display: flex;
        float: left;
        overflow: auto; 
        clear:left;
       
      }
      .box3 {
        float: left;
        clear:left;
      }
      p {
        margin-top:-15px;
        margin-left:5px;
      }
      #p1 {
        margin-top:-15px;
      }
</style>
<body>
       
          @if($form->type=='โรงเรียนสอนขับรถไอดีไดร์ฟเวอร์')  
             <div class="text-center">
             <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoIDD.png'))) }}" style="margin-top:-25px;" width="108" height="50"/>
             </div>
             <div class="d-flex justify-content-start" style="margin-left:40px;margin-bottom:3px;margin-top:-10px;">
             <b style="font-size:22px;">โรงเรียนสอนขับรถไอดี ไดร์ฟเวอร์</b>&nbsp;
             <b style="font-size:18px;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531</b>
            </div><p style="font-size:16px;">
             ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             </p>
             <div style="border: 0.5px solid #B4B4B4;margin:10px;margin-top:-5px;"></div>
           
             @elseif($form->type=='บริษัทไอดีไดรฟ์จำกัด(สำนักงานใหญ่)')
             <div class="box2"  style="margin-top:-20px;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoiddrives.png'))) }}" style="margin-left:10px;margin-top:-10px;" width="86px"/></div>
              <p style="margin-top:-25px;"><b style="font-size:20px;" > บริษัท ไอดีไดรฟ์ จำกัด (สำนักงานใหญ่) </b></p>
              <p style="font-size:18px;margin-top:-45px;">200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น เลขที่ผู้เสียภาษี 0405536000531</p>
              <p style="font-size:18px;margin-top:-25px;">Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.</p>
              <div style="border: 0.5px solid #B4B4B4;margin:10px;margin-top:-10px;"></div>
            
            @elseif($form->type=='สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี')
            <div class="text-center">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logoINS.png'))) }}" style="margin-top:-25px;" width="93"/>
             </div>
             <div class="d-flex justify-content-start" style="margin-left:40px;margin-bottom:3px;margin-top:-10px;">
             <b style="font-size:22px;">สถานตรวจสภาพรถ ศูนย์ตรอ.ไอดี</b>&nbsp;
             <b style="font-size:18px;">บริหารงานโดย บริษัท ไอดีไดรฟ์ จำกัด เลขที่ผู้เสียภาษี 0405536000531</b>
            </div> <p style="font-size:16px;">
            ที่อยู่ 200/222 หมู่2 ถนนชัยพฤกษ์ อำเภอเมืองขอนแก่น จังหวัดขอนแก่น Tel : 043-228 899 www.iddrices.co.th Email : idofficer@iddrives.co.th
             </p><div style="border: 0.5px solid #B4B4B4;margin:10px;margin-top:-5px;"></div>
                      
             @elseif($form->type=='ศูนย์ฝึกอบรม')
             @endif

            <div class="text-end" style="font-size:18px;">
            เลขที่หนังสือ&nbsp;{{$form->fdepartment}}/{{$form->dnumber}}/{{$form->cnumber}}/{{$form->year}} 
            </div>

            <div class="text-center" style="font-size:18px;">
            วันที่&nbsp;
            <?php
            $myDate= $form->date;
            $myYear = date('Y', strtotime($myDate));
            $myYearBuddhist = $myYear + 543;
            $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
            echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
            ?>     
            </div>

            <div class="d-flex justify-content-start" style="font-size:18px;">
            <b>เรื่อง</b>&nbsp;&nbsp;{{$form->story}}
            </div>

            <div class="d-flex justify-content-start" style="font-size:18px;">
            <b>เรียน</b>&nbsp;&nbsp;{{$form->learn}}       
            </div>

            @if($form->quote==null)
            @else
           
            <div class="d-flex justify-content-start" style="font-size:18px;">
            <b>อ้างถึง</b>&nbsp;&nbsp;{{$form->quote}}           
            </div>
             @endif

            @if($form->enclosure==null)
            <br><div style="margin-top:-15px;"></div>
            @else     
            <table class="table table-borderless">
              <tbody style="line-height: 20px;">
                <tr>
                  <td class="col-1"><b>สิ่งที่ส่งมาด้วย</b>&nbsp;&nbsp;</td>
                  <td ><p><?php echo $form->enclosure ?></p></td>
                </tr>
              </tbody>
            </table>
            @endif
            
            <div style="font-size:18px;margin-left:15px;margin-bottom:10px;margin-top:-5px;line-height: 20px;">
            <?php echo $form->details ?>
            </div>

            <div class="text-center" style="font-size:18px;">
            ขอแสดงความนับถือ
            <p>.......................................................</p>
            (.........................................................)
            </div>

            <div class="footer">
            <div style="border: 1px solid #000000; overflow: auto; width: 280px; height:auto;">
            <div class="d-flex justify-content-start"  style="margin-left: 10px;font-size:16px;">
            สอบถามได้ที่
            </div>
            <div style="margin-left:10px;font-size:16px;">
            ชื่อ&nbsp;{{$form->ctname}} 
            </div>
            <div style="margin-left:10px;font-size:16px;">
            เบอร์โทรศัพท์&nbsp;{{$form->ctphone}} 
            </div>
            <div style="margin-left:10px;font-size:16px;">
            E-mail &nbsp;{{$form->ctemail}} 
            </div>
            </div>

            <div class="text-end" style="font-size:15px;">
            FD-HO/HR-013/1 :00: 19-09-2563
            </div>

            <div class="text-center" style="margin-left:130px;font-size:18px;">
            <div style="border: 1px solid #000000; overflow: auto; width: 420px; height: auto; text-align: center; " >
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo1.png'))) }}" width="33px" style="margin-top: 5px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo2.png'))) }}" width="33px" style="margin-top: 5px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo3.png'))) }}" width="33px" style="margin-top: 9px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo4.png'))) }}" width="33px" style="margin-top: 5px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo5.png'))) }}" width="28px" style="margin-top: 8px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo6.png'))) }}" width="162px" style="margin-top: 13px"/>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('dist/img/logo7.png'))) }}" width="38px" style="margin-top: 5px"/>
            </div>
            </div>
          </div>

<!-- จบ -->
</body>
</html>
