
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/charge/tirescharge") ?>">ราคาเปลี่ยนยาง</a>
      </li>
      <li class="breadcrumb-item active">แก้ไขราคาเปลี่ยนยาง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขราคาเปลี่ยนยาง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <input type="hidden" name="tire_changeId" id="tire_changeId" value="<?=$tire_changeId?>">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-4">
                          <label>ชื่อขอบยาง</label> <span class="error">*</span>
                          <select class="form-control" name="tire_rimId" id="tire_rimId">
                              <option value="">กรุณาเลือกขอบยาง</option>
                          </select>
                      </div>
                      <div class="col-md-4">
                          <label>ราคาค่าบริการเปลี่ยนขอบยาง</label> <span class="error">*</span>
                          <input type="number" class="form-control" placeholder="กรุณากรอกราคาค่าบริการเปลี่ยนขอบยาง" name="tire_price" id="tire_price">
                      </div>
                      <div class="col-md-4">
                            <label>หน่วย</label> <span class="error">*</span>
                            <select class="form-control" name="spares_undercarriageId" id="spares_undercarriageId">
                                <option value="">เลือกหน่วย</option>
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