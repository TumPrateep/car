
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricatorgearlimit/lubricatorgearcharge/".$groupId) ?>">ราคาเปลี่ยนถ่ายน้ำมันเครื่อง</a>
      </li>
      <li class="breadcrumb-item active">เพิ่มข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-4">
                          <label>ราคาค่าบริการ</label> <span class="error">*</span>
                          <input type="hidden" name="groupId" id="groupId" value="<?=$groupId?>">
                          <input type="number" class="form-control" placeholder="ราคาค่าบริการ" name="lubricator_gear_price" id="lubricator_gear_price">
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