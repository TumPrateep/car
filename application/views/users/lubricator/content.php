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
        width: 200px;
        height: 100px;
    }
    div.pic img{
        width: 145px;
        height: 160px;
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
        padding: 6px 5px 6px 8px; 
        /* Top  Right Bottom Left*/
        text-align: center;
        font-size: 13px;
        color: #ffffff;
    }
    i.close {
        color: #fff;
        text-align: center;
        padding: 3px 3px 6px 6px;
        cursor: pointer;
    }
    span.text {
        padding: 8px 3px 6px 1px;
    }
    select.sortby {
        width: auto;
    }

</style>

<section class="section pricing" id="search">
    <div class="container">
        <div id="boby"> 
            <!-- id="content" show like search tire -->
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main" id="brandId">
                            <option>-- ยี่ห้อรถยนต์ --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main" id="model_name">
                            <option>-- รุ่นรถ --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main" id="year">
                            <option>-- ประเภทของเครื่องยนต์ --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main" id="modelofcarId">
                            <option>-- ชนิดเกียร์ --</option>
                        </select>
                    </div>
                </div>
            </div>
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
                            Accord
                            <i class="fa fa-times-circle close" onClick=""></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            Desel
                            <i class="fa fa-times-circle close" onClick=""></i>
                        </div>
                    </div>
                    <div class="searchTag">
                        <div class="desc">
                            Auto
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
                        <h3>ค้นหา<span class="alternate">น้ำมันเกียร์</span></h3> 
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
                        <img src="http://www.valvoline.co.th/media/Images/products/atf4.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> ยี่ห้อน้ำมันเครื่อง + รุ่น </div>
                        <div class="text"> เบอร์น้ำมันเครื่อง + ความจุ </div>
                        <div class="text"> ดีเซล สังเคราะห์แท้ </div>
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/54/ENEOS_logo.svg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="price"> ราคา 500 ฿ </div>
                        <br>
                        <button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>
                    </div>
                </div>
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://www.eneosthailand.com/images/img_upload/product_20181110102613.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> ยี่ห้อน้ำมันเครื่อง + รุ่น </div>
                        <div class="text"> เบอร์น้ำมันเครื่อง + ความจุ </div>
                        <div class="text"> ดีเซล สังเคราะห์แท้ </div>
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/54/ENEOS_logo.svg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="price"> ราคา 1,000 ฿ </div>
                        <br>
                        <button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>
                    </div>
                </div>
                <div class="row row-border">
                    <div class="pic col-md-3 text-center">
                        <img src="https://www.eneosthailand.com/images/img_upload/product_20181110101318.png">
                    </div>
                    <div class="detail col-md-3">
                        <div class="text"> ยี่ห้อน้ำมันเครื่อง + รุ่น </div>
                        <div class="text"> เบอร์น้ำมันเครื่อง + ความจุ </div>
                        <div class="text"> ดีเซล สังเคราะห์แท้ </div>
                    </div>
                    <div class="brand col-md-3 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/54/ENEOS_logo.svg">
                    </div>
                    <div class="detail col-md-3">
                        <div class="price"> ราคา 1,500 ฿ </div>
                        <br>
                        <button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>
                    </div>
                </div>
            </div>    
        </div>
    </div>            
</section>