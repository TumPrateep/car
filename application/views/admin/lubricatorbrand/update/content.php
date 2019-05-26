<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricator") ?>">ยี่ห้อน้ำมันเครื่อง</a>
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
                  <form id="update-lubricatorbrand">
                  <input type="hidden" id="lubricator_brandId" name="lubricator_brandId" value="<?=$lubricator_brandId?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อยี่ห้อน้ำมันเครื่่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้อน้ำมันเครื่อง" id="lubricator_brandName" name="lubricator_brandName" value="">
                          </div>
                        </div>
                      </div>
                      <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="control-label">รูปยี่ห้อน้ำมันเครื่อง</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input">
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">
                                                ปรับขนาด
                                                </div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="lubricator_brandPicture" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
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