
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tiresbrand/") ?>">การจัดการยี่ห้อยางรถยนตร์</a>
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
                    <h3 class="card-title"><i class="fa fa-futbol-o"></i>  เพิ่มข้อมูลยี่ห้อยางรถยนตร์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-tiresbrand" enctype="multipart/form-data" >
                  <div class="card-body black bg-light">
                      <div class="form-group">
                        <label>ชื่อยี่ห้อยางรถยนตร์</label> <span class="error">*</span>
                        <input type="text" class="form-control" placeholder="ชื่อยี่ห้อยางรถยนตร์" name="tiresbrandName">
                      </div>
                        <div class="form-group"> 
                          <input id="brandPicture" name ="tiresbrandPicture" class="file" type="file">
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