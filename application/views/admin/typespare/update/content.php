
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/SparePartCar") ?>">รายการอะไหล่</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขรายการอะไหล่</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa fa-wrench"></i> เเก้ไขรายการอะไหล่</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อรายการอะไหล่</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรายการอะไหล่" name="spares_undercarriageName" id="spares_undercarriageName" value="">
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