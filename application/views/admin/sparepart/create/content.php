
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar") ?>">รายการอะไหล่</a>
        </li>
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar/sparepart") ?>">ยี่ห้ออะไหล่</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มยี่ห้ออะไหล่</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa fa-wrench"></i>เพิ่มยี่ห้ออะไหล่</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="createsparesBrand">
                  <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อยี่ห้ออะไหล่</label>
                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้ออะไหล่" name="spares_brandName" id="spares_brandName">
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