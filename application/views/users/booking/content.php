<style>
    img.logobank {
        width: 80px;
        height: 80px;
    }
    
    img.extire {
        width: 120px;
        height: 160px;
    }
    
    img.exbrand {
        width: 200px;
        height: 80px;
    }
</style>
<link href="<?=base_url('public/')?>css/mdb.css?<?php echo time(); ?>" rel="stylesheet">
<section class="section pricing">
    <div class="container">
        <div class="container">
            <!-- Horizontal Steppers -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Stepers Wrapper -->
                    <ul class="stepper stepper-horizontal">

                    <!-- First Step -->
                    <li class="completed">
                        <a href="<?php echo base_url('cart'); ?>">
                        <span class="circle">1</span>
                        <span class="label">รายการสินค้า</span>
                        </a>
                    </li>

                    <!-- Second Step -->
                    <li class="warning">
                        <a href="#!">
                        <span class="circle">2</span>
                        <span class="label">จองติดตั้ง</span>
                        </a>
                    </li>

                    <!-- Third Step -->
                    <li>
                        <a href="#!">
                        <span class="circle">3</span>
                        <span class="label">ชำระเงิน</span>
                        </a>
                    </li>

                    </ul>
                    <!-- /.Stepers Wrapper -->

                </div>
            </div>
            <!-- /.Horizontal Steppers -->
            <div id="boby">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3>รายละเอียด<span class="alternate"></span>การจองติดตั้ง</h3>
                        </div>
                    </div>
                </div>
                <form id="form-rent">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">

                                        <h5>เลือกวันที่จองติดตั้ง</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>วันที่จอง</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="hire_date" id="hire_date" placeholder="วันที่จอง">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>เวลาจอง</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="hire_time" id="hire_time" placeholder="เวลาจอง">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                    <?php if (isUser()) {?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <h5>รถเข้าใช้บริการ <button class="btn btn-outline-light bg-orange" onclick="gotoCarProfile()">สร้างข้อมูลรถ</button></h5>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                        </div>
                                                        <div class="col-md-12">
                                                            <select name="car_profile" id="car_profile" class="form-control">
                                                    <option value="">เลือกรถเข้าใช้บริการ</option>
                                                </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span id="img-carprofile"></span>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <span id="img-carbrand"></span>
                                                            <span id="carprofile-data"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <h5>สรุปการสั่งสินค้า</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span><strong>ศูนย์บริการคาร์ใจดี:</strong></span><br>
                                                <span id="garage"></span>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="show-product" id="product-data"></div>
                                        <input type="hidden" name="garageId" id="garageId">
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <h6>รวมทั้งหมด</h6>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="alternate"><strong class="amount"></strong></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-md-center">
                        <div class="col-md-4">
                            <?php if (!isUser()) {?>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-main-md width-100p bg-secondary" onclick="window.location = '<?=base_url('login')?>'">เข้าสู่ระบบ/ลงทะเบียน</a>
                                </div>
                            </div>
                            <?php } else {?>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-main-md width-100p bg-secondary"
                                        onclick="window.history.back();">ย้อนกลับ</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-main-md width-100p bg-orange">ถัดไป</button>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>