

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/model/$brandId") ?>">รุ่นรถ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/carmodel/$brandId/$modelId") ?>">โมเดลรถ</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลโมเดล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เเก้ไขข้อมูลโมเดล</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <input type="hidden" id="modelId" name="modelId" value="<?=$modelId ?>">
                    <input type="hidden" id="modelofcarId" name="modelofcarId" value="<?=$modelofcarId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>ชื่อโมเดล</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อโมเดล" name="modelofcarName" id="modelofcarName">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>รหัสตัวถัง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="รหัสตัวถัง" name="bodyCode" id="bodyCode">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>รหัสเครื่องยนต์</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="รหัสเครื่องยนต์" name="machineCode" id="machineCode">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
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