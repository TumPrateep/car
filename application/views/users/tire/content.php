<style>
    div.borderTB {
        border-top: 5px solid #ded9d9;
        border-bottom: 4px solid #ded9d9;
    }
    div.row-border {
        border-bottom: 1px solid #ded9d9;
    }
    div.detail{
        margin: auto;
        float: center;
        width: 200px;
        text-align: center;
    }
    div.brand img{
        margin: 30px 0px 0px 0px;
        width: 300px;
        height: 100px;
    }
    div.pic img{
        width: 145px;
        height: 160px;
        padding:  5px 3px 3px 3px; /* Top  Right Bottom Left*/
    }
    div.text {
        text-align: center;
    }
    div.price {
        font-size: 15pt;
        text-align: center;
    }
    div.searchTag {
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
        float: left;
        width: auto;
        background-color: #3b4045;
        /* cursor: pointer; */
    }
    div.desc {
        padding: 6px 5px 6px 8px; /* Top  Right Bottom Left*/
        text-align: center;
        font-size: 13px;
        color: #ffffff;
    }
    i.close {
        color: #fff;
        text-align: center;
        padding: 3px 3px 6px 6px; /* Top  Right Bottom Left*/
        cursor: pointer;
    }
    span.text {
        padding: 8px 3px 6px 1px; /* Top  Right Bottom Left*/
    }
    select.sortby {
        width: auto;
    }
    button.typeSearch {
        width: 350px;
        border-radius: 6px;
    }

</style>

<section class="section pricing" id="search">
    <div class="container">
        <div id="boby"> 
            <!-- id="content" show like old search tire -->
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
                        <div class="tab-pane fade show active" id="searchFromCar">
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- ยี่ห้อรถ --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- รุ่นรถ --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- ปีที่ผลิต --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- รายละเอียดรุ่นรถ --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="tab-pane fade" id="searchFromTire">
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- ยี่ห้อยาง --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- รุ่นยาง --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- ขอบยาง --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control main" id="modelofcarId">
                                            <option>-- ขนาดยาง --</option>
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
                            <i class="fa fa-times-circle close" onClick=""></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            Brio
                            <i class="fa fa-times-circle close" onClick=""></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            2019
                            <i class="fa fa-times-circle close" onClick=""></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            V CVT
                            <i class="fa fa-times-circle close" onClick=""></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">    
                    <div class="justify-content-end">
                        <div class="text-right">
                            <button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button>
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
                        <!-- id="title" show "ยางรถยนต์"-->
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
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://www.tyremarket.com/images/products/EP150.jpg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> Honda </div>
                        <div class="text"> Brio </div>
                        <div class="text"> 2019 </div>
                        <div class="text"> V CVT </div>
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
                        <div class="text"> ยี่ห้อน้ำมันเครื่อง + รุ่น </div>
                        <div class="text"> เบอร์น้ำมันเครื่อง + ความจุ </div>
                        <div class="text"> ดีเซล สังเคราะห์แท้ </div>
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="https://dki3ho7vp1wav.cloudfront.net/301.png?v=">
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
                        <div class="text"> ยี่ห้อน้ำมันเครื่อง + รุ่น </div>
                        <div class="text"> เบอร์น้ำมันเครื่อง + ความจุ </div>
                        <div class="text"> ดีเซล สังเคราะห์แท้ </div>
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
        </div>
    </div>            
</section>