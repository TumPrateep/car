<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/advertisement ") ?>">โฆษณา</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขโฆษณา</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white bg-success">
                        <div class="card-header">

                            <h3 class="card-title"><i class="fa fa-bullhorn"></i> แก้ไขโฆษณา</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="update-advertisement">
                        <input type="hidden" id="advertisement_id" name="advertisement_id" value="<?=$advertisement_id?>">
                            <div class="card-body black bg-light">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>ชื่อโฆษณา</label> <span class="error">*</span>
                                            <input type="text" class="form-control" placeholder="ชื่อโฆษณา" id="advertisement_name" name="advertisement_name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">รูปโฆษณา</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input">
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">
                                                    ปรับขนาด
                                                </div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="advertisement_picture" id="advertisement_picture" class="hidden-image-data" />
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