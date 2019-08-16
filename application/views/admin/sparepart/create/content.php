
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar/sparepart/") ?>">ยี่ห้ออะไหล่</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มยี่ห้ออะไหล่</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มยี่ห้ออะไหล่</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="createsparesBrand">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อยี่ห้ออะไหล่</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้ออะไหล่" name="spares_brandName" id="spares_brandName">
                          </div>
                        </div>
                      </div>
                      
                      <div class="row p-t-20">
                      <div class="col-md-12">
                          <div class="form-group">
                          <label class="control-label">รูปยี่ห้อรถ</label>
                              <div class="image-editor">
                                  <input type="file" class="cropit-image-input" name="tempImage" required>
                                  <div class="cropit-preview"></div>
                                  <div class="image-size-label">
                                  ปรับขนาด
                                  </div>
                                  <input type="range" class="cropit-image-zoom-input">
                                  <input type="hidden" name="spares_brandPicture" class="hidden-image-data" />
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