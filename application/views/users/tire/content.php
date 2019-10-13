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
            <!id="content" show like old search tire>
            <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-target="#searchFromCar" data-toggle="tab" href="#searchFromCar">ค้นหาจากข้อมูลรถ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-target="#searchFromTire" data-toggle="tab" href="#searchFromTire">ค้นหาจากข้อมูลยาง</a>
                            </li>
                        </ul>
                    <div class="tab-content">
                    <input type="hidden" name="t_brandId" id="t_brandId" value="<?=$brandId?>">
                    <input type="hidden" name="t_model_name" id="t_model_name" value="<?=$model_name?>">
                    <input type="hidden" name="t_year" id="t_year" value="<?=$year?>">
                    <input type="hidden" name="t_modelofcarId" id="t_modelofcarId" value="<?=$modelofcarId?>">
                        <div class="tab-pane fade show active" id="searchFromCar">
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
                        <div class="tab-pane fade" id="searchFromTire">
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>ยี่ห้อยาง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>รุ่นยาง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>ขอบยาง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>ขนาดยาง</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="searchTag">
                        <div class="desc">
                            Honda
                            <i class="fa fa-times-circle close"></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            Brio
                            <i class="fa fa-times-circle close"></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            2019
                            <i class="fa fa-times-circle close"></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            V CVT
                            <i class="fa fa-times-circle close"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">    
                    <div class="justify-content-end">
                        <div class="text-right">
                            <button class="btn btn-transparent-md" id="btn-car-search"><i class="fa fa-search"></i> ค้นหา</button>
                            <button class="btn btn-transparent-md"><i class="fa fa-eraser"></i>ล้างคำค้นหา</button>
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
<<<<<<< HEAD
                <table class="" id="tire-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>  
=======
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://www.tyremarket.com/images/products/EP150.jpg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> Bridgestone </div>
                        <div class="text"> EP150 </div>
                        <div class="text"> 175/65 R14 </div> 
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="http://pluspng.com/img-png/bridgestone-png-it-is-not-just-its-history-but-its-offerings-that-sets-bridgestone-apart-from-the-rest-of-the-tyre-makers-its-tyres-have-stood-the-test-of-time-2263.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="price"> ราคา 5000 ฿ </div>
                        <br>
                        <button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>
                    </div>
                </div>
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://fv.lnwfile.com/_/fv/_raw/dd/1h/v4.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> Giti </div>
                        <div class="text"> T20 </div>
                        <div class="text"> 175/65R14 </div> 
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="https://www.carlogos.org/tire-brands-logos/Giti-Tire-logo-1920x1080.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="price"> ราคา 10000 ฿ </div>
                        <br>
                        <button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>
                    </div>
                </div>
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://www.errolstyres.co.za/images/cmsimages/big/product_10247_3629_kumhokr26.jpg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> Kumho </div>
                        <div class="text"> Sense </div>
                        <div class="text"> 175/65R14 </div> 
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/KUMHO_TIRE_logo.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="price"> ราคา 10500 ฿ </div>
                        <br>
                        <button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>
                    </div>
                </div>
            </div>    
>>>>>>> 1f625a35227eeaf0704552f146f3f3d41e91d2be
        </div>
    </div>            
</section>