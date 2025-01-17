@extends('layouts.menu.app')
@section('content')
<style>
.show {
    color: #797979;
    /* background: #f1f2f7; */
    /* font-family: 'Open Sans', sans-serif; */
    padding: 0px !important;
    margin: 0px !important;
    font-size: 14px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
}

.profile-nav, .profile-info{
    margin-top:60px;
}

.profile-nav .user-heading {
    background: #FF833C;
    color: #fff;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    padding: 30px;
    text-align: center;
}

.profile-nav .user-heading.round a  {
    border-radius: 50%;
    -webkit-border-radius: 50%;
    border: 10px solid rgba(255,255,255,0.3);
    display: inline-block;
}

.profile-nav .user-heading a img {
    width: 112px;
    height: 112px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
}

.profile-nav .user-heading h1 {
    font-size: 22px;
    font-weight: 300;
    margin-bottom: 5px;
}

.profile-nav .user-heading p {
    font-size: 12px;
}

.profile-nav ul {
    margin-top: 1px;
}

.profile-nav ul > li {
    border-bottom: 1px solid #ebeae6;
    margin-top: 0;
    line-height: 30px;
}

.profile-nav ul > li:last-child {
    border-bottom: none;
}

.profile-nav ul > li > a {
    border-radius: 0;
    -webkit-border-radius: 0;
    color: #89817f;
    border-left: 5px solid #fff;
}

.profile-nav ul > li > a:hover, .profile-nav ul > li > a:focus, .profile-nav ul li.active  a {
    background: #f8f7f5 !important;
    border-left: 5px solid #FF833C;
    color: #89817f !important;
}

.profile-nav ul > li:last-child > a:last-child {
    border-radius: 0 0 4px 4px;
    -webkit-border-radius: 0 0 4px 4px;
}

.profile-nav ul > li > a > i{
    font-size: 16px;
    padding-right: 10px;
    color: #bcb3aa;
}

.r-activity {
    margin: 6px 0 0;
    font-size: 12px;
}


.p-text-area, .p-text-area:focus {
    border: none;
    font-weight: 300;
    box-shadow: none;
    color: #c3c3c3;
    font-size: 16px;
}

.profile-info .panel-footer {
    background-color:#f8f7f5 ;
    border-top: 1px solid #e7ebee;
}

.profile-info .panel-footer ul li a {
    color: #7a7a7a;
}

/* เฮด */
.bio-graph-heading {
    background: #525252;
    color: #fff;
    text-align: center;
    font-style: italic;
    padding: 40px 110px;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    font-size: 16px;
    font-weight: 300;
}

.bio-graph-info {
    color: #89817e;
}

.bio-graph-info h1 {
    font-size: 22px;
    font-weight: 300;
    margin: 0 0 20px;
}

.bio-row {
    width: 50%;
    float: left;
    margin-bottom: 10px;
    padding:0 15px;
}

.bio-row p span {
    width: 100px;
    display: inline-block;
}

.img{
        background-position: center;
        background-size: cover;  
        border-radius: 50%;
        width: 200px;
        height: 200px;
      }

</style>

        <div class="content-wrapper">
            <div class="content-header">
            <div class="container-fluid py-4">
            <!-- เริ่ม -->
            <div class="show">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                <div class="container bootstrap snippets bootdey">
                <div class="row">
                <div class="profile-nav col-md-3">
                <div class="panel">
                            
                                @if(Auth::user()->Image==null)
                                <div class="user-heading round">
                                <i class="bi bi-person-circle" style="font-size:100px;color:#FFF0E7;"></i>
                                <h1 style="margin-top:-20px;">{{Auth::user()->name}} {{Auth::user()->Lastname}}</h1>
                                <p style="margin-top:-10px;">{{Auth::user()->email}}</p>
                                </div>
                                @else
                                <div class="user-heading round">
                                <a href="#">
                                <img class="img" style="background-image:url('/files/file/{{ Auth::user()->Image }}');">
                                 </a>
                                <h1>{{Auth::user()->name}} {{Auth::user()->Lastname}}</h1>
                                <p>{{Auth::user()->email}}</p>
                                </div>
                                @endif
                               

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a type="button" href="#" class="btn btn-light"> <i class="fa fa-user"></i>ข้อมูล</a></li>
                                    <li class="active"><a type="button" href="{{url('/profile/editprofile/'.Auth::user()->id)}}"  class="btn btn-light"> <i class="fa fa-edit"></i>แก้ไขข้อมูลส่วนตัว</a></li>
                            </ul>
                        </div>
                    </div>
                        <div class="profile-info col-md-9">
                            <div class="panel">
                                </footer>
                            </div>
                            <div class="panel">
                                <div class="bio-graph-heading"></div>
                                <div class="card" >
                                    <div class="panel-body bio-graph-info" style="margin:20px">
                                    <h1>ข้อมูลส่วนตัว</h1>
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>ชื่อ :</span>{{Auth::user()->Prefix}} {{Auth::user()->name}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>นามสกุล : </span>{{Auth::user()->Lastname}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>หน่วยงาน :</span> {{Auth::user()->Agency}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>สาขา : </span>{{Auth::user()->Branch}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>แผนก : </span>ฝ่าย{{Auth::user()->Department}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>ระดับผู้ใช้ : </span>{{Auth::user()->level->levelname}}</p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>อีเมล : </span>{{Auth::user()->email}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>เบอร์โทรศัพท์ : </span> {{Auth::user()->Tel}} </p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>ที่อยู่ : </span> {{Auth::user()->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div>
                </div>
                </div>
                </div>
                </div>
</div>
            <!-- จบ -->
            </div>
        </div>
    </div>

@endsection


