Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลรุ่นรถ</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/CarModelAccessory/index1/$brandId"); ?>">รายการรุ่นรถ</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
    <div class="container-fluid">   
      <div class="row">
        <div class="col-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"><i class="fa fa-fw fa-car"></i> เพิ่มข้อมูลรุ่นรถ </h4>
                </div> 
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">ชื่อรุ่นรถ</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ" name="modelName" id="modelName">
                                    </div>
                                </div>       
                            </div>           
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ปีที่ผลิต</label> <span class="error">*</span> <label id="yearStart-error" class="error" for="yearStart"></label>
                            <div class="form-inline">
                              <select class="form-control col-md-5" name="yearStart" id="yearStart"></select>
                              <label class="col-md-2">ถึง</label>
                              <select class="form-control col-md-5" name="yearEnd" id="yearEnd"></select>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                            <button type="button" class="btn btn-inverse">ยกเลิก</button>
                        </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<!-- End Container fluid 