<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatormatching") ?>">น้ำมันเครื่องตามข้อมูลรถ</a>
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
                    <h3 class="card-title"><i class="fa fa-tint"></i>  เพิ่มข้อมูลน้ำมันเครื่องตามข้อมูลรถ</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-lubricatormatching" >
                    <div class="card-body black bg-light">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>ยี่ห้อรถ</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" name="brandId" id="brandId" data-placeholder="เลือกยี่ห้อรถ">
                                  </select> 
                                  <label id="brandId-error" class="error" for="brandId"></label>                         
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>รุ่นรถ</label><span class="error">*</span> 
                                  <select class="form-control form-control-chosen-required" id="modelId" name="modelId"  data-placeholder="เลือกรุ่นรถ">
                                  </select>
                                  <label id="modelId-error" class="error" for="modelId"></label>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>ประเภทเครื่องยนต์</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" id="lubricator_typeId" name="lubricator_typeId" data-placeholder="เลือกประเภทเครื่องยนต์">
                                  </select>
                                  <label id="lubricator_typeId-error" class="error" for="lubricator_typeId"></label>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>ชนิดน้ำมันเครื่อง</label> <span class="error">*</span>
                                  <select class="form-control form-control-chosen-required" name="lubricator_gear" id="lubricator_gear" data-placeholder="เลือกชนิดน้ำมันเครื่อง">
                                    <option value="1">น้ำมันเครื่อง</option>
                                    <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                    <option value="3">น้ำมันเกียร์ออโต</option>
                                </select>
                                <label id="lubricator_gear-error" class="error" for="lubricator_gear"></label>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>น้ำมันเครื่อง</label> <span class="error">*</span>
                                <select class="form-control form-control-chosen-required" name="lubricatorId" id="lubricatorId" data-placeholder="เลือกน้ำมันเครื่อง">
                                </select>
                                <label id="lubricatorId-error" class="error" for="lubricatorId"></label>
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