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
    div.card-header img {
        width: 200px;
        height: 100px;
        text-align: center;
        margin: 50px 0px 0px 0px;
    }
    i.star {
        color: #fff424;
        text-shadow: 0 0 3px #000;
        text-align: center;
        cursor: pointer;
    }
    div.card-block button{
        margin-bottom: 25px; 
    }
    p.card-text img {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
</style>

<section class="section pricing" id="search">
    <div class="container">
        <div id="boby"> 
            <!-- id="content" show like search tire -->
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main">
                            <option>-- จังหวัด --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main">
                            <option>-- อำเภอ --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main">
                            <option>-- ความชำนาญ --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control main">
                            <option>-- การให้บริการ --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control main" placeholder="ชื่อผู้ให้บริการ">
                    </div>
                </div>
                <div class="col-md-5">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>ค้นหา<span class="alternate">ผู้ให้บริการใกล้เคียง</span></h3> 
                        <!-- id="title" show "ยางรถยนต์"-->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card flex-row flex-wrap">
                        <div class="card-header col-md-5 text-center">
                            <img src="https://autoshops-i85mediainc.netdna-ssl.com/images/shops/0e560e/photos/auto-repair-san-diego-ca-1462478191.large.jpg">
                        </div>
                        <div class="card-block col-md-7">
                            <br>
                            <h4 class="card-title">ร้าน CarJaidee</h4>
                            <p class="card-text">
                                <b>ชื่อ: </b> ร้าน CarJaidee 
                                <br>
                                <b>สถานที่: </b> ใกล้มหาวิทยาลัยวลัยลักษณ์
                                <br>
                                <b>วันเปิดบริการ: </b> จ., อ., พฤ., ศ., ส.
                                <br>
                                <b>เวลาเปิดบริการ: </b> 09:00 - 18:00 น.
                                <br>
                                <b>ความชำนาญ: </b> Mercedes-Benz
                                <br>
                                <b>เบอร์โทรติดต่อ: </b> 075-369852
                                <br>
                                <b>การให้บริการ: </b> 
                                        <img src="<?=base_url('public/images/icon/wifi.png')?>" title="ไวไฟฟรี">
                                        <img src="<?=base_url('public/images/icon/airconditioner.png')?>" title="มีเครื่องปรับอากาศ">
                                        <img src="<?=base_url('public/images/icon/toilet.png')?>" title="มีสุขา">
                                <br>
                                <b>Rating: </b> 
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                            </p>
                            <br>
                            <button class="btn btn-transparent-md"><i class="fa fa-road"></i> แสดงเส้นทาง</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-row flex-wrap">
                        <div class="card-header col-md-5">
                            <img src="https://autoshops-i85mediainc.netdna-ssl.com/images/shops/0e560e/photos/auto-repair-san-diego-ca-1462478191.large.jpg">
                            
                            
                        </div>
                        <div class="card-block col-md-7">
                            <br>
                            <h4 class="card-title">ร้าน CarJaidee</h4>
                            <p class="card-text">
                                <b>ชื่อ: </b> ร้าน CarJaidee 
                                <br>
                                <b>สถานที่: </b> ใกล้มหาวิทยาลัยวลัยลักษณ์
                                <br>
                                <b>วันเปิดบริการ: </b> จ., อ., พฤ., ศ., ส.
                                <br>
                                <b>เวลาเปิดบริการ: </b> 09:00 - 18:00 น.
                                <br>
                                <b>ความชำนาญ: </b> Mercedes-Benz
                                <br>
                                <b>เบอร์โทรติดต่อ: </b> 075-369852
                                <br>
                                <b>การให้บริการ: </b> 
                                <img src="<?=base_url('public/images/icon/wifi.png')?>" title="ไวไฟฟรี">
                                        <img src="<?=base_url('public/images/icon/airconditioner.png')?>" title="มีเครื่องปรับอากาศ">
                                        <img src="<?=base_url('public/images/icon/toilet.png')?>" title="มีสุขา">
                                <br>
                                <b>Rating: </b> 
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                            </p>
                            <br>
                            <button class="btn btn-transparent-md"><i class="fa fa-road"></i> แสดงเส้นทาง</button>
                            <br>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- <div class="row">
            
                <div id="googleMap" style="width:100%;height:400px; border-radius:6px"></div>

                <script>
                function myMap() {
                var mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                }
                </script>

                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

        </div> -->
    </div>            
</section>