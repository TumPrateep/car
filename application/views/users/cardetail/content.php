<style>
.modalpic {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 15%;
    width: 100%;
    /* Full width */
    height: 90%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
}

.modalpic-content {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 600px;
}

.close {
    position: absolute;
    top: 22px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

.pointer {
    cursor: pointer;
}

.card-body.order {
    background-color: #ff6600;
    color: aliceblue;
    padding: 0.5rem;
}

.card.pointer {
    cursor: pointer;
}

.order>h5 {
    color: white !important;
}

.footer.order {
    background-color: #343a40;
    color: white;
}

div.brand img {
    margin: 45px 0px 0px 0px;
    width: 100%;
    height: auto;
}
</style>

<input type="hidden" name="car_profileId" id="car_profileId" value="<?=$car_profileId?>">
<section class="section pricing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>รายละเอียด<span class="alternate" id="title">รถ</span></h3>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                         <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <img id="myImg" src="<?php echo base_url('public/image/carprofile/front.jpg') ?>"
                                        alt="หน้ารถ" class="w-75 border-0 rounded pointer mx-auto d-block">
                                </div>
                                <div class="card-footer">
                                    <p>ด้านหน้า</p>
                                </div>
                            </div>
                        </div>
         <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <img id="myImg" src="<?php echo base_url('public/image/carprofile/back.jpg') ?>"
                                        alt="หลังรถ" class="w-75 border-0 rounded pointer mx-auto d-block">
                                </div>
                                <div class="card-footer">
                                    <p>ด้านหลัง</p>
                                </div>
                            </div>
                        </div>
        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <img id="myImg"
                                        src="<?php echo base_url('public/image/carprofile/5d3c2cb0d56f6.png') ?>"
                                        alt="เล่มทะเบียน" class="w-75 border-0 rounded pointer mx-auto d-block pb-4">
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>เล่มทะเบียน</p>
                            </div>
                        </div>
    </div>
    </div>
    </div>
    </div> -->

        <!-- The Modal -->
        <div id="myModal" class="modalpic">
            <span class="close">&times;</span>
            <img class="modalpic-content" id="img01">
            <div id="caption" class="text-center text-white pt-4"></div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ข้อมูลรถ</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>ทะเบียนรถ : </strong>กฉ 4802 สงขลา</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>ยี่ห้อ : </strong>Honda</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>รุ่น : </strong>Brio</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>ปีรถ : </strong>2018</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>เชื้อเพลิง : </strong>ดีเซล</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>สี : </strong>ดำคริสตัล</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>เลขกิโลเมตร : </strong>100000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ยางรถที่แนะนำ</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <img src="http://localhost/car/public/image/tire_brand/5cc6fb979371e.png"
                                                                width="100%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="text-center">
                                                            <img src="https://www.tyremarket.com/images/products/EP150.jpg"
                                                                width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="text text-right"> MICHELIN </div>
                                                        <div class="text text-right"> XCD2 </div>
                                                        <div class="text text-right"> <strong>225/75R15</strong></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <a
                                                            href="http://localhost/car/search/tire/resultgarage/7/101/39">
                                                            <div class="card pointer full-view">
                                                                <div class="card-body order">ราคาต่ำสุด<br>
                                                                    <strong>1,000 บาท/เส้น</strong>
                                                                </div>
                                                                <div class="footer order">ค้นหาศูนย์บริการ / สั่งสินค้า
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <img src="http://localhost/car/public/image/tire_brand/5cc6fb979371e.png"
                                                                width="100%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="text-center">
                                                            <img src="https://www.tyremarket.com/images/products/EP150.jpg"
                                                                width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="text text-right"> MICHELIN </div>
                                                        <div class="text text-right"> XCD2 </div>
                                                        <div class="text text-right"> <strong>225/75R15</strong></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <a
                                                            href="http://localhost/car/search/tire/resultgarage/7/101/39">
                                                            <div class="card pointer full-view">
                                                                <div class="card-body order">ราคาต่ำสุด<br>
                                                                    <strong>1,000 บาท/เส้น</strong>
                                                                </div>
                                                                <div class="footer order">ค้นหาศูนย์บริการ / สั่งสินค้า
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <img src="http://localhost/car/public/image/tire_brand/5cc6fb979371e.png"
                                                                width="100%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="text-center">
                                                            <img src="https://www.tyremarket.com/images/products/EP150.jpg"
                                                                width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="text text-right"> MICHELIN </div>
                                                        <div class="text text-right"> XCD2 </div>
                                                        <div class="text text-right"> <strong>225/75R15</strong></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <a
                                                            href="http://localhost/car/search/tire/resultgarage/7/101/39">
                                                            <div class="card pointer full-view">
                                                                <div class="card-body order">ราคาต่ำสุด<br>
                                                                    <strong>1,000 บาท/เส้น</strong>
                                                                </div>
                                                                <div class="footer order">ค้นหาศูนย์บริการ / สั่งสินค้า
                                                                </div>
                                                            </div>
                                                        </a>
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
            </div>
        </div> -->


        <!-- <div class="row">
            <div class="col-md-12">
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://www.tyremarket.com/images/products/EP150.jpg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> MICHELIN </div>
                        <div class="text"> XCD2 </div>
                        <div class="text"> <strong>225/75R15</strong> </div>
                    </div>
                    <div class="brand col-md-3 text-center brand-logo sort-first">
                        <img src="http://localhost/car/public/image/tire_brand/5cc6fb979371e.png" width="100%">
                    </div>
                    <div class="detail col-md-3">
                        <a href="http://localhost/car/search/tire/resultgarage/7/101/39">
                            <div class="card pointer full-view">
                                <div class="card-body order">ราคาต่ำสุด
                                    <h5>1,000 บาท/เส้น</h5>
                                </div>
                                <div class="footer order">ค้นหาศูนย์บริการ / สั่งสินค้า</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->



    </div>
</section>