
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/machine") ?>">การจัดการประเภทเครื่องยนต์</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขประเภทเครื่องยนต์</li>
      </ol>
      <!-- Icon Cards-->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
              
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขประเภทเครื่องยนต์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                  <input type="hidden" id="machineId" name="machineId" value="<?=$machineId?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ประเภทน้ำมันเครื่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ประเภทน้ำมันเครื่อง" name="machine_type" id="machine_type">
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