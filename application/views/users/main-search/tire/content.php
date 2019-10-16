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
                <div class="col-md-6">
                    <!-- Pricing Item -->
                    <div class="pricing-item">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title">
                                <h6>ค้นหาจากข้อมูลรถ</h6></div>
                        </div>
                        <div class="pricing-body">
                            <form id="car-search">
                                <div class="form-group">
                                    <select class="form-control main" name="brandId" id="brandId">
                                        <option value="">ยี่ห้อรถยนต์</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="car_type" id="car_type">
                                    <select class="form-control main" name="model_name" id="model_name">
                                        <option value="">รุ่นรถยนต์</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control main" name="year" id="year">
                                        <option value="">ปีผลิต</option>
                                    </select>
                                </div>
                                <div id="show-detail" style="display:none;">
                                    <div class="form-group">
                                        <select class="form-control main" name="modelId" id="modelId">
                                            <option value="">ข้อมูลเพิ่มเติม</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control main" name="modelofcarId" id="modelofcarId">
                                        <option value="">รายละเอียดรุ่น</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Pricing Item -->
                    <div class="pricing-item">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title">
                                <h6>ค้นหาจากขนาดยาง</h6></div>
                        </div>
                        <form id="tire-search">
                            <div class="pricing-body">
                                <div class="form-group">
                                    <select class="form-control main" name="tire_brandId" id="tire_brandId">
                                        <option>ยี่ห้อยาง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control main" name="tire_modelId" id="tire_modelId">
                                        <option>รุ่นยาง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control main" name="rimId" id="rimId">
                                        <option>ขอบยาง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control main" name="tire_sizeId" id="tire_sizeId">
                                        <option>ขนาดยาง</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>