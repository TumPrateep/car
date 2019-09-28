<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/spareundercarriesdata") ?>">ข้อมูลอะไหล่ช่วงล่างตามรถยนต์</a>
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
                    <h3 class="card-title"><i class="fa fa-tint"></i>  เพิ่มข้อมูลอะไหล่ช่วงล่างตามรถยนต์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-sparematching" >
                    <div class="card-body black bg-light">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="control-label">อะไหล่ช่วงล่าง</label><span class="error">*</span>
                                  <div class="input-group input-group-default">
                                      <select class="form-control form-control-chosen" id="spares_undercarriage_id" name="spares_undercarriage_id[]" data-placeholder="เลือกอะไหล่ช่วงล่าง" multiple required>
                                      </select>
                                      <label id="spares_undercarriage_id-error" class="error" for="spares_undercarriage_id"></label>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>ยี่ห้ออะไหล่</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" id="spares_brand_id" name="spares_brand_id" data-placeholder="เลือกรุ่นอะไหล่">
                                  </select>
                                  <label id="spares_brand_id-error" class="error" for="spares_brand_id"></label>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>ยี่ห้อรถ</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" name="brandId" id="brandId" data-placeholder="เลือกยี่ห้อรถ">
                                  </select> 
                                  <label id="brandId-error" class="error" for="brandId"></label>                         
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <div class="col-xs-12 col-md-6">
                              <div class="form-group">
                                  <label>รุ่นรถ</label><span class="error">*</span> 
                                  <select class="form-control form-control-chosen-required" id="modelId" name="modelId"  data-placeholder="เลือกรุ่นรถ">
                                  </select>
                                  <label id="modelId-error" class="error" for="modelId"></label>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                              <div class="form-group">
                                  <label>ปีผลิต</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen" id="detail" name="detail" data-placeholder="เลือกปีผลิต" multiple>
                                  </select>
                                  <label id="detail-error" class="error" for="detail"></label>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>รายละเอียดรุ่น</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen" name="modelofcarId[]" id="modelofcarId" data-placeholder="เลือกรายละเอียดรุ่น" multiple>
                                  </select>
                                  <label id="modelofcarId-error" class="error" for="modelofcarId"></label>
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