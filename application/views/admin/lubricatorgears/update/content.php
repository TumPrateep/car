    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricatorgear") ?>">ยี่ห้อน้ำมันเกียร์</a>
        </li>
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricatorgear/lubricatorgears/$lubricator_brandId") ?>">น้ำมันเกียร์</a>
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
                    <h3 class="card-title"><i class="fa fa-tint"></i>  แก้ไขข้อมูลน้ำมันเกียร์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="submit" >
                  <input type="hidden" name="lubricatorId" id="lubricatorId" value="<?=$lubricatorId ?>" >
                  <input type="hidden" name="lubricator_brandId" id="lubricator_brandId" value="<?=$lubricator_brandId ?>" >
                  <div class="card-body black bg-light">
                  <div class="row">
                          <div class="col-md-4 form-group">
                            <label>ชื่อรุ่นน้ำมันเกียร์</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรุ่นน้ำมันเกียร์" name="lubricatorName" id="lubricatorName">
                          </div>
                          <div class="col-md-4 form-group">
                              <label>ชนิดน้ำมันเกียร์</label>
                              <select class="form-control" name="lubricator_gear" id="lubricator_gear">
                                <option value="1">น้ำมันเกียร์ธรรมดา</option>
                                <option value="2">น้ำมันเกียร์ออโต</option>
                              </select>
                          </div>
                          <div class="col-md-4 form-group">
                              <label>เบอร์น้ำมันเกียร์</label> <span class="error">*</span>
                              <select class="form-control input-default" name="lubricator_number" id="lubricator_number">
                                  <option value="">เลือกเบอร์น้ำมันเกียร์</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group"> 
                        <button type="submit" id="submit" class="btn btn-primary">บันทึก</button>
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