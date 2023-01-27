@extends('layouts.menu.app')
@section('content')
<style>

</style>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid py-2">
                <div class="card">
                <div class="card-header">แนบไฟล์หนังสือเข้า</div>
                <div class="card-body">
            <div class="mb-3 row">
            <div class="col-sm-12">
            <form action="{{url('/file/update/'.$admit->id)}}" method="post" enctype="multipart/form-data">
             @csrf
                @if($admit->Efile==null)    
                <div class="text-center"><br><br><br>
                <i class="bi bi-exclamation-triangle text-center" style="font-size:60px;color:#F44C61;margin-right:10px;"></i>
                <br>
                <h5> กรุณาเพิ่มหนังสือเข้า </h5><br><br><br>
                </div>
                <div class="mb-3 row">
                <div class="col-sm-3 col-form-label text-center">อัปโหลด</div>
                <div class="col-sm-8">
                <input type="file" class = "form-control" name="File" placeholder="File"value="{{$admit->Efile}}">
                </div>
                </div>     
                <br>     
              </div>   
            </div>

            @else
            <div class="text-center">
            <iframe height="600"  width="800" src='{{asset("/files/file/".$admit->Efile)}}'></iframe>
            </div><br><br>
            <div class="mb-3 row">
            <div class="col-sm-3 col-form-label text-center">แก้ไข</div>
            <div class="col-sm-8">
            <input type="file" class="form-control" name="File"  placeholder="File"value="{{$admit->Efile}}">
            </div> 
            </div> 

            @error('File')
                <div class="text-danger text-center">{{$message}}</div>
            @enderror

            @endif
        
            </div>
        </div>   
    </div>
    </div>
                
                        <!-- บันทึก -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" >
                        @if($admit->Efile==null)
                        <input type="submit" name="File" class ="btn btn-success" style="margin-right:5px" value="เพิ่มข้อมูล">
                        @else
                        <input type="submit" name="File" class ="btn btn-success" style="margin-right:5px" value="แก้ไขข้อมูล">
                        <a class ="btn btn-info" target ="_blank" href="/files/file/{{$admit->Efile}}" style="margin-right:5px">ดาวน์โหลด</a>
                        @endif                        
                        @if(Auth::user()->role==0)
                        <a href="{{route('admituser')}}"class="btn btn-secondary" type="button">ย้อนกลับ</a>
                        @elseif(Auth::user()->role==1)
                        <a href="{{route('admitstaff')}}"class="btn btn-secondary" type="button">ย้อนกลับ</a>
                        @elseif(Auth::user()->role==2)
                        <a href="{{route('admitadmin')}}"class="btn btn-secondary" type="button">ย้อนกลับ</a>
                        @endif      
                       </div>
                        <!-- /บันทึก -->
      </form>                  
                </div>
            </div>
        </div>
@endsection
