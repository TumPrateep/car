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

<section class="section pricing">
    <div class="container">
        <div class="container">
            <div id="boby">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3>รายละเอียดสินค้า<span class="alternate"> และ </span>การชำระเงิน</h3>
                        </div>
                    </div>
                </div>
                <form id="form-rent">
                    <!-- <input type="hidden" name="tire_dataId" id="tire_dataId" value="<?=$tire_dataId?>">
                    <input type="hidden" name="garageId" id="garageId" value="<?=$garageId?>">
                    <input type="hidden" name="number" id="number" value="<?=$number?>"> -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <h5>เลือกวันที่จอง</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>วันที่จอง</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="hire_date" id="hire_date"
                                                    placeholder="วันที่จอง">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>เวลาจอง</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="hire_time" id="hire_time"
                                                    placeholder="เวลาจอง">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
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
                                    <div class="form-check">
                                        <input class="form-check-input next" type="radio" name="next" value="1">
                                        <label class="form-check-label">
                                            ชำระเงินภายหลัง
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label id="next-error" class="error" for="next"></label>
                                </div>
                            </div>
                            <br>
                            <div class="row" id="bank" style="display: none;">
                                <div class="col-md-12 card">
                                    <div class="row card-body">
                                        <div class="col-3 text-center">
                                            <img src="<?=base_url('public/images/logo/scb.png')?>"
                                                class="logobank" alt="">
                                        </div>
                                        <div class="col-1">
                                        </div>
                                        <div class="col-8">
                                            <strong>ธนาคารไทยพาณิชย์</strong><br>
                                            <span><strong>ชื่อบัญชี</strong> นายพล ออโต้ เทรดดิ้งโดย นาย สาทร ช่วยสง <br><strong>สาขา</strong> โรบินสัน นครศรีธรรมราช</span><br>
                                            <span><strong>เลขที่บัญชี</strong> 866-235705-3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" id="payment" style="display: none;">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <h5>รายละเอียดการสั่งสินค้า</h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>ชื่อ - นามสกุล</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="ชื่อ - นามสกุล">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 form-group">
                                                <label>วันที่ชำระเงิน</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="slipdate" id="slipdate"
                                                    placeholder="วันที่ชำระเงิน">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>เวลาที่ชำระเงิน</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="sliptime" id="sliptime"
                                                    placeholder="เวลาที่ชำระเงิน">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <div class="form-group">
                                                    <label>รูปหลักฐานการจ่ายเงิน</label>
                                                    <div class="image-editor">
                                                        <input type="file" class="cropit-image-input" name="tempImage"
                                                            required>
                                                        <div class="cropit-preview"></div>
                                                        <div class="image-size-label">ปรับขนาด</div>
                                                        <input type="range" class="cropit-image-zoom-input">
                                                        <input type="hidden" name="slip" class="hidden-image-data" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <?php if (isUser()) {?>
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <h5>รถเข้าใช้บริการ <a href="<?=base_url('user/carprofile/create')?>"
                                                class="btn btn-outline-light bg-orange">สร้างข้อมูลรถ</a></h5>
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
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <h5>สรุปการสั่งซื้อ</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span><strong>ศูนย์บริการคาร์ใจดี:</strong></span><br>
                                                <span id="garage"></span>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="show-product" id="product-data"></div>
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
                                                <button class="btn btn-main-md width-100p bg-secondary"
                                                    onclick="window.location = '<?=base_url('login')?>'">เข้าสู่ระบบ/ลงทะเบียน</a>
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