<style>
    img.logobank{
        width:80px;
        height:80px;
    }
    img.extire{
        width:120px;
        height:160px;
    }
    img.exbrand{
        width:200px;
        height:80px;
    }
</style>
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
            <input type="hidden" name="tire_dataId" id="tire_dataId" value="<?=$tire_dataId?>">
            <input type="hidden" name="garageId" id="garageId" value="<?=$garageId?>">
            <input type="hidden" name="number" id="number" value="<?=$number?>">

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
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" name="next" id="next" value="next"> ชำระเงินภายหลัง
                        </div>
                    </div>
                    <br>
                    <div class="row" id="bank">
                        <div class="col-md-12 card">
                            <div class="row card-body">
                                <div class="col-3 text-center">
                                    <img src="https://i.pinimg.com/474x/00/24/29/002429e4b28532ce5273cafa10be61c2.jpg" class="logobank" alt="">
                                </div>
                                <div class="col-1">
                                </div>
                                <div class="col-8">
                                    <span>ธนาคารกสิกรไทย</span><br>
                                    <span>ชื่อ Carjaidee สาขา ท่าศาลา</span><br>
                                    <span>11-5586-3598</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>    
                    <div class="row" id="payment">
                        <div class="col-md-12 card"> 
                            <div class="card-body">
                                <h5>รายละเอียดการสั่งสินค้า</h5>
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
                                                <input type="file" class="form-control-file" name="slipfile" id="slipfile">
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
                    <?php if(isUser()){ ?>
                    <div class="row">
                        <div class="col-md-12 card">
                            <div class="card-body">
                                <h5>รถเข้าใช้บริการ</h5><hr>
                                <div class="row">
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
                    <?php } ?>
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
                                        <input type="number" id="number" class="form-control v-number" value="4" min="1">
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