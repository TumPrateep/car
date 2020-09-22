<style>
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
<section class="section pricing" id="search">
    <div class="container">
        <div id="boby"> 
            <!-- id="content" show like search tire -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link <?=$lubricatordata?>" data-target="#searchFromLubricator" data-toggle="tab"
                                href="#searchFromLubricator">ค้นหาจากข้อมูลของเหลว</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$cardata?>" data-target="#searchFromCar" data-toggle="tab"
                                href="#searchFromCar">ค้นหาจากข้อมูลรถ</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <input type="hidden" name="t_lubricator_gear" id="t_lubricator_gear" value="<?=$lubricator_gear?>">
                        <input type="hidden" name="t_lubricator_number" id="t_lubricator_number" value="<?=$lubricator_number?>">
                        <input type="hidden" name="t_lubricator_brand" id="t_lubricator_brand" value="<?=$lubricator_brand?>">

                        <div class="tab-pane fade <?=(!empty($cardata) ? 'show active' : '')?>" id="searchFromCar">
                            <br>
                            <form id="car-search">
                                
                            </form>
                        </div>
                        <div class="tab-pane fade  <?=(!empty($lubricatordata) ? 'show active' : '')?>" id="searchFromLubricator">
                            <br>
                            <form id="lubricator-search">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control main" name="lubricator_gear" id="lubricator_gear">
                                                <option value="">ประเภทของเหลว</option>
                                                <option value="1">น้ำมันเครื่อง</option>
                                                <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                                <option value="3">น้ำมันเกียร์ออโต</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control main" name="lubricator_number" id="lubricator_number">
                                                <option value="">เบอร์น้ำมันเครื่อง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control main" name="lubricator_brand" id="lubricator_brand">
                                                <option value="">ยี่ห้อน้ำมันเครื่อง</option>
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
                            <button class="btn btn-transparent-md" id="btn-lubricator-search"><i class="fa fa-search"></i>
                                ค้นหา</button>
                            <button class="btn btn-transparent-md" id="btn-clear"><i
                                    class="fa fa-eraser"></i>ล้างคำค้นหา</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>           
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>ค้นหา<span class="alternate">ของเหลว</span></h3> 
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
                <a name="tire"></a>
                <table class="" id="lubricator-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>    
        </>
    </div>            
</section>