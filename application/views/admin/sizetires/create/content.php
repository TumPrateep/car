
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">ขอบยาง</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/sizetires/$brandId") ?>">ขนาดยาง</a>
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

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เพิ่มข้อมูลขนาดยาง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="rimId" name="rimId" value="<?=$rimId ?>">  
                    <div class="card-body black bg-light">
                      <div class="form-row">
                          <div class="col">
                            <label>หน้ายาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="หน้ายาง" name="tire_size" id="tire_size">
                          </div>  
                          <div class="col">
                            <label>ซีรี่ย์ยาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ซีรี่ย์ยาง" name="tireSeries" id="tireSeries">
                          </div>
                          <div class="col">
                            <label>ขนาดกะทะล้อ</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ขนาดกะทะล้อ" name="rim" id="rim">
                          </div>
                      </div><br>
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