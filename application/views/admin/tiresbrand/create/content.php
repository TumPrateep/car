
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tiresbrand/") ?>">ยี่ห้อยาง</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มข้อมูลยี่ห้อยาง</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-futbol-o"></i>  เพิ่มข้อมูลยี่ห้อยาง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-tiresbrand" enctype="multipart/form-data" >
                  <div class="card-body black bg-light">
                      <div class="form-group">
                        <label>ชื่อยี่ห้อยาง</label> <span class="error">*</span>
                        <input type="text" class="form-control" placeholder="ชื่อยี่ห้อยาง" name="tire_brandName">
                      </div>
                      <div class="row p-t-20">
                      <div class="col-md-12">
                          <div class="form-group">
                          <label class="control-label">รูปยี่ห้อยาง</label>
                              <div class="image-editor">
                                  <input type="file" class="cropit-image-input" name="tempImage" required>
                                  <div class="cropit-preview"></div>
                                  <div class="image-size-label">
                                  ปรับขนาด
                                  </div>
                                  <input type="range" class="cropit-image-zoom-input">
                                  <input type="hidden" name="tire_brandPicture" class="hidden-image-data" />
                              </div>
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