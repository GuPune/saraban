@extends('layouts.menu.app')
@section('content')

<style>
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {

    background: #FF833C;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #FE6B00;
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
    background: #FF833C;
    color: #fff;
    cursor: pointer;
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
            <div class=" ">
                <div class="container rounded bg-white card-outline card-orange mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4 border-right">
                           <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            @if(Auth::user()->Image==null)
                            <i class="bi bi-person-circle" style="font-size:150px;margin-bottom:-30px"></i>
                            @else 
                            <br><img class="img" style="background-image:url('/files/file/{{ Auth::user()->Image }}');">
                            @endif
                            <span class="font-weight-bold">{{Auth::user()->name}} {{Auth::user()->Lastname}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">แก้ไขรหัสผ่าน</h4>
                                </div>
                                <form action="{{url('/changepassword/update/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                        @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label for="oldPasswordInput" class="labels">รหัสผ่านปัจจุบัน</label>
                                            <input name="old_password" type="password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                                placeholder="กรอกรหัสผ่านปัจจุบัน">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="newPasswordInput" class="labels">รหัสผ่านใหม่</label>
                                            <input name="new_password" type="password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                                placeholder="กรอกรหัสผ่านใหม่">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirmNewPasswordInput" class="labels">ยืนยันรหัสผ่าน</label>
                                            <input name="new_password_confirmation" type="password" id="new_password_confirmation" class="form-control" id="confirmNewPasswordInput"
                                                placeholder="ยืนยันรหัสผ่าน">
                                        </div>
                                        <div class="modal-footer" name="actions">
                                            <button type="submit" class="btn btn-primary profile-button">บันทึกข้อมูล</button>
                                             <a href="{{ route('profile') }}" class="btn btn-secondary" type="button">ย้อนกลับ</a></div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
