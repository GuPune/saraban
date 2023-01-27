@extends('layouts.menu.app')
@section('content')
<style>
    /* body {
    background: rgb(99, 39, 120)
} */

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {

    background:  #BA68C8;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background:  #682773;
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #3c76ff;
    color: #fff;
    cursor: pointer;
}
.img3{
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

            <form action="{{url('/user/update/'.$user->id)}}" method="post" >
                @csrf

                <!-- <div class="card card-outline card-orange "> -->
                <div class=" ">
                <div class="container rounded bg-white card-outline card-purple mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            @if($user->Image == null)
                            <span><i class="bi bi-person-circle" style="font-size:100px;margin-left:10px"></i>
                            @else
                            <span><img  style='background-image:url(/files/file//<?php echo $user->Image ?>);' class='img3'  class="img-thumbnail">
                            @endif</span>
                                <span class="font-weight-bold">{{$user->name}} {{$user->Lastname}}</span><span class="text-black-50">{{$user->email}}</span><span> </span>
                                </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">แก้ไขข้อมูลผู้ใช้</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">ชื่อ</label><input type="text" class="form-control" placeholder="กรุณากรอกชื่อ" name="name" value="{{$user->name}}" ></div>
                                    <div class="col-md-6"><label class="labels">นามสกุล</label><input type="text" class="form-control" placeholder="กรุณากรอกนามสกุล" name="Lastname" value="{{$user->Lastname}}"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">เบอร์โทรศัพท์</label><input type="text" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์" name="Tel" value="{{$user->Tel}}"></div>
                                    <div class="col-md-12"><label class="labels">ที่อยู่</label><input type="text" class="form-control" placeholder="กรุณากรอกที่อยู่" name="address" value="{{$user->address}}"></div>
                                    <div class="col-md-12"><label class="labels">อีเมล</label><input type="text" class="form-control" placeholder="กรุณากรอกอีเมล" name="email" value="{{$user->email}}" ></div>
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">บันทึกข้อมูล</button>
                                <a href="{{ route('claim') }}" class="btn btn-secondary" type="button">ย้อนกลับ</a></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="col-md-12"><label class="labels">หน่วยงาน</label>
                                <select name="Agency" id="input"  class="form-control" required="required" >
                                <option  disabled>{{$user->agency->agency_name}}</option>
                                @foreach($agency as $rowa)
                                    <option value="{{$rowa->agency_name}}"  <?php if ($user->Agency =$rowa->agency_name) {echo "{{$user->agency->agency_name}}";} ?>>{{$rowa->agency_name }}</option>
                                @endforeach 
                                </select>
                                
                                <div class="col-md-12"><label class="labels">สาขา</label>
                                <select name="Branch" id="input"  class="form-control" required="required" >
                                <option  disabled>{{$user->branch->branche_name}}</option>
                                @foreach($branch as $rowb)
                                    <option value="{{$rowb->branche_name}}"  <?php if ($user->Branch =$rowb->branche_name) {echo "{{$user->branch->branche_name}}";} ?>>{{$rowb->branche_name }}</option>
                                @endforeach 
                                </select>
                                </div>

                                <div class="col-md-12"><label class="labels">แผนก</label>
                                <select name="Department" id="input"  value="{{$user->department->Dpmname}}" class="form-control" required="required" >
                                <option value="{{$user->department->Dpmname}}" selected>{{$user->department->Dpmname}}</option>
                                @foreach ($department as $rowd)
                                    <option value="{{ $rowd->Dpmname }}" <?php ( $user->Department ==$rowd->Dpmname) ? 'selected' : '' ?>> {{ $rowd->Dpmname }} </option>
                                @endforeach  
                                </select>
                                </div>

                                @if(Auth::user()->role==2)
                                <br><div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  name="role" value="0" id="inlineRadio2"  {{ ($user->role=="0")? "checked" : "" }} >
                                    <label class="form-check-label" for="inlineRadio1"> ผู้ใช้งาน </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="1"  id="inlineRadio2"  {{ ($user->role=="1")? "checked" : "" }} >
                                    <label class="form-check-label" for="inlineRadio1"> เจ้าหน้าที่ </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="2"  id="inlineRadio2"  {{ ($user->role=="2")? "checked" : "" }} >
                                    <label class="form-check-label" for="inlineRadio1"> แอดมิน </label>
                                    </div>
                                </div>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </form>

            <!-- จบ -->
        </div>
    </div>
</div>

@endsection

