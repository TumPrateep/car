<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">ตารางงาน</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางงาน</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- <div class="row" style="background: white;border-radius: 25px; 0px 1px 3px 3px #d0cdcd">
                    <div id="calendar" ></div>			
                </div> -->
                <div id="calendar" ></div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->

<div class="modal" tabindex="-1" role="dialog" id="eventModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">หมายเลขสั่งซื้อ : <span id="eventOrder"></span></h5>
      </div>
      <div class="modal-body">
        วันเวลาเข้าใช้บริการ : <span id="eventStart"></span><br>
        ทะเบียนรถ : <span id="eventPlate"></span><br>
        ผู้เข้าใช้บริการ : <span id="eventName"></span><br>
        <!-- รายละเอียด : <span id="eventLink"></span> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>