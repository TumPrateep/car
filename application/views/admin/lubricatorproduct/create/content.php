
    
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricatorproduct") ?>">ราคาเปลี่ยนน้ำมันเครื่อง</a>
      </li>
      <li class="breadcrumb-item active" >เพิ่มข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">
                  <h3 class="card-title" ><i class="fa fa fa-wrench"></i> เพิ่มข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <div class="card-body black bg-light ">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>รายการชนิดน้ำมันเครื่อง</label> 
                            <select class="form-control valid" name="lubricator_gear" id="lubricator_gear">
                                <option value="1">น้ำมันเครื่อง</option>
                                <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                <option value="3">น้ำมันเกียร์ออโต</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>รายการยี่ห้อน้ำมันเครื่อง</label> 
                            <select class="form-control" name="lubricator_brandId" id="lubricator_brandId">
                                <option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>รายการรุ่นน้ำมันเครื่อง</label> 
                            <select class="form-control" name="lubricatorId" id="lubricatorId">
                                <option value="">เลือกรุ่นน้ำมันเครื่อง</option>
                            </select>
                        </div>

                       
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="control-label">รูปน้ำมันเครื่อง</label>
                                <div class="image-editor">
                                    <input type="file" class="cropit-image-input" name="tempImage" required>
                                    <div class="cropit-preview"></div>
                                    <div class="image-size-label">ปรับขนาด</div>
                                    <input type="range" class="cropit-image-zoom-input">
                                    <input type="hidden" name="picture" class="hidden-image-data" />
                                </div>
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