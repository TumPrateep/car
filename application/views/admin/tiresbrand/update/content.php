

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tiresmodel/$tire_brandId") ?>">รุ่นยางรถยนต์</a>
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

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เเก้ไขข้อมูลยี่ห้อยางรถยนต์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                  <input type="hidden" id="tire_brandId" name="tire_brandId" value="<?=$tire_brandId?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อรุ่น</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้อยางรถยนต์" id="tire_brandName" name="tire_brandName" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Preview File Icon</label>
                        <input id="tire_brandPicture" type="file" multiple name="tire_brandPicture">
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