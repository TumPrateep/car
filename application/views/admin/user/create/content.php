 
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("car/User") ?>">ข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
      </ol>

      <!-- Example DataTables Card-->
        
      <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10">
                <div class="card text-white bg-success">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-user-circle-o" ></i>เพิ่มข้อมูลผู้ใช้งาน</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body black bg-light">
                        <div class="form-group">
                          <label>ชื่อผู้ใช้งาน</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user" ></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>เบอร์โทรศัพท์</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>อีเมล</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="อีเมล">
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

