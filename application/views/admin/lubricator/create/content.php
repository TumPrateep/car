<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricator") ?>">ยี่ห้อน้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricator/lubricators") ?>">น้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-tint"></i>  เพิ่มข้อมูลน้ำมันเครื่อง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-lubricator" enctype="multipart/form-data" >
                  <div class="card-body black bg-light">
                      
                      <div class="row">
                          <div class="col-md-6 form-group">
                            <label>ชื่อน้ำมันเครื่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อน้ำมันเครื่อง" name="lubricatorName" id="lubricatorName">
                          </div> 
                          <div class="col-md-6 form-group">
                              <label>เบอร์น้ำมันเครื่อง: </label>
                              <select class="form-control input-default" name="column" id="column">
                                  <option value="1" selected></option>
                                  <option value="2"> </option>
                                  <option value="3"></option>
                              </select>
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
    </div>