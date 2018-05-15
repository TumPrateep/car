

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("car") ?>">ยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item active">รุ่นรถ</li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เเก้ไขข้อมูลรุ่นรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อรุ่นรถ</label>
                            <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ" name="modelName">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ปีที่เริ่ม</label>
                            <input type="number" class="form-control" placeholder="ปีที่เริ่ม" name="yearStart">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ปีที่สิ้นสุด</label>
                            <input type="number" class="form-control" placeholder="ปีที่สิ้นสุด" name="yearEnd">
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