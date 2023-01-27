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
      table {
            border-collapse: collapse;
        }
        /* tr:nth-of-type(odd) {
            background: #eee;
        } */

        th {
            background: #5A5E63;
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 5px;
            border: 1px solid #ccc;
            text-align:center;
        }

        td {
            padding-left: 3px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
        .txet-center {
            text-align:center;
        }

</style>
<body>
  <p  style="font-size:26px" class="txet-center"> <b > รายงานการขนส่ง </b></p> 
  <table class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วันที่ฝากส่ง</th>
                                        <th>ผู้ฝากส่ง</th>
                                        <th>ผู้รับ</th>
                                        <th>ประเภทการส่ง</th>
                                        <th>เลขขนส่ง</th>
                                        <th>วันที่ส่ง</th>        
                                        </tr>
                                    @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($transport as $row)
                                <tr>
                                        <td >{{$i++}}</td>
                                        <td><?php
                                        $myDate= $row->trdate;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
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
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        @endif                   
                                    </tr>                         
                                </tbody>
                                @endforeach
                            </table><br>

<!-- จบ -->
</body>
</html>
