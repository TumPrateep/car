<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/credit/tirescharge")?>">จำนวนเงินบัตรเครดิต(ยาง)</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">

                            <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขข้อมูล</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="submit">
                            <input type="hidden" name="tire_creditId" id="tire_creditId" value="<?=$id?>">
                            <div class="card-body black bg-light">
                                <div class="form-group row">
                                <div class="col-md-4">
                                        <label>จำนวนเงิน</label> <span class="error">*</span>
                                        <input type="number" class="form-control" placeholder="จำนวนเงิน"
                                            name="credit_price" id="credit_price">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>หน่วย</label> <span class="error">*</span>
                                            <select class="form-control" name="unit_id" id="unit_id">
                                                <option value="">เลือกหน่วย</option>
                                            </select>
                                            <label id="unit_id-error" class="error" for="unit_id"></label>
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