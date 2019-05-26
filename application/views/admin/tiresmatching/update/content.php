
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tiresmatching") ?>">ขนาดยางตามยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขข้อมูลขนาดยางตามยี่ห้อรถ</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-futbol-o"></i>  แก้ไขข้อมูลขนาดยางตามยี่ห้อรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="update-tiresmatching">
                    <input type="hidden" name="tire_matchingId" id="tire_matchingId" value="<?=$tire_matchingId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ยี่ห้อรถ</label> <span class="error">*</span> <label id="brandId-error" class="error" for="brandId"></label>
                            <select class="form-control" name="brandId" id="brandId">
                              <option value="">เลือกยี่ห้อรถ</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>รุ่นรถ</label> <span class="error">*</span> <label id="modelId-error" class="error" for="modelId"></label>
                            <select class="form-control" name="modelId" id="modelId">
                              <option value="">เลือกรุ่นรถ</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>โมเดลรถ</label> <span class="error">*</span> <label id="modelofcarId-error" class="error" for="brandId"></label>
                            <select class="form-control" name="modelofcarId" id="modelofcarId">
                              <option value="">เลือกโมเดลรถ</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ขอบยาง</label> <span class="error">*</span> <label id="tire_rimId-error" class="error" for="tire_rimId"></label>
                            <select class="form-control" name="tire_rimId" id="tire_rimId">
                              <option value="">เลือกขอบยาง</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ขนาดยาง</label> <span class="error">*</span> <label id="tire_sizeId-error" class="error" for="tire_sizeId"></label>
                            <select class="form-control" name="tire_sizeId" id="tire_sizeId">
                              <option value="">เลือกขนาดยาง</option>
                            </select>
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