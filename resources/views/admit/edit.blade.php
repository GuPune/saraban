@extends('layouts.menu.app')
@section('content')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid py-2">
                 <br><h4><i class="bi bi-pencil-square"></i> แก้ไขลงทะเบียนรับหนังสือ</h4> <hr><br>

            <!-- ธุรการกรอก -->
                <!-- card -->
                    <div class="card">
                        <!-- card-header -->
                        <div class="card-header">
                            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
                        </div>
                        <!-- /card-header -->

                            
                            <!-- card-body -->
                                <div class="card-body" style="margin: 20px;">

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล : </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="Ename" class="form-control" value="{{$admit->Ename}}"  disabled aria-label="First name" name="Ename"   >
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label" >หน่วยงาน : </div>
                                            <div class="col-sm-9">
                                                <select class="form-control"  value="{{$admit->Eagency}}"  name="Eagency"  disabled>
                                                    <option selected>{{Auth::user()->Agency}}</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label">ฝ่าย/สาขา : </div>
                                            <div class="col-sm-9">
                                                <select class="form-control"  value="{{$admit->Edepartmentbranch}}" name="Edepartmentbranch"   disabled>
                                                    <option selected>{{Auth::user()->Department}}/{{Auth::user()->Branch}}</option>
                                                </select>
                                            </div>
                                    </div>


                        </div>
                        </div>
                      <!-- /card -->
                        <br>

    @if($admit->Status->Sname=='รอดำเนินการ')         
                               
                        <form action="{{url('/admit/edit/'.$admit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- ข้อมูลหนังสือ -->
                        <!-- card -->
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
                            </div>
                            <!-- card-body -->
                            <div class="card-body" style="margin: 20px">

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">หน่วยงาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Eagency_receive" id="agency"  required>
                                <!-- <option selected="" disabled>กรุณาเลือกหน่วยงาน</option> -->
                                <option selected  value="{{$admit->Eagency_receive}}" >กรุณาเลือกหน่วยงาน</option>
                                @foreach($agency as $rowabs)
                                <option value="{{ $rowabs->agency_id}}">{{ $rowabs->agency_name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">สาขางาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Ebranch_receive" id="branch"  required>
                                <option value="{{$admit->Ebranch_receive}}">กรุณาเลือกสาขา</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ฝ่าย ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control input-lg" name="Edepartment_receive" id="department"  required>
                                <option value="{{$admit->Edepartment_receive}}">กรุณาเลือกฝ่าย</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุลผู้รับ :</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="ชื่อ" value="{{$admit->Ename_receive}}"  name="Ename_receive" >
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่รับ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="{{$admit->Edate_receive}}" name="Edate_receive" >
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่ส่งออก :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date"  name="Edate_out"  value="{{$admit->Edate_out}}">
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เรื่อง :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Esubject" required>
                                    <option selected value="{{$admit->Esubject}}" required>{{$admit->Esubject}}</option>
                                    @foreach($story as $rowstory)
                                    <option value="{{$rowstory->amstory_name}}">{{$rowstory->amstory_name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#story"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                             <div class="col-sm-2 col-form-label">หนังสือจากหน่วยงาน :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Ebookeagency"   required>
                                    <option selected value="{{$admit->Ebookeagency}}" required>{{$admit->Ebookeagency}}</option>
                                    @foreach($admitagency as $rowagency)
                                    <option value="{{$rowagency->amagency_name}}">{{$rowagency->amagency_name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#by"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เลขที่รับหนังสือ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="กรุณากรอกเลขหนังสือ"value="{{$admit->Ebook_receipt}}" aria-label="default input example"  name="Ebook_receipt"  >
                                    </div>
                            </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                        <div class="col-sm-9">
                                            <input class="form-control" type="hidden" type="text" placeholder="สถานะ" aria-label="default input example"  name="Estatus" value="1" >
                                        </div>
                                </div>
                            <!-- /card-body -->
                            </div>
                        <!-- /card -->
                        </div>
                        <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success" type="submit" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#confirm">บันทึก</button>
                                <a href="{{route('admitstaff')}}" class="btn btn-secondary" type="button">ยกเลิก</a>
                            </div>
                        </form>
            
                        <!-- Modal เพิ่มเรื่องในselect-->
                            <div class="modal fade" id="story" tabindex="-1" aria-labelledby="storyLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="storyLabel">บันทึกข้อมูลเรื่อง</h4>
                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                    </div>
                                    <form action="{{url('/admit/add/story')}}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="modal-body">
                                    <div class="mb-3 row">
                                    <div class="col-sm-2 col-form-label">เรื่อง </div>
                                        <div class="col-sm-10">
                                     <input class="form-control" name="amstory_name" type="text" placeholder="กรุณากรอกเรื่อง" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- /เพิ่มเรื่องในselectmodal -->

                            <!-- Modal เพิ่มหนังสือจากในselect-->
                            <div class="modal fade" id="by" tabindex="-1" aria-labelledby="byLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกหนังสือจากหน่วยงาน</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <form action="{{url('/admit/add/by')}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">หนังสือจากหน่วยงาน</div>
                                        <div class="col-sm-8">
                                     <input class="form-control" name="amagency_name" type="text" placeholder="กรุณากรอกหน่วยงาน" required>
                                        </div>
                                </div>  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form><br>
                            <!-- /เพิ่มเรื่องในselectmodal -->

    @elseif($admit->Status->Sname=='ไม่ตอบรับ')

    <form action="{{url('/admit/edit/'.$admit->id)}}" method="post" enctype="multipart/form-data">
    @csrf
                       <!-- ข้อมูลหนังสือ -->
                        <!-- card -->
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ
                            </div>
                            <!-- card-body -->
                            <div class="card-body" style="margin: 20px">

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">หน่วยงาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Eagency_receive" id="agency"  required>
                                <option selected=""  disabled>กรุณาเลือกหน่วยงาน</option>
                                @foreach($agency as $rowabs)
                                <option value="{{ $rowabs->agency_id}}">{{ $rowabs->agency_name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">สาขางาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Ebranch_receive" id="branch"  required>
                                <option value="">กรุณาเลือกสาขา</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ฝ่าย ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control input-lg" name="Edepartment_receive" id="department"  required>
                                <option value="">กรุณาเลือกฝ่าย</option>
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">ชื่อ-นามสกุลผู้รับ :</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="ชื่อ"  name="Ename_receive" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่รับ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="<?php echo date("Y-m-d") ?>" name="Edate_receive" required>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่ส่งออก :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date"  name="Edate_out" required>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เรื่อง :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Esubject" required>
                                    <option selected="" value="" disabled>กรุณาเลือกเรื่อง</option>
                                    @foreach($story as $rowstory)
                                    <option value="{{$rowstory->amstory_name}}">{{$rowstory->amstory_name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#story"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                             <div class="col-sm-2 col-form-label">หนังสือจากหน่วยงาน :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Ebookeagency" required>
                                    <option selected=""  value="" disabled>กรุณาเลือกหน่วยงาน</option>
                                    @foreach($admitagency as $rowagency)
                                    <option value="{{$rowagency->amagency_name}}">{{$rowagency->amagency_name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#by"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เลขที่รับหนังสือ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="กรุณากรอกเลขหนังสือ" aria-label="default input example"  name="Ebook_receipt"  required>
                                    </div>
                            </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                        <div class="col-sm-9">
                                            <input class="form-control" type="hidden" type="text" placeholder="สถานะ" aria-label="default input example"  name="Estatus" value="1" >
                                        </div>
                                </div>
                            <!-- /card-body -->
                            </div>
                        <!-- /card -->
                        </div>
                        <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success" type="submit" style="margin-right:10px" data-bs-toggle="modal" data-bs-target="#confirm">บันทึก</button>
                                <a href="{{route('admitstaff')}}" class="btn btn-secondary" type="button">ยกเลิก</a>
                            </div>
                        </form>
            
                        <!-- Modal เพิ่มเรื่องในselect-->
                            <div class="modal fade" id="story" tabindex="-1" aria-labelledby="storyLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="storyLabel">บันทึกข้อมูลเรื่อง</h4>
                                        <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                    </div>
                                    <form action="{{url('/admit/add/story')}}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="modal-body">
                                    <div class="mb-3 row">
                                    <div class="col-sm-2 col-form-label">เรื่อง </div>
                                        <div class="col-sm-10">
                                     <input class="form-control" name="amstory_name" type="text" placeholder="กรุณากรอกเรื่อง" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- /เพิ่มเรื่องในselectmodal -->



                            <!-- Modal เพิ่มหนังสือจากในselect-->
                            <div class="modal fade" id="by" tabindex="-1" aria-labelledby="byLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกหนังสือจากหน่วยงาน</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>
                                <form action="{{url('/admit/add/by')}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">หนังสือจากหน่วยงาน</div>
                                        <div class="col-sm-8">
                                     <input class="form-control" name="amagency_name" type="text" placeholder="กรุณากรอกหน่วยงาน" required>
                                        </div>
                                </div>  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form><br>
                            <!-- /เพิ่มเรื่องในselectmodal -->

    @endif    

<!-- end -->
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function(){
    jQuery('#agency').change(function(){
       let cid=jQuery(this).val();
       jQuery.ajax({
        url:'/admit/getbranch',
        type:'post',
        data:'cid='+cid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#branch').html(result)
        }
       })
    });

    jQuery('#branch').change(function(){
       let sid=jQuery(this).val();
       jQuery.ajax({
        url:'/admit/getdepartment',
        type:'post',
        data:'sid='+sid+'&_token={{csrf_token()}}',
        success:function(result){
            jQuery('#department').html(result)
        }
       })
    });
    })
</script>
@endsection
