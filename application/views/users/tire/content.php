<style>
    *, ::after, ::before {
        box-sizing: border-box;
    }
    ul.pagination li a {
        font-size: 13px;
    }

    table > thead {
        display: none;
    }
</style>
<section class="section pricing" id="search">
    <div class="container">
        <div id="boby"> 
            
            <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link <?=$cardata?>" data-target="#searchFromCar" data-toggle="tab" href="#searchFromCar">ค้นหาจากข้อมูลรถ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?=$tiredata?>" data-target="#searchFromTire" data-toggle="tab" href="#searchFromTire">ค้นหาจากข้อมูลยาง</a>
                            </li>
                        </ul>
                    <div class="tab-content">
                        <input type="hidden" name="t_brandId" id="t_brandId" value="<?=$brandId?>">
                        <input type="hidden" name="t_model_name" id="t_model_name" value="<?=$model_name?>">
                        <input type="hidden" name="t_year" id="t_year" value="<?=$year?>">
                        <input type="hidden" name="t_modelofcarId" id="t_modelofcarId" value="<?=$modelofcarId?>">

                        <input type="hidden" name="t_tire_brandId" id="t_tire_brandId" value="<?=$tire_brandId?>">
                        <input type="hidden" name="t_tire_modelId" id="t_tire_modelId" value="<?=$tire_modelId?>">
                        <input type="hidden" name="t_rimId" id="t_rimId" value="<?=$rimId?>">
                        <input type="hidden" name="t_tire_sizeId" id="t_tire_sizeId" value="<?=$tire_sizeId?>">

                        <div class="tab-pane fade <?=(!empty($cardata)?'show active':'')?>" id="searchFromCar">
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
                                            <select class="form-control main" id="modelofcarId" name="modelofcarId">
                                                <option value="">รายละเอียดรุ่นรถ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>    
                        </div>
                        <div class="tab-pane fade  <?=(!empty($tiredata)?'show active':'')?>" id="searchFromTire">
                            <br>
                            <form id="tire-search">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control main" name="tire_brandId" id="tire_brandId">
                                                <option>ยี่ห้อยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control main" name="tire_modelId" id="tire_modelId">
                                                <option>รุ่นยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control main" name="rimId" id="rimId">
                                                <option>ขอบยาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="form-control main" name="tire_sizeId" id="tire_sizeId">
                                                <option>ขนาดยาง</option>
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
                            <button class="btn btn-transparent-md" id="btn-car-search"><i class="fa fa-search"></i> ค้นหา</button>
                            <button class="btn btn-transparent-md" id="btn-clear"><i class="fa fa-eraser"></i>ล้างคำค้นหา</button>
                        </div>
                    </div>
                </div>
            </div>        
            <br>            
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>ค้นหา<span class="alternate">ยางรถยนต์</span></h3> 
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <span class="text"> จัดเรียง:</span>
                <div class="col-md-2">
                    <div class="text-right">
                        <select class="form-control sortby justify-content-end" id="modelofcarId">
                            <option>ก - ฮ</option>
                            <option>ฮ - ก</option>
                            <option>A - Z</option>
                            <option>Z - A</option>
                            <option>ราคาต่ำไปสูง</option>
                            <option>ราคาสูงไปต่ำ</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>

            <div class="borderTB">
                <table class="" id="tire-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>  
        </div>
    </div>            
</section>