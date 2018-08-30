
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/LubricatortypeFormachine") ?>">รายการประเภทน้ำมันเครื่องตามเครื่องยนต์</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มรายการประเภทน้ำมันเครื่องตามเครื่องยนต์</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มรายการประเภทน้ำมันเครื่องตามเครื่องยนต์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ประเภทน้ำมันเครื่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ประเภทน้ำมันเครื่อง" name="lubricatortypeFormachine" id="lubricatortypeFormachine">
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