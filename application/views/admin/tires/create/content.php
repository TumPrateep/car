
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/tires") ?>">ขอบยาง</a>
      </li>
      <li class="breadcrumb-item active">เพิ่มข้อมูลขอบยาง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มข้อมูลขอบยาง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <div class="card-body black bg-light">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>หน้ายาง</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="หน้ายาง" name="rimName" id="rimName">
                        </div>  
                          <div class="form-group">
                            <label>ซีรี่ย์ยาง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ซีรี่ย์ยาง" name="rimSeries" id="rimSeries">
                          </div>
                          <div class="form-group">
                            <label>ขนาดกะทะล้อ</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ขนาดกะทะล้อ" name="wheels" id="wheels">
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