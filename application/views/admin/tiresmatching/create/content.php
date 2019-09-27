    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tiresmatching") ?>">ขนาดยางตามยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มข้อมูลขนาดยางตามยี่ห้อรถ</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-futbol-o"></i>  เพิ่มข้อมูลขนาดยางตามยี่ห้อรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-tiresmatching">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ยี่ห้อรถ</label> <span class="error">*</span> 
                            <select class="form-control form-control-chosen-required" name="brandId" id="brandId" data-placeholder="เลือกยี่ห้อรถ" required></select>
                            <label id="brandId-error" class="error" for="brandId"></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>รุ่นรถ</label> <span class="error">*</span> 
                            <select class="form-control form-control-chosen-required" name="modelId" id="modelId" data-placeholder="เลือกรุ่นรถ" required></select>
                            <label id="modelId-error" class="error" for="modelId"></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>โฉมรถยนต์</label> <span class="error">*</span> 
                            <select class="form-control form-control-chosen-required" name="detail" id="detail" data-placeholder="เลือกโฉมรถยนต์"></select>
                            <label id="detail-error" class="error" for="brandId"></label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>รายละเอียดรุ่น</label> <span class="error">*</span>
                            <select class="form-control form-control-chosen" name="modelofcarId[]" id="modelofcarId" data-placeholder="เลือกรายละเอียดรุ่น" multiple></select>
                            <label id="modelofcarId-error" class="error" for="brandId"></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ขอบยาง</label> <span class="error">*</span> 
                            <select class="form-control form-control-chosen-required" name="tire_rimId" id="tire_rimId" data-placeholder="เลือกขอบยาง"></select>
                            <label id="tire_rimId-error" class="error" for="tire_rimId"></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ขนาดยาง</label> <span class="error">*</span>
                            <select class="form-control form-control-chosen-optgroup" name="tire_sizeId[]" id="tire_sizeId" data-placeholder="เลือกขนาดยาง" multiple></select>
                            <label id="tire_sizeId-error" class="error" for="tire_sizeId"></label>
                          </div>
                        </div>
                      </div>
                      
                      
                      <div class="form-group"> 
                        <button type="submit" class="btn btn-primary wide-button">บันทึก</button>
                      </div>
                    </div>
                  </form> 
                    <!-- /.card-body -->
                 
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>