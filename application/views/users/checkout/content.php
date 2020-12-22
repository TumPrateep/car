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
                    <li class="completed">
                        <a href="<?php echo base_url('booking'); ?>">
                        <span class="circle">2</span>
                        <span class="label">จองติดตั้ง</span>
                        </a>
                    </li>

                    <!-- Third Step -->
                    <li class="warning">
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
                            <h3>รายละเอียด<span class="alternate"></span>การจอง</h3>
                        </div>
                    </div>
                </div>
                <form id="form-rent">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">

                                        <div>
                                            <h5>ช่องทางการชำระเงิน</h5>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <img src="<?=base_url('public/image/payment.png')?>" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input next" type="radio" name="next" value="2">
                                                    <label class="form-check-label">
                                            จ่ายผ่านบัตร Debit/Credit
                                        </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input next" type="radio" name="next" value="3">
                                                    <label class="form-check-label">
                                            โอนเงินผ่านบัญชีธนาคาร
                                        </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label id="next-error" class="error" for="next"></label>
                                            </div>
                                        </div>
                                        <div class="row" id="bank" style="display: none;">
                                            <div class="col-md-12 card">
                                                <div class="row card-body">
                                                    <div class="col-md-3 text-center">
                                                        <img src="<?=base_url('public/images/logo/scb.png')?>" class="logobank" alt="">
                                                    </div>
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <strong>ธนาคารไทยพาณิชย์</strong><br>
                                                        <table width="100%">
                                                            <tr>
                                                                <td valign="top"><strong>หมายเลขบัญชี</strong></td>
                                                                <td valign="top">866-235705-3</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="100"><strong>ชื่อบัญชี</strong></td>
                                                                <td valign="top">นายพล ออโต้ เทรดดิ้งโดย นาย สาทร ช่วยสง</td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top" width="100"><strong>สาขา</strong></td>
                                                                <td valign="top">โรบินสัน นครศรีธรรมราช</td>
                                                            </tr>
                                                        </table>
                                                        <!-- <span><strong>ชื่อบัญชี</strong> นายพล ออโต้ เทรดดิ้งโดย นาย สาทร ช่วยสง <br><strong>สาขา</strong> โรบินสัน นครศรีธรรมราช</span><br>
                                            <span><strong>เลขที่บัญชี</strong> 866-235705-3</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" id="payment" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <h5>ข้อมูลการชำระเงิน</h5>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <label>ชื่อ - นามสกุล</label><span class="error">*</span>
                                                            <input type="text" class="form-control" name="name" placeholder="ชื่อ - นามสกุล">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8 form-group">
                                                            <label>วันที่ชำระเงิน</label><span class="error">*</span>
                                                            <input type="text" class="form-control" name="slipdate" id="slipdate" placeholder="วันที่ชำระเงิน">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label>เวลาที่ชำระเงิน</label><span class="error">*</span>
                                                            <input type="text" class="form-control" name="sliptime" id="sliptime" placeholder="เวลาที่ชำระเงิน">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <div class="form-group">
                                                                <label>รูปหลักฐานการจ่ายเงิน</label>
                                                                <div class="image-editor">
                                                                    <input type="file" class="cropit-image-input" name="tempImage" required>
                                                                    <div class="cropit-preview"></div>
                                                                    <div class="image-size-label">ปรับขนาด</div>
                                                                    <input type="range" class="cropit-image-zoom-input">
                                                                    <input type="hidden" name="slip" class="hidden-image-data" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span><strong>วันที่จองติดตั้ง:</strong></span><br>
                                                <span id="booking"></span>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span><strong>รถที่เข้าใช้บริการ:</strong></span><br>
                                                <span id="carprofile-data"></span>
                                                <hr>
                                            </div>
                                        </div>
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
                                                <button type="submit"
                                                    class="btn btn-main-md width-100p bg-orange">ยืนยัน</button>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>