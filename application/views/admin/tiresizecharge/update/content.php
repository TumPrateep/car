

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
       <li class="breadcrumb-item">
        <a href="<?=base_url("admin/charge/tirescharge") ?>">ราคาเปลี่ยนยางนอก</a>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/charge/tiresizecharge/$rimId/$tire_sizeId") ?>">ขนาดยาง</a>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลขนาดยาง</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เเก้ไขข้อมูล</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="tire_size_chargeId" name="tire_size_chargeId" value="<?=$tire_size_chargeId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ค่าบริการ</label> <span class="error">*</span>
                            <input type="number" class="form-control" placeholder="กรุณากรอกราคาค่าบริการ" name="tire_change" id="tire_change">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>หน่วย</label> <span class="error">*</span> 
                            <select class="form-control" name="unit_id" id="unit_id">
                              <option value="">เลือกหน่วย</option>
                            </select>
                            <label id="unit_id-error" class="error" for="unit_id"></label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ขอบยาง</label> <span class="error">*</span> 
                            <select class="form-control" name="tire_rimId" id="tire_rimId">
                              <option value="">เลือกขอบยาง</option>
                            </select>
                            <label id="tire_rimId-error" class="error" for="tire_rimId"></label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ขนาดยาง</label> <span class="error">*</span> 
                            <select class="form-control" name="tire_sizeId" id="tire_sizeId">
                              <option value="">เลือกขนาดยาง</option>
                            </select>
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