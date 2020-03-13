<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/news ") ?>">ข่าวสาร</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขข่าวสาร</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">

                            <h3 class="card-title"><i class="fa fa-newspaper-o"></i> แก้ไขข่าวสาร</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="update-news">
                        <input type="hidden" id="news_id" name="news_id" value="<?=$news_id?>">
                            <div class="card-body black bg-light">
                                <div class="row">
                                    <div class="col-lg-6 ">
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
                                    <div class="col-lg-6">
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
                                            <textarea class="textarea form-control" placeholder="Place some text here"  name="news_content" id="news_content" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="mechanic">วันที่สิ้นสุด</label><span class="error">*</span>
                                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="วันที่สิ้นสุด">
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Example textarea</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                                        </div>
                                    </div>
                                </div> -->
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