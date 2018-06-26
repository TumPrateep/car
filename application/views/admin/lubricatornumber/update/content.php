<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatornumber") ?>">เบอร์น้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-tint"></i>  แก้ไขข้อมูลเบอร์น้ำมันเครื่อง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="update-lubricatorsnumber" enctype="multipart/form-data" >
                  <div class="card-body black bg-light">
                      <div class="form-group">
                        <label>ชื่อเบอร์น้ำมันเครื่อง</label> <span class="error">*</span>
                        <input type="text" class="form-control" placeholder="ชื่อเบอร์น้ำมันเครื่อง" name="lubricator_number" id="lubricator_number">
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