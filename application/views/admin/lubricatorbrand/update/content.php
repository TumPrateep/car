<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatorbrand") ?>">ยี่ห้อน้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-tint"></i> เเก้ไขข้อมูลยี่ห้อน้ำมันเครื่อง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="update-tiresbrand">
                  <input type="hidden" id="lubricator_brandId" name="lubricator_brandId" value="<?=$lubricator_brandId?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อยี่ห้อน้ำมันเครื่่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้อน้ำมันเครื่อง" id="lubricatorbrandName" name="lubricatorbrandName" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-group"> 
                          <input id="tire_brandPicture" type="file" multiple name="tire_brandPicture">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary ">บันทึก</button>
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