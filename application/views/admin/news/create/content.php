<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/News ") ?>">ข่าวสาร</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มข่าวสาร</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">

                            <h3 class="card-title"><i class="fa fa-newspaper-o"></i> เพิ่มข่าวสาร</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="create-news">
                            <div class="card-body black bg-light">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="control-label">รูปหัวข้อข่าว</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="tempImage">
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">ปรับขนาด</div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="news_picture" id="news_picture" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="mechanic">หัวข้อเรื่อง</label><span class="error">*</span>
                                            <input type="text" class="form-control" name="news_title" id="news_title" placeholder="หัวข้อเรื่อง">
                                        </div>
                                        <div class="form-group">
                                            <label>หมวดหมู่</label>
                                            <select class="form-control" name="news_category" id="news_category">
                                                <option value="1">ข่าวสาร</option>
                                                <option value="2">โปรโมชั่น</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">เนื้อหา</label>
                                            <textarea class="form-control" name="news_content" id="news_content" rows="7" placeholder="เนื้อหา"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="mechanic">วันที่สิ้นสุด</label><span class="error">*</span>
                                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="วันที่สิ้นสุด">
                                        </div>

                                    </div>
                                </div>
                                <section class="content">

                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="box box-info">
                                        <div class="box-header">
                                        <h3 class="box-title">CK Editor
                                            <small>Advanced and full of features</small>
                                        </h3>
                                        <!-- tools box -->
                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                                    title="Remove">
                                            <i class="fa fa-times"></i></button>
                                        </div>
                                        <!-- /. tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                        <form>
                                                <textarea id="editor1" name="editor1" rows="10" cols="80">
                                                                        This is my textarea to be replaced with CKEditor.
                                                </textarea>
                                        </form>
                                        </div>
                                    </div>
                                    <!-- /.box -->

                                    <div class="box">
                                        <div class="box-header">
                                        <h3 class="box-title">Bootstrap WYSIHTML5
                                            <small>Simple and fast</small>
                                        </h3>
                                        <!-- tools box -->
                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                                                    title="Remove">
                                            <i class="fa fa-times"></i></button>
                                        </div>
                                        <!-- /. tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                        <form>
                                            <textarea class="textarea" placeholder="Place some text here"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <!-- ./row -->
                                </section>

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