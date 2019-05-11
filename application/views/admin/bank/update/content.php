
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/Charge/LubricatorCharge") ?>">บัญชีธนาคาร</a>
      </li>
      <li class="breadcrumb-item active">เพิ่มข้อมูลบัญชีธนาคาร</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มข้อมูลบัญชีธนาคาร</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                <input type="hidden" id="bankId" name="bankId" value="<?=$bankId ?>">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-4">
                          <label>ธนาคาร</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="ธนาคาร" name="bankName" id="bankName">
                      </div>
                      <div class="col-md-4">
                          <label>เลขบัญชีธนาคาร</label> <span class="error">*</span>
                          <input type="number" class="form-control" placeholder="เลขบัญชีธนาคาร" name="accountNumber" id="accountNumber">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-10">
                          <label>คำนำหน้า-ชื่อ-นามสกุล</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="คำนำหน้า-ชื่อ-นามสกุล" name="fullName" id="fullName">
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