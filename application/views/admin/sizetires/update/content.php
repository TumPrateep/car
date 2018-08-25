

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
       <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires") ?>">ขอบยาง</a>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresize/$rimId/$tire_sizeId") ?>">ขนาดยาง</a>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลขนาดยาง</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เเก้ไขข้อมูลขนาดยาง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="rimId" name="rimId" value="<?=$rimId ?>">
                    <input type="hidden" id="tire_sizeId" name="tire_sizeId" value="<?=$tire_sizeId ?>">
                    <div class="card-body black bg-light">
                    <div class="form-row">
                          <div class="col">
                            <label>หน้ายาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="หน้ายาง เช่น 205" name="tire_size" id="tire_size">
                          </div>  
                          <div class="col">
                            <label>ซีรี่ย์ยาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ซีรี่ย์ยาง เช่น 55" name="tire_series" id="tire_series">
                          </div>
                          <div class="col">
                            <label>ขนาดกะทะล้อ</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ขนาดกะทะล้อ เช่น R17" name="rim" id="rim">
                          </div>
                      </div><br>
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