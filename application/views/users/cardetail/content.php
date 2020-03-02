<style>
    .section{
        padding: 30px 0;
    }
    .text-brand{
        font-size: 16px;
        font-weight: 600;
    }
    .text-size{
        font-size: 18px;
        font-weight: 600;
    }
    .btn-result {
    padding: 7px 7px 7px 7px;
}

div.brand img {
    margin: 45px 0px 0px 0px;
    width: 100%;
    height: auto;
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
    font-size: 16px;
}

.footer.order {
    background-color: #343a40;
    color: white;
}

.detail {
    width: -webkit-fill-available !important;
}

div.pic img {
    width: 145px;
    height: auto !important;
}

.card-header {
    background-color: rgba(0,0,0,0);
}

.dt-border{
    padding: 5px;
    border-radius: 5px;
    border: 2px solid #a2a2a2;
    text-align: center;
    color: #212529;
    margin-bottom: 5px;
    font-size: 14px;
}

.dt-border > .text {
    font-size: 17px;
}

.col-lg-6{
    margin-top: 10px;
}
#add-tire{
    border: 1px solid #dfdfdf;
    font-size: 30px;
    color: #ff66009e;
    padding-bottom: 35px;
    padding-top: 35px;
    cursor: pointer;
}
</style>

<input type="hidden" name="car_profileId" id="car_profileId" value="<?= $car_profileId ?>">
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h5>ข้อมูล<span class="alternate">รถของคุณ</span></h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-6"><strong>
                                        <h6>ข้อมูล<span class="alternate">รถ</span></h6></strong>
                                    </div>
                                    <div class="col-6 text-right">
                                        <img src="#" id="car-logo" alt="logo" class="rounded" width="70%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><img class="card-img-top" src="#" id="text-car-picture" width="100%" alt=""></p>
                                        <div>
                                            <p><strong id="text-car"> - </strong></p>
                                            <p>
                                                <div class="dt-border" id="text-vehicle">-</div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <strong><h6>ข้อมูล<span class="alternate">ยาง</span></h6></strong>
                                <div id="tire-data">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <p><img src="#" id="text-tire-logo" alt="logo" width="90%"></p>
                                            <p><img src="#" id="text-tire-picture" alt="tire" width="180px"></p>
                                            <p>
                                                <div class="text-brand"><div class="text" id="text-tire-brand">-</div></div>
                                                <div class="text-size"><strong id="text-tire-size">-</strong></div>                             
                                            </p>
                                            <p>
                                                <a href="#" class="text-orange">แก้ไขข้อมูลยาง</a></button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="add-tire" class="text-center">
                                    <i class="fa fa-plus" aria-hidden="true"></i><br>
                                    <small>เพิ่มข้อมูลยาง</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6>ข้อมูลรถและการ<span class="alternate">ซ่อมบำรุง</span></h6>
                        <h6><span class="alternate">ยาง</span></h6>
                        <div class="row">
                            <div class="col-md-5">
                                <strong>ขนาดยางที่เหมาะสมกับรถ</strong>
                            </div>
                            <div class="col-md-7" id="text-matching">
                                -
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <strong>ขนาดยางที่ใช้</strong>
                            </div>
                            <div class="col-md-7" id="text-current-tire">
                                -
                            </div>
                        </div>
                        <h6><span class="alternate">น้ำมันเครื่อง</span></h6>
                        <div class="row">
                            <div class="col-md-5">
                                <strong>น้ำมันเครื่องที่ใช้</strong>
                            </div>
                            <div class="col-md-4">
                                -
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <strong>เลขไมล์ล่าสุด</strong>
                            </div>
                            <div class="col-md-4">
                                -
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <strong>เลขไมล์ที่ต้องเปลี่ยนน้ำมันเครื่องครั้งถัดไป</strong>
                            </div>
                            <div class="col-md-4">
                                -
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <h5>สินค้าที่เหมาะกับ<span class="alternate">รถของคุณ</span></h5>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-target="#searchFromCar" data-toggle="tab"
                                    href="#searchFromCar">
                                    <div class="pricing-heading">
                                        <!-- Title -->
                                        <div class="title">
                                            <h6><span class="alternate">ยาง</span></h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-target="#searchFromLubricator" data-toggle="tab"
                                    href="#searchFromLubricator">
                                    <div class="pricing-heading">
                                        <!-- Title -->
                                        <div class="title">
                                            <h6><span class="alternate">น้ำมันเครื่อง</span></h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-main-search">
                            <a name="tire"></a>
                            <div class="tab-pane fade show active" id="searchFromCar"></div>
                            <div class="tab-pane fade show" id="searchFromLubricator"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>