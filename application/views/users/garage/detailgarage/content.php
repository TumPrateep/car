<style>
img.pic {
    width: 220px;
    height: 180px;
}

img.icon {
    width: 20px;
    height: 20px;
    cursor: pointer;
}

img.thumbnail {
    width: 60px;
    height: 60px;
    cursor: pointer;
}

p.comment {
    padding: 15px 0px 10px 0px;
}

p.reply {
    padding: 0px 0px 3px 20px;
    /* margin: 0px 0px 0px 0px; */
}

*,
::after,
::before {
    box-sizing: border-box;
}

ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
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
}

.footer.order {
    background-color: #343a40;
    color: white;
}

.detail {
    width: -webkit-fill-available !important;
}
</style>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=699132327152708&autoLogAppEvents=1">
</script>

<div class="container">
    <div class="container">
        <div id="boby">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>รายละเอียด<span class="alternate">ศูนย์บริการคาร์ใจดี</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="garageId" id="garageId" value="<?=$garageId?>">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?=base_url('public/image/garage/' . $garageData->picture)?>" class="pic"
                                        alt="">
                                </div>
                                <div class="col-md-7">
                                    <h5><?=$garageData->garageName?> <div class="fb-share-button"
                                            data-href="<?=base_url('search/garage/detailgarage/' . $garageId)?>"
                                            data-layout=" button" data-size="small"><a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url('search/garage/detailgarage/' . $garageId)?>&amp;src=sdkpreparse"
                                                class="fb-xfbml-parse-ignore">แชร์</a></div>
                                    </h5>
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?=changeStringToDay($garageData->dayopenhour)?></span><br>
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <?=date('H:i', strtotime($garageData->openingtime))?> -
                                        <?=date('H:i', strtotime($garageData->closingtime))?> น.</span><br>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i>
                                        <?=$garageData->phone?></span><br>
                                    <img src="<?=base_url('public/images/icon/wifi.png')?>" class="icon"
                                        title="ไวไฟฟรี">
                                    <img src="<?=base_url('public/images/icon/airconditioner.png')?>" class="icon"
                                        title="มีเครื่องปรับอากาศ">
                                    <img src="<?=base_url('public/images/icon/toilet.png')?>" class="icon"
                                        title="มีสุขา">
                                    <div class="mb-20 text-center">
                                        <h4 id="show-rating">
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <span><strong>ที่อยู่</strong></span><br>
                                    <span id="txt-address"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" id="box-owner">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">
                                <img src="#" id="owner-picture" alt="">
                            </p>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <strong>เจ้าของศูนย์บริการ</strong>
                                    <span id="txt-owner"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <span id="show-comment"></span>
                </div>
            </div>
            <br>
            <div id="search-box" class="hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3>ค้นหา<span class="alternate">ยางรถยนต์</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" data-target="#searchFromCar" data-toggle="tab"
                                    href="#searchFromCar">ค้นหาจากข้อมูลรถ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-target="#searchFromTire" data-toggle="tab"
                                    href="#searchFromTire">ค้นหาจากข้อมูลยาง</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade" id="searchFromCar">
                                <br>
                                <form id="car-search">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" id="brandId" name="brandId">
                                                    <option value="">ยี่ห้อรถ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" id="model_name" name="model_name">
                                                    <option value="">รุ่นรถ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" id="year" name="year">
                                                    <option value="">ปีที่ผลิต</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" name="car_tire_sizeId"
                                                    id="car_tire_sizeId">
                                                    <option value="">ขนาดยาง</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show active" id="searchFromTire">
                                <br>
                                <form id="tire-search">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" name="rimId" id="rimId">
                                                    <option value="">ขอบยาง</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" name="tire_sizeId" id="tire_sizeId">
                                                    <option value="">ขนาดยาง</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" name="tire_brandId" id="tire_brandId">
                                                    <option value="">ยี่ห้อยาง</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control main" name="tire_modelId" id="tire_modelId">
                                                    <option value="">รุ่นยาง</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <div id="tag-show"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="justify-content-end">
                            <div class="text-right">
                                <button class="btn btn-transparent-md" id="btn-car-search"><i class="fa fa-search"></i>
                                    ค้นหา</button>
                                <button class="btn btn-transparent-md" id="btn-clear"><i
                                        class="fa fa-eraser"></i>ล้างคำค้นหา</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row justify-content-end">
                    <span class="text"> จัดเรียง:</span>
                    <div class="col-md-2">
                        <div class="text-right">
                            <select class="form-control sortby justify-content-end" id="modelofcarId">
                                <option>ก - ฮ</option>
                                <option>ฮ - ก</option>
                                <option>ราคาต่ำไปสูง</option>
                                <option>ราคาสูงไปต่ำ</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>

                <div class="borderTB">
                    <a name="tire"></a>
                    <table class="" id="tire-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>