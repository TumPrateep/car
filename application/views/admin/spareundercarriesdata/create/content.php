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

                  <form id="create-spareundercarriesdata" >
                    <div class="card-body black bg-light">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>รายการอะไหล่ช่วงล่าง</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" name="spares_undercarriageId" id="spares_undercarriageId" data-placeholder="เลือกรายการอะไหล่ช่วงล่าง">
                                  </select> 
                                  <label id="spares_undercarriageId-error" class="error" for="spares_undercarriageId"></label>                         
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>รุ่นอะไหล่</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" id="spares_modelId" name="spares_modelId" data-placeholder="เลือกรุ่นอะไหล่">
                                  </select>
                                  <label id="spares_modelId-error" class="error" for="spares_modelId"></label>
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
                                  <select class="form-control form-control-chosen" name="modelofcarId" id="modelofcarId" data-placeholder="เลือกรายละเอียดรุ่น" multiple>
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