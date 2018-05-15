
    
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("car") ?>">ยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item active">รุ่นรถ</li>
        <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เพิ่มข้อมูลรุ่นรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อรุ่นรถ</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-car"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ปีที่เริ่ม</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                              </div>
                              <input type="number" class="form-control" placeholder="ปีที่เริ่ม">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>ปีที่สิ้นสุด</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                              </div>
                              <input type="number" class="form-control" placeholder="ปีที่สิ้นสุด">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                      </div>
                    </div>
                    <!-- /.card-body -->
                 
                </div>
              </div>
          </div>
        </div>
      </section>
    </div>