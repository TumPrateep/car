
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/Charge/TiresCharge") ?>">ราคาเปลี่ยนยาง</a>
      </li>
      <li class="breadcrumb-item active">เพิ่มข้อมูลราคาเปลี่ยนยาง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มข้อมูลราคาเปลี่ยนยาง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label>ชื่อขอบยาง</label> <span class="error">*</span>
                        <select class="form-control" name="tire_rimId" id="tire_rimId">
                            <option value="">กรุณาเลือกขอบยาง</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                          <label>ราคายางขอบยาง</label> <span class="error">*</span>
                          <input type="number" class="form-control" placeholder="กรุณากรอกราคาขอบยาง" name="tire_price" id="tire_price">
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