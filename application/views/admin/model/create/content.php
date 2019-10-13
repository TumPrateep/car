

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/model/$brandId") ?>">รุ่นรถ</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เพิ่มข้อมูลรุ่น</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ชื่อรุ่น</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ" name="modelName">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>รายละเอียด</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรายละเอียด" name="detail">
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
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ประเภทรถยนต์</label>
                            <select class="form-control" name="car_type" id="car_type">
                              <option value="1">รถแก๊ง</option>
                              <option value="2">รถกระบะ</option>
                            </select>
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