

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
          <a href="<?=base_url("admin/car/carmodel/$brandId/$modelId") ?>">รายละเอียดรุ่นรถ</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มรายละเอียดรุ่นรถ</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เพิ่มรายละเอียดรุ่นรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <input type="hidden" id="modelId" name="modelId" value="<?=$modelId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ขนาดเครื่องยนต์(CC)</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ขนาดเครื่องยนต์(CC)" name="machineSize" id="machineSize">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>รายละเอียดรุ่นรถ</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="รายละเอียดรุ่นรถ" name="modelofcarName">
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