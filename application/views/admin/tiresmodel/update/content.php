

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresbrand/") ?>">ยี่ห้อยาง</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresmodel/$tire_brandId/$tire_modelId") ?>">รุ่นยาง</a>
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

                    <h3 class="card-title"><i class="fa fa-eercast"></i>  เเก้ไขข้อมูลรุ่นยาง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="tire_modelId" name="tire_modelId" value="<?=$tire_modelId?>">
                    <input type="hidden" id="tire_brandId" name="tire_brandId" value="<?=$tire_brandId?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อรุ่นยาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรุ่นยาง" name="tire_modelName" id="tire_modelName">
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