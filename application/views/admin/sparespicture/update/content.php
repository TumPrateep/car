
    
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/Sparespicture/createsparespicture") ?>">รูปภาพอะไหล่</a>
      </li>
      <li class="breadcrumb-item active" >แก้ไขรูปภาพอะไหล่สินค้า</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">
                  <h3 class="card-title" ><i class="fa fa fa-wrench"></i> แก้ไขรูปภาพอะไหล่สินค้า</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                <input type="hidden" name="spare_pictire_id" id="spare_pictire_id" value="<?=$spare_pictire_id?>">
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
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="control-label">รูปอะไหล่ช่วงล่าง</label>
                                <div class="image-editor">
                                    <input type="file" class="cropit-image-input" name="tempImage">
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