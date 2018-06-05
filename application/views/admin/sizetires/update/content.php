

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
       <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires") ?>">ขอบยาง</a>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresize/$rimId") ?>">ขนาดยาง</a>
        <li class="breadcrumb-item active">เเก้ไขขอมูลขอบยาง</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เเก้ไขข้อมูลขอบยาง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <input type="hidden" id="modelId" name="modelId" value="<?=$modelId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ระบุขนาดยาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ระบุขนาดยาง" id="modelName" name="modelName" value="">
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