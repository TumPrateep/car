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
                            <h3>เลือก<span class="alternate"> ศูนย์บริการ</span></h3>
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
                            <div class="row" id="payment">
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        <h5>เลือกศูนย์บริการ</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-transparent-md btn-detail btn-block" 
                                                    data-toggle="modal" data-target="#choosegarage">เลือกศูนย์บริการ
                                                </button>
                                            </div>

                                            <!-- modal -->
                                            <div class="modal fade" id="choosegarage" tabindex="-1" role="dialog" aria-labelledby="choosegarage" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="choosegarageTitle">เลือกศูนย์บริการ</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <select class="form-control main-md valid" name="provinceIdSearch" id="provinceIdSearch" aria-required="true" aria-invalid="false">
                                                                        <option value="">จังหวัด</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <select class="form-control main-md valid" name="provinceIdSearch" id="provinceIdSearch" aria-required="true" aria-invalid="false">
                                                                        <option value="">อำเภอ</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <select class="form-control main-md valid" name="provinceIdSearch" id="provinceIdSearch" aria-required="true" aria-invalid="false">
                                                                        <option value="">ตำบล</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <select class="form-control main-md valid" name="provinceIdSearch" id="provinceIdSearch" aria-required="true" aria-invalid="false">
                                                                        <option value="">เลือกบริการ</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" name="hire_date" id="hire_date" placeholder="ชื่อผู้ให้บริการ">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-block bg-orange text-white">ค้นหา</button>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="card mb-3" style="max-width: 540px;">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-md-6">
                                                                                <img src="<?php echo base_url('public/image/garage/5cc92a96d1f70.png') ?>" class="card-img" alt="...">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">MYDAY</h5>
                                                                                    <p class="card-text"><b><i class="fa fa-calendar" aria-hidden="true"></i></b> จ, อ, พ, ส, อา
                                                                                        <br><b><i class="fa fa-clock-o" aria-hidden="true"></i></b> 07:00 - 21:00 น.
                                                                                        <br><b><i class="fa fa-phone" aria-hidden="true"></i></b> 0833969552
                                                                                        <br><b><i class="fa fa-road" aria-hidden="true"></i></b> 365 กม.
                                                                                    </p>                                                                            
                                                                                    <a href="#" class="btn btn-block bg-orange text-white float-right">เลือก</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card mb-3" style="max-width: 540px;">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-md-6">
                                                                                <img src="<?php echo base_url('public/image/garage/5cc92a96d1f70.png') ?>" class="card-img" alt="...">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">MYDAY</h5>
                                                                                    <p class="card-text"><b><i class="fa fa-calendar" aria-hidden="true"></i></b> จ, อ, พ, ส, อา
                                                                                        <br><b><i class="fa fa-clock-o" aria-hidden="true"></i></b> 07:00 - 21:00 น.
                                                                                        <br><b><i class="fa fa-phone" aria-hidden="true"></i></b> 0833969552
                                                                                        <br><b><i class="fa fa-road" aria-hidden="true"></i></b> 365 กม.
                                                                                    </p>                                                                            
                                                                                    <a href="#" class="btn btn-block bg-orange text-white float-right">เลือก</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="card mb-3" style="max-width: 540px;">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-md-6">
                                                                                <img src="<?php echo base_url('public/image/garage/5cc92a96d1f70.png') ?>" class="card-img" alt="...">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">MYDAY</h5>
                                                                                    <p class="card-text"><b><i class="fa fa-calendar" aria-hidden="true"></i></b> จ, อ, พ, ส, อา
                                                                                        <br><b><i class="fa fa-clock-o" aria-hidden="true"></i></b> 07:00 - 21:00 น.
                                                                                        <br><b><i class="fa fa-phone" aria-hidden="true"></i></b> 0833969552
                                                                                        <br><b><i class="fa fa-road" aria-hidden="true"></i></b> 365 กม.
                                                                                    </p>                                                                            
                                                                                    <a href="#" class="btn btn-block bg-orange text-white float-right">เลือก</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card mb-3" style="max-width: 540px;">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-md-6">
                                                                                <img src="<?php echo base_url('public/image/garage/5cc92a96d1f70.png') ?>" class="card-img" alt="...">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">MYDAY</h5>
                                                                                    <p class="card-text"><b><i class="fa fa-calendar" aria-hidden="true"></i></b> จ, อ, พ, ส, อา
                                                                                        <br><b><i class="fa fa-clock-o" aria-hidden="true"></i></b> 07:00 - 21:00 น.
                                                                                        <br><b><i class="fa fa-phone" aria-hidden="true"></i></b> 0833969552
                                                                                        <br><b><i class="fa fa-road" aria-hidden="true"></i></b> 365 กม.
                                                                                    </p>                                                                            
                                                                                    <a href="#" class="btn btn-block bg-orange text-white float-right">เลือก</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End modal -->

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <img src="<?php echo base_url('public/image/garage/5cc92a96d1f70.png') ?>" alt="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <h4>MYDAY</h4>
                                                <p class="card-text">
                                                    <b><i class="fa fa-calendar" aria-hidden="true"></i></b> จ, อ, พ, ส, อา
                                                    <br><b><i class="fa fa-clock-o" aria-hidden="true"></i></b> 07:00 - 21:00 น.
                                                    <br><b><i class="fa fa-phone" aria-hidden="true"></i></b> 0833969552
                                                    <br>
                                                    <h5>ระยะทาง</h5>
                                                    <h5 class="text-center">365 กม.</h5>
                                                </p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <?php if(isUser()){ ?>
                                <div class="row">
                                    <div class="col-md-12 card">
                                        <div class="card-body">
                                            <h5>รถเข้าใช้บริการ</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select name="car_profile" id="car_profile" class="form-control">
                                                        <option value="">เลือกรถเข้าใช้บริการ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
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
                                </div>
                                <br>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12 card">
                                        <div class="card-body">
                                            <h5>สรุปการสั่งซื้อ</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span><strong>ศูนย์บริการคาร์ใจดี:</strong></span>
                                                    <br>
                                                    <span id="garage"></span>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="https://www.tyremarket.com/images/products/EP150.jpg" class="extire" alt="">
                                                </div>
                                                <div class="col-8 text-right">
                                                    <span id="tire-data"></span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-3">
                                                    <input type="number" name="quantity" class="form-control v-number" value="4" min="1">
                                                </div>
                                                <div class="col-9 text-right">
                                                    <h4 class="amount"></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span>ยางรถยนต์</span>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <span class="number"></span>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <span class="amount"></span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span><strong>รวมทั้งหมด</strong></span>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <span><strong class="number"></strong></span>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <span><strong class="amount"></strong></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php if(!isUser()){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-main-md width-100p bg-secondary" onclick="window.location = '<?=base_url('login')?>'">เข้าสู่ระบบ/ลงทะเบียน</a>
                                                    </div>
                                                </div>
                                                <?php }else{ ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-main-md width-100p bg-secondary" onclick="window.history.back();">ย้อนกลับ</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-main-md width-100p bg-orange">ยืนยัน</button>
                                                        </div>
                                                    </div>
                                                <?php } ?>
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