
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/partsproduct") ?>">รายการสินค้า</a>
      </li>
      <li class="breadcrumb-item active">แก้ไขข้อมูลรายการเช็คระยะ</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขข้อมูลรายการเช็คระยะ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                <input type="hidden" id="partId" name="partId" value="<?=$partId ?>">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-6">
                          <label>รายการสินค้า</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="รายการสินค้า" name="partsName" id="partsName">
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