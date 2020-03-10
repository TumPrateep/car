<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/lubricatorgearnumber ") ?>">เบอร์น้ำมันเกียร์</a>
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
                            <h3 class="card-title"><i class="fa fa-tint"></i>  เพิ่มข้อมูลเบอร์น้ำมันเกียร์</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form id="create-lubricatornumber">
                            <div class="card-body black bg-light">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ชื่อเบอร์น้ำมันเกียร์</label> <span class="error">*</span>
                                            <input type="text" class="form-control" placeholder="ชื่อเบอร์น้ำมันเกียร์" name="lubricator_gear_number" id="lubricator_gear_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ชนิดน้ำมันเกียร์</label>
                                            <select class="form-control" name="lubricator_gear" id="lubricator_gear">
                                                <option value="1">น้ำมันเกียร์ธรรมดา</option>
                                                <option value="2">น้ำมันเกียร์ออโต</option>
                                            </select>
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