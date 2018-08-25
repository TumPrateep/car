    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/LubricatorNumber") ?>">เบอร์น้ำมันเครื่อง</a>
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
                    <h3 class="card-title"><i class="fa fa-tint"></i>  เพิ่มข้อมูลเบอร์น้ำมันเครื่อง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-lubricatornumber" >
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อเบอร์น้ำมันเครื่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อเบอร์น้ำมันเครื่อง" name="lubricator_number" id="lubricator_number">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ชนิดน้ำมันเครื่อง</label>
                            <select class="form-control" name="lubricator_gear" id="lubricator_gear">
                              <option value="1">น้ำมันเครื่อง</option>
                              <option value="2">น้ำมันเกียร์ธรรมดา</option>
                              <option value="3">น้ำมันเกียร์ออโต</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ประเภทน้ำมันเครื่อง</label> <span class="error">*</span>
                            <select class="form-control" id="lubricator_typeId" name="lubricator_typeId">
                              <option value="">ประเภทน้ำมันเครื่อง</option>
                            </select>
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