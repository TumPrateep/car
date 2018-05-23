
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

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เเก้ไขข้อมูลยี่ห้อรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
              <form id="update-brand">
                  <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                  <div class="card-body black bg-light">
                      <div class="form-group">
                        <label>ชื่อยี่ห้อรถ</label>
                        <input type="text" class="form-control" placeholder="ชื่อยี่ห้อรถ" name="brandName" id="brandName" value="">
                      </div>
                      <div class="form-group">
                          <label>Preview File Icon</label>
                          <input id="file-3" type="file" multiple name="brandPicture">
                        
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