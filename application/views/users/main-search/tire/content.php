<section class="section pricing" id="search">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>ค้นหา<span class="alternate" id="title">ยางรถยนต์</span></h3>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-target="#searchFromCar" data-toggle="tab"
                                href="#searchFromCar">
                                <div class="pricing-heading">
                                    <!-- Title -->
                                    <div class="title">
                                        <h6>ค้นหาจาก<span class="alternate">ข้อมูลยาง</span></h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="#searchFromTire" data-toggle="tab" href="#searchFromTire">
                                <div class="pricing-heading">
                                    <!-- Title -->
                                    <div class="title">
                                        <h6>ค้นหาจาก<span class="alternate">ข้อมูลรถ</span></h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-main-search">
                        <a name="tire"></a>
                        <div class="tab-pane fade show active" id="searchFromCar">
                            <br>
                            <form id="tire-search">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="tire_brandId" id="tire_brandId">
                                                <option>ยี่ห้อยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="tire_modelId" id="tire_modelId">
                                                <option>รุ่นยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="rimId" id="rimId">
                                                <option>ขอบยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="tire_sizeId" id="tire_sizeId">
                                                <option>ขนาดยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-transparent-md"><i
                                                    class="fa fa-search"></i>
                                                ค้นหา</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="searchFromTire">
                            <br>
                            <form id="car-search">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="brandId" id="brandId">
                                                <option value="">ยี่ห้อรถยนต์</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="hidden" name="car_type" id="car_type">
                                            <select class="form-control main" name="model_name" id="model_name">
                                                <option value="">รุ่นรถยนต์</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="year" id="year">
                                                <option value="">ปีผลิต</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="show-detail" style="display:none;">
                                        <div>
                                            <div class="form-group">
                                                <select class="form-control main" name="modelId" id="modelId">
                                                    <option value="">ข้อมูลเพิ่มเติม</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control main" name="modelofcarId" id="modelofcarId">
                                                <option value="">รายละเอียดรุ่น</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-transparent-md"><i
                                                    class="fa fa-search"></i>
                                                ค้นหา</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>