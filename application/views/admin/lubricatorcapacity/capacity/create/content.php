
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatorcapacity") ?>">การจัดการความจุ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatorcapacity/createcapacity/".$machineId) ?>">ความจุประเภท (<?=$machine_type ?>)</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
        
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มความจุ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                  <input type="hidden" id="machineId" name="machineId" value="<?=$machineId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ขนาดความจุ</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ขนาดความจุ" name="lubricatorcapacity">
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