<style>
    .headtb{
        background-color: #ff6600;
        padding:22px 40px;
    }
</style>
<section class="section pricing">
    <div class="container">
        <input type="hidden" name="orderId" id="orderId" value="<?=$orderId?>">
        <div class="row flex-row flex-wrap">
            <div class="col-md-12">
                <section class="schedule">
                    <div class="section-title">
                        <h3>หมายเลขการสั่งซื่อ : <span class="alternate" id="title"><?=$orderId?></span></h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p> -->
                    </div>
                    <div class="schedule-tab">
                        <ul class="nav nav-pills text-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#nov1" data-toggle="pill">
                                อู่ที่เข้าใช้บริการ
                                <!-- <span>20 November 2017</span> -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nov2" data-toggle="pill">
                                ป้ายทะเบียน
                                <!-- <span>21 November 2017</span> -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nov3" data-toggle="pill">
                                รายละเอียดค่าบริการ
                                <!-- <span>21 November 2017</span> -->
                            </a>
                        </li>
                        </ul>
                    </div>
                    <div class="schedule-contents">
                        <div class="tab-content">
                            <div class="tab-pane fade show active schedule-item" id="nov1">
                                <div class="card">
                                    <ul class="m-0 p-0">
                                        <li class="headings text-center">
                                            <div class="text-left">อู่ที่เข้าใช้บริการ</div>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                    <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="image" id="img-garage"></div>
                                                </div>
                                                <div class=" col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="txt-S-s">ชื่ออู่ : </label>
                                                            <label class="txt-S-s" name="garageName" id="garageName"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">                                                       
                                                        <div class=" col-md-12">
                                                            <label class="txt-S-s">วันที่เปิด : </label>
                                                            <label class="txt-S-s" name="dayopen" id="dayopen"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class=" col-md-12">
                                                            <label class="txt-S-ss">เวลาที่เปิด : </label>
                                                            <label class="txt-S-ss" name="timeopen" id="timeopen"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class=" col-md-12">
                                                            <label class="txt-S-ss">วันที่จอง : </label>
                                                            <label class="txt-S-ss" name="reserveday" id="reserveday"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade schedule-item" id="nov2">
                                <div class="card">
                                    <ul class="m-0 p-0">
                                        <li class="headings text-center">
                                            <div class="text-left">ป้ายทะเบียน</div>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="image" id="img-carprofile"></div>
                                                    </div>
                                                    <div class=" col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="txt-S-s">ยี่ห้อ : </label>
                                                                <label class="txt-S-s" name="brand_car" id="brand_car"></label>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                       
                                                            <div class=" col-md-12">
                                                                <label class="txt-S-s">รุ่นรถ : </label>
                                                                <label class="txt-S-s" name="model_car" id="model_car"></label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" col-md-12">
                                                                <label class="txt-S-ss">โฉมรถยนต์ : </label>
                                                                <label class="txt-S-ss" name="detail_car" id="detail_car"></label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" col-md-12">
                                                                <label class="txt-S-ss">รายละเอียด : </label>
                                                                <label class="txt-S-ss" name="model_of_car" id="model_of_car"></label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class=" col-md-6">
                                                                <label class="txt-S-s">ป้ายทะเบียน</label>
                                                                    <label class="txt-S-m" name="plate" id="plate"></label>
                                                                    <label class="txt-S-s" name="provinceplate" id="provinceplate"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade schedule-item" id="nov3">
                                <ul class="m-0 p-0" id="product-list">
                                    <li class="headings">
                                        <div class="time">รูป</div>
                                        <div class="speaker">ชื่อสินค้า</div>
                                        <div class="subject">จำนวน</div>
                                        <div class="venue">ราคา</div>
                                    </li>
                                    <!-- Schedule Details -->
                                    
                                    <!-- <div class="row">
                                        <div class="col-md-3 offset-md-9">
                                            <div class="card text-center">
                                                    <label><b>ราคาสินค้ารวม :</b> 10,100 บาท</label>
                                            </div>
                                        </div> 
                                    </div>  -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
       
    </div>
</section>