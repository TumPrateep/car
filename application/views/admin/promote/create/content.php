<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/promote")?>">รูปภาพแบนเนอร์</a>
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
                            <h3 class="card-title"><i class="fa fa-fw fa-car"></i> เพิ่มรูปภาพแบนเนอร์</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="submit" enctype="multipart/form-data">
                            <div class="card-body black bg-light">

                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">รูปภาพแบนเนอร์</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="image_url" required>
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