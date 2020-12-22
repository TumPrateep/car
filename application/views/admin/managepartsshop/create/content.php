<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/managepartsshop")?>">การจัดการร้านอะไหล่</a>
        </li>
        <li class="breadcrumb-item active">สร้าง</li>
    </ol>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title">  สร้างร้านค้าส่งคาร์ใจดี</h3>
                  </div>

                  <form id="create-lubricator" >
                    <div class="card-body black bg-light">
                      <div class="row">
                          <div class="col-md-4 form-group">
                            <label>ชื่อร้านค้าส่งคาร์ใจดี</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อร้านค้าส่งคาร์ใจดี" name="car_accessoriesName" id="car_accessoriesName">
                          </div>
                          <div class="col-md-4 form-group">
                            <label>ชื่อ(เจ้าของร้าน)</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อ(เจ้าของร้าน)" name="firstname" id="firstname">
                          </div>
                          <div class="col-md-4 form-group">
                            <label>นามสกุล</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="นามสกุล" name="lastname" id="lastname">
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                      </div>
                    </div>
                    
                  </form> 
                    <!-- /.card-body -->
                 
                </div>
              </div>
          </div>
        </div>
      </section>