<style>
    *, ::after, ::before {
        box-sizing: border-box;
    }
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
    .card-header{
        border-bottom: 0px solid rgba(0,0,0,.125);
    }
    div.card-header img {
        text-align: center;
        margin: 10px 0px 0px 0px;
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
    ul.pagination li a {
        font-size: 13px;
    }
    table > thead {
        display: none;
    }
    .dataTables_wrapper.container-fluid{
        padding-right: 0px;
        padding-left: 0px;
    }
</style>

<section class="section pricing" id="search">
    <div class="container">
        <div id="boby"> 
            <!-- id="content" show like search tire -->
            <form id="search-garage">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control main" name="provinceIdSearch" id="provinceIdSearch">
                                <option value="">จังหวัด</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control main" name="districtIdSearch" id="districtIdSearch">
                                <option value="">อำเภอ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control main" name="brandId" id="brandId">
                                <option value="">ความชำนาญ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control main" name="Service" id="Service">
                                <option value="">เลือกการบริการ</option>
                                <option value="1">เปลี่ยนอะไหล่ช่วงล่าง</option>
                                <option value="2">เปลี่ยนยาง</option>
                                <option value="3">เปลี่ยนน้ำมันเครื่อง</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control main" placeholder="ชื่อผู้ให้บริการ" id="garagename" name="garagename" placeholder="ชื่ออู่ซ่อมรถ">
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-4">    
                    <div class="justify-content-end">
                        <div class="text-right">
                            <button class="btn btn-transparent-md" id="btn-search"><i class="fa fa-search"></i> ค้นหา</button>
                            <button class="btn btn-transparent-md" id="btn-clear"><i class="fa fa-eraser"></i>ล้างคำค้นหา</button>
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

            <table class="" id="search-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
            </table>

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