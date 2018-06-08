

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/model/$brandId") ?>">รุ่นรถ</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เเก้ไขข้อมูลรุ่น</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <input type="hidden" id="modelId" name="modelId" value="<?=$modelId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อรุ่น</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ" id="modelName" name="modelName" value="">
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
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary ">บันทึก</button>
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