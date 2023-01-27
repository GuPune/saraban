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

        /* สลับสีแถว */
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
        .story{
        width: 50px;
        display: flex;
        overflow: auto; 
        clear:left;
             word-wrap: break-all;
            float:left;
           /* overflow-y: auto; */
        }
        .txet-center {
            text-align:center;
        }
.agency{
    width: 9em; 
    word-wrap: break-word;
}
.story1{
    width: 5em; 
    word-wrap: break-word;
}
.number{
    width: 5em; 
    word-wrap: break-word;
}
.db{
    width: 8em; 
    word-wrap: break-word;
}
.date{
    width: 2em; 
    word-wrap: break-word;
}
.index{
    width:2em; 
    word-wrap: break-word;
}
.name{
    width:6em; 
    word-wrap: break-word;
}


</style>
<body>
  <p  style="font-size:26px" class="txet-center"> <b > รายงานหนังสือจดหมายออก </b></p> 
  <table class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วันที่หนังสือ</th>
                                        <th>ฝ่าย/สาขา</th>   
                                        <th>เลขที่หนังสือ</th>
                                        <th>ถึงหน่วยงาน</th>
                                        <th>เรื่อง</th>     
                                        <th>ผู้ออกจดหมาย</th>
                                        </tr> 
                                        @php($i=1)
                                </thead>
                                <tbody>
                                @foreach($bookoutrow as $row)
                                <tr>       
                                        <td class="index">{{$i++}}</td>
                                        <td class="date"><?php
                                        $myDate= $row->Odate;
                                        $myYear = date('Y', strtotime($myDate));
                                        $myYearBuddhist = mb_strimwidth($myYear+543 , -2, 2);
                                        $thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                        $myMonth = $thaimonth[date(" m ", strtotime($myDate))-1];
                                        echo date("d $myMonth ",strtotime($myDate)).$myYearBuddhist;
                                        ?></td>
                                        <td class="db">ฝ่าย{{$row->Odepartment}}/{{$row->Obranch}}</td>
                                        <td class="number">{{$row->Onumber}}</td>
                                        <td class="agency">{{$row->Oag_receive}}</td>
                                        <!-- <td class="story">{{$row->Ostory}} </td> -->
                                        <td class="story1">
                                        <?php 
                                        if(strlen($row->form->story) > 60){
                                        echo mb_substr($row->form->story, 0, 60).'...';
                                        }
                                        elseif(strlen($row->form->story) <= 60){
                                            echo mb_substr($row->form->story, 0, 60);
                                        }
                                        ?>
                                        </td>
                                        <td class="name">{{$row->Oname}}</td>
                                        </tr>
                                </tbody>  
                               @endforeach
                            </table> <br>

<!-- จบ -->
</body>
</html>
