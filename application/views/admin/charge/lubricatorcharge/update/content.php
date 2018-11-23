
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/Charge/LubricatorCharge") ?>">ราคาเปลี่ยนน้ำมันเครื่อง</a>
      </li>
      <li class="breadcrumb-item active">แก้ไขข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <input type="hidden" name="tire_changeId" id="tire_changeId" value="<?=$tire_changeId?>">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-4">
                          <label>ราคายางล้อหน้า</label> <span class="error">*</span>
                          <input type="number" class="form-control" placeholder="กรุณากรอกราคายางล้อหน้า" name="tire_front" id="tire_front">
                      </div>
                      <div class="col-md-4">
                          <label>ราคายางล้อหลัง</label> <span class="error">*</span>
                          <input type="number" class="form-control" placeholder="กรุณากรอกราคายางล้อหลัง" name="tire_back" id="tire_back">
                      </div>
                      <div class="col-md-4">
                            <label>ชื่อขอบยาง</label> <span class="error">*</span>
                            <select class="form-control" name="rimId" id="rimId">
                                <option value="">กรุณาเลือกขอบยาง</option>
                            </select>
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