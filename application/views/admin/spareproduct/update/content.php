
    
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/Charge/SpareCharge") ?>">ราคาเปลี่ยนอะไหล่ช่วงล่าง</a>
      </li>
      <li class="breadcrumb-item active" >แก้ไขข้อมูลราคาเปลี่ยนอะไหล่ช่วงล่าง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">
                  <h3 class="card-title" ><i class="fa fa fa-wrench"></i> แก้ไขข้อมูลราคาเปลี่ยนอะไหล่ช่วงล่าง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                <input type="hidden" name="productId" id="productId" value="<?=$productId?>">
                  <div class="card-body black bg-light ">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label>รายการอะไหล่ช่วงล่าง</label> 
                            <select class="form-control" name="spares_undercarriageId" id="spares_undercarriageId">
                                <option value="">เลือกรายการอะไหล่ช่วงล่าง</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>รายการยี่ห้ออะไหล่</label> 
                            <select class="form-control" name="spares_brandId" id="spares_brandId">
                                <option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label>รายการยี่ห้อรถ</label> 
                            <select class="form-control" name="brandId" id="brandId">
                                <option value="">เลือกยี่ห้อรถ</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>รายการรุ่นรถ</label> 
                            <select class="form-control" name="modelId" id="modelId">
                                <option value="">เลือกรุ่นรถ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label>รายการโฉมรถ</label> 
                            <select class="form-control" name="detail" id="detail">
                                <option value="">เลือกโฉมรถ</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>รายการรายละเอียดรุ่นรถ</label> 
                            <select class="form-control" name="modelofcarId" id="modelofcarId">
                                <option value="">เลือกรายละเอียดรุ่นรถ</option>
                            </select>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="control-label">รูปอะไหล่ชาวงล่าง</label>
                                <div class="image-editor">
                                    <input type="file" class="cropit-image-input" name="tempImage" >
                                    <div class="cropit-preview"></div>
                                    <div class="image-size-label">ปรับขนาด</div>
                                    <input type="range" class="cropit-image-zoom-input">
                                    <input type="hidden" name="picture" class="hidden-image-data" id="picture" />
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