<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/tireproduct")?>">รูปภาพสินค้า</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มรูปภาพสินค้า</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa fa-wrench"></i> เพิ่มรูปภาพสินค้า</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="submit">
                            <div class="card-body black bg-light ">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>รายการยี่ห้อยางรถ</label>
                                        <select class="form-control" name="tire_brandId" id="tire_brandId">
                                            <option value="">เลือกรายการยี่ห้อยางรถ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>รายการรุ่นยางรถ</label>
                                        <select class="form-control" name="tire_seriesId" id="tire_seriesId">
                                            <option value="">เลือกรายการุ่นยางรถ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">รูปภาพสินค้า</label>
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