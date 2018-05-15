
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("car") ?>">ยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลรถ</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เพิ่มข้อมูลยี่ห้อรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="update-brand">
                    <div class="card-body black bg-light">
                      <div class="form-group">
                        <label>ชื่อยี่ห้อรถ</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-fw fa-car"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="ชื่อยี่ห้อรถ" name="brandName">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">เพิ่มข้อมูลรูปภาพ</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" >
                            <label class="custom-file-label" >เลือกรูปภาพ</label>
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