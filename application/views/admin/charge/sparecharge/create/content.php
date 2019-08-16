
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/charge/brand") ?>">ราคาเปลี่ยนอะไหล่ช่วงล่าง-ยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/charge/sparecharge/").$brandId ?>">ราคาเปลี่ยนอะไหล่ช่วงล่าง</a>
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
                  <input type="hidden" name="brandId" value="<?=$brandId?>" id="brandId">
                  <div class="card-body black bg-light">
                    <span id="render"></span>
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