@extends('layouts.menu.app')
@section('content')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid py-2">
                 <br><h4><i class="bi bi-pencil-square"></i> ลงทะเบียนรับหนังสือ</h4> <hr><br>

            <!-- ธุรการกรอก -->
                <!-- card -->
                    <div class="card">
                        <!-- card-header -->
                        <div class="card-header">
                            <i class="bi bi-person-fill"></i> ข้อมูลรายละเอียดผู้บันทึก
                        </div>
                        <!-- /card-header -->


                            <form action="{{route('addbookadd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- card-body -->
                                <div class="card-body" style="margin: 20px;">

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label">ชื่อ-นามสกุล : </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="Ename" class="form-control" value="{{Auth::user()->name}} {{Auth::user()->Lastname}}"  disabled aria-label="First name" name="Ename"   >
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label" >หน่วยงาน : </div>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="Eagency"  disabled>
                                                    <option selected>{{Auth::user()->Agency}}</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-2 col-form-label">ฝ่าย/สาขา : </div>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="Edepartmentbranch"   disabled>
                                                    <option selected>{{Auth::user()->Department}}/{{Auth::user()->Branch}}</option>
                                                </select>
                                            </div>
                                    </div>


                        </div>
                        </div>
                      <!-- /card -->
                        <br>

                        <!-- ข้อมูลหนังสือ -->
                        <!-- card -->
                        <div class="card">
                            <div class="card-header"><i class="bi bi-journal-text"></i>  ข้อมูลหนังสือ</div>

                            <!-- card-body -->
                            <div class="card-body" style="margin: 20px">

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">หน่วยงาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Eagency_receive" id="agency" aria-label="Default select example" required>
                                <!-- <option selected="" disabled>กรุณาเลือกหน่วยงาน</option> -->
                                <option selected="" disabled>กรุณาเลือกหน่วยงาน</option>
                                @foreach($agency as $rowabs)
                                <option value="{{ $rowabs->agency_id}}">{{ $rowabs->agency_name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">สาขางาน ผู้รับ</div>
                                <div class="col-sm-9">
                                <select class="form-control" name="Ebranch_receive" id="branch" aria-label="Default select example" required>
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
                                <div class="col-sm-2 col-form-label">ชื่อ ผู้รับ :</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="กรุณากรอกชื่อ"   name="Ename_receive" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">วันที่รับ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>" name="Edate_receive" required>
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
                                    <select class="form-control" name="Esubject" id="Esubject"  required>
                                    <option selected disabled>กรุณาเลือกเรื่อง</option>
                                    {{-- @foreach($story as $rowstory)
                                    <option value="{{$rowstory->amstory_name}}">{{$rowstory->amstory_name}}</option>
                                    @endforeach --}}
                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#story"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>


                            <div class="mb-3 row">
                             <div class="col-sm-2 col-form-label">หนังสือจากหน่วยงาน :</div>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="Ebookeagency" id="Ebookeagency" required>
                                    <option selected disabled>กรุณาเลือกหน่วยงาน</option>

                                    </select>
                                    </div>
                                    <button type="button" class="btn btn-light" style ="border-radius: 100px; padding: .25rem 0.8rem" data-bs-toggle="modal" data-bs-target="#by"><i class="bi bi-plus-circle" style="font-size:20px;"></i></button>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-2 col-form-label">เลขที่รับหนังสือ :</div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="กรุณากรอกเลขหนังสือ" name="Ebook_receipt"  required>
                                    </div>
                            </div>

                                        @if($admitcount<=8)
                                        <input class="form-control" type="hidden" placeholder="กรุณากรอกเลขหนังสือ" value="<?php echo '00'.$admitcount+1;?>" name="Ebooknumber" >
                                        @elseif($admitcount>=9)
                                        <input class="form-control" type="hidden" placeholder="กรุณากรอกเลขหนังสือ" value="<?php echo '0'.$admitcount+1;?>" name="Ebooknumber">
                                        @elseif($admitcount>=99)
                                        <input class="form-control" type="hidden" placeholder="กรุณากรอกเลขหนังสือ" value="<?php echo $admitcount+1;?>" name="Ebooknumber">
                                        @endif
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                        <div class="col-sm-9">
                                            <input class="form-control" type="hidden" type="text" placeholder="สถานะ" name="Estatus" value="1" >
                                        </div>
                                </div>
                            <!-- /card-body -->
                            </div>
                        <!-- /card -->
                        </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success" type="submit" style="margin-right:10px">บันทึก</button>
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


                                    <div class="modal-body">
                                    <div class="mb-3 row">
                                    <div class="col-sm-2 col-form-label">เรื่อง </div>
                                        <div class="col-sm-10">
                                     <input class="form-control" name="amstory_name" id="amstory_name" type="text" placeholder="กรุณากรอกเรื่อง" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="button" class="btn btn-success btn-save">บันทึกข้อมูล</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /เพิ่มเรื่องในselectmodal -->

                            <!-- Modal เพิ่มหนังสือจากในselect-->
                            <div class="modal fade" id="by" tabindex="-1" aria-labelledby="byLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="byLabel">บันทึกหนังสือจากหน่วยงาน</h4>
                                    <i class="bi bi-x-circle" type="button" data-bs-dismiss="modal" aria-label="Close" style='font-size:25px'></i>
                                </div>

                                <div class="modal-body">
                                <div class="mb-3 row">
                                    <div class="col-sm-4 col-form-label">หนังสือจากหน่วยงาน</div>
                                        <div class="col-sm-8">
                                     <input class="form-control" name="amagency_name" id="amagency_name" type="text" placeholder="กรุณากรอกหน่วยงาน" required>
                                        </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="button" class="btn btn-success btn-save-amagency">บันทึกข้อมูล</button>
                                </div>
                                </div>
                            </div>
                            </div>

                        <br>
                            <!-- /เพิ่มเรื่องในselectmodal -->


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


    $(document).ready(function(){
        $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/admit/story',
                    success: function(datas){


                    //    data = JSON.parse(datas);
                    // amstory_id
                    // amstory_name
// loop through our returned data and add an option to the select for each province returned
$.each(datas, function(i, item) {
  $('#Esubject').append($('<option>', {value:item.amstory_name, text:item.amstory_name}));
});

                   // $('select[name="Esubject"]').html(datas);
                    }
                })



                $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/admit/admitagency',
                    success: function(data){


                    //    data = JSON.parse(datas);
                    // amstory_id
                    // amstory_name
// loop through our returned data and add an option to the select for each province returned

$.each(data, function(x, itemx) {
  $('#Ebookeagency').append($('<option>', {value:itemx.amagency_name, text:itemx.amagency_name}));
});

                   // $('select[name="Esubject"]').html(datas);
                    }
                })


    });



    $('body').on('click', '.btn-save-amagency', function () {

        var amagency_name = $('#amagency_name').val();



        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var token = '{{ csrf_token() }}';


        $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{amagency_name:amagency_name,'_token': token},
                    url: '/admit/admitagency/save',
                    success: function(datas){
                        var amagency_name = $('#amagency_name').val('');
                        newselectEbookeagency();

                    }
                })


                $('#by').modal('hide');
    })
    $('body').on('click', '.btn-save', function () {

        var amstory_name = $('#amstory_name').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var token = '{{ csrf_token() }}';


        $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{amstory_name:amstory_name,'_token': token},
                    url: '/admit/story/save',
                    success: function(datas){
                        var amstory_name = $('#amstory_name').val('');
                        newselect();

                    }
                })

        $('#story').modal('hide');





    });

    function newselect(){

        $("#Esubject").empty();

        $.ajax({
                    dataType: 'json',
                    type:'GET',
                    url: '/admit/story',
                    success: function(datas){


                    //    data = JSON.parse(datas);
                    // amstory_id
                    // amstory_name
// loop through our returned data and add an option to the select for each province returned

$('#Esubject').append($('<option selected disabled>กรุณาเลือกเรื่อง</option>'));
$.each(datas, function(i, item) {
  $('#Esubject').append($('<option>', {value:item.amstory_name, text:item.amstory_name}));
});

                   // $('select[name="Esubject"]').html(datas);
                    }
                })

    }



    function newselectEbookeagency(){

$("#Ebookeagency").empty();

$.ajax({
            dataType: 'json',
            type:'GET',
            url: '/admit/admitagency',
            success: function(datas){


            //    data = JSON.parse(datas);
            // amstory_id
            // amstory_name
// loop through our returned data and add an option to the select for each province returned

$('#Ebookeagency').append($('<option selected disabled>กรุณาเลือกเรื่อง</option>'));
$.each(datas, function(i, item) {
$('#Ebookeagency').append($('<option>', {value:item.amagency_name, text:item.amagency_name}));
});

           // $('select[name="Esubject"]').html(datas);
            }
        })

}





</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#seveData').on('click',function(){
    $ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'admit/add/story',
        type: 'POST',
        data: $('#createForm').serialize(),
        success:function(response){
            console.log(response,'reponse')
        },
    })
});
});
</script>
@endsection
