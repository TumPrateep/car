
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/Charge/SpareCharge") ?>">ราคาเปลี่ยนอะไหล่ช่วงล่าง</a>
      </li>
      <li class="breadcrumb-item active">เพิ่มข้อมูลราคาเปลี่ยนอะไหล่ช่วงล่าง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มข้อมูลราคาเปลี่ยนอะไหล่ช่วงล่าง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-4">
                          <label>รายการอะไหล่ช่วงล่าง</label> <span class="error">*</span>
                          <select class="form-control" name="spares_undercarriageId" id="spares_undercarriageId">
                              <option value="">เลือกรายการอะไหล่ช่วงล่าง</option>
                          </select>
                      </div>
                      <div class="col-md-4">
                          <label>ราคาค่าบริการ</label> <span class="error">*</span>
                          <input type="number" class="form-control" placeholder="ราคาค่าบริการ" name="spares_price" id="spares_price">
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