@extends('layouts.menu.app')
@section('content')


<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid py-4">
        <!--  เริ่ม  -->
         <div class="text-center"><h5>ข้อมูลหน่วยงาน</h5></div>
        <br><br><br><br>

        <!-- หน่วยงาน -->
        <form action="/add/agency" method="GET"> 
            <div class="d-flex justify-content-around">
            <div class="card border-dark bg-gradient-warning mb-3" style="width: 18rem;">
            <div class="card-header"><h4>หน่วยงาน</h4></div>
            <div class="card-body text-dark">
                <h5 class="card-title" style="margin-left:60px">
                    <i class="bi bi-building" style="font-size:100px"></i>
                </h5>
            </div>
            <div class="card-footer text-center text-white">
            <button class="btn btn-bg-gradient-warning text-white" type="submit" name="agency" value="dataagency">ข้อมูลหน่วยงาน </button>
            </div>
            <div class="card-footer text-center text-white">
            <button class="btn btn-bg-gradient-warning text-white"  type="submit" name="agency" value="addagency">เพิ่มข้อมูลหน่วยงาน </button>
            </div>
            </div>
        </form>
        <!-- หน่วยงาน -->

        <!-- สาขา -->
        <form action="/add/branch" method="GET"> 
            <div class="card border-dark bg-gradient-success mb-3" style="width: 18rem;">
            <div class="card-header text-dark"><h4>สาขา</h4></div>
            <div class="card-body text-dark">
                <h5 class="card-title" style="margin-left:60px">
                    <i class="bi bi-building" style="font-size:100px"></i>
                </h5>
            </div>
            <div class="card-footer text-center">
            <button class="btn btn-bg-gradient-success text-white"  type="submit" name="branch" value="databranch"> ข้อมูลสาขา </button>
            </div>
            <div class="card-footer text-center">
            <button class="btn btn-bg-gradient-success text-white"  type="submit" name="branch" value="addbranch"> เพิ่มข้อมูลสาขา </button>
            </div>
            </div>
            </form>
            <!-- สาขา -->

            <!-- แผนก -->
            <form action="/add/department" method="GET"> 
            <div class="card border-dark bg-gradient-info mb-3" style="width: 18rem;">
            <div class="card-header text-dark"><h4>แผนก</h4></div>
            <div class="card-body text-dark">
                <h5 class="card-title" style="margin-left:60px">
                    <i class="bi bi-building" style="font-size:100px"></i>
                </h5>
            </div>
            <div class="card-footer text-center ">
            <button class="btn btn-bg-gradient-info text-white" type="submit" name="department" value="datadepartment"> ข้อมูลแผนก </button>
            </div>
            <div class="card-footer text-center ">
            <button class="btn btn-bg-gradient-info text-white" type="submit" name="department" value="adddepartment"> เพิ่มข้อมูลแผนก </button>
            </div>
            </div>
            </form>
            <!-- แผนก -->
           
            </div>

<!-- จบ -->
       </div>
    </div>
</div>
@endsection



