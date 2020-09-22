<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/tireproduct")?>">รูปภาพสินค้า</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขรูปภาพสินค้า</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขรูปภาพสินค้า</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="submit">
                            <div class="card-body black bg-light ">
                                <div class="form-group row">
                                <div class="col-md-4">
                                        <label>ชนิดน้ำมันเครื่อง</label>
                                        <select class="form-control" name="lubricator_gear" id="lubricator_gear" >
                                            <option value="1">น้ำมันเครื่อง</option>
                                            <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                            <option value="3">น้ำมันเกียร์ออโต</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>ประเภทเครื่องยนต์</label> <span class="error">*</span>
                                        <select class="form-control" name="machineId" id="machineId">
                                            <option value="">เลือกประเภทเครื่องยนต์</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ยี่ห้อน้ำมันเครื่อง</label>
                                        <select class="form-control" name="lubricator_brandId" id="lubricator_brandId">
                                            <option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label>น้ำมันเครื่อง</label>
                                        <select class="form-control" name="lubricatorId" id="lubricatorId">
                                            <option value="">เลือกน้ำมันเครื่อง</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">รูปภาพสินค้า</label>
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
                                    <input type="hidden" name="productId" id="productId" value="<?=$productId?>">
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