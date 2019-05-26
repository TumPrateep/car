<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <span class="text-primary">ข้อมูลอะไหล่ช่วงล่าง</span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/spareundercarriesdata"); ?>">ข้อมูลอะไหล่ช่วงล่าง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <form id="search">
            <div class="card" style="display:none;" id="search-form">
                <div class="card-body text-right">
                    <button type="button" id="search-hide" class="btn btn-dark btn-outline btn-sm m-b-10 m-l-5">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i> 
                        ซ่อน
                    </button>
                </div>
                <div class="row p-30">
                    <div class="col-lg-1 text-right"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="control-label">อะไหล่ช่วงล่าง</label>
                            <select class="form-control input-default" name="spares_undercarriageId" id="spares_undercarriageId">
                                <option value="">เลือกอะไหล่ช่วงล่าง</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">ยี่ห้ออะไหล่ช่วงล่าง</label>
                            <select class="form-control input-default" name="spares_brandId" id="spares_brandId">
                                <option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row p30">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="control-label">ช่วงราคา</label>
                            <div class="input-default">
                                <span id="start"></span> <input type="text" name="price" id="price"> <span id="end"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
                            <select class="form-control input-default" name="can_change" id="can_change">
                                <option value="">สั่งจองหรือเปลี่ยนทันที</option>
                                <option value="1">ปลี่ยนทันที</option>
                                <option value="2">สั่งจอง</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label">จัดเรียง: </label>
                            <select class="form-control input-default" name="sort" id="sort">
                                <option value="1" selected>เรียงลำดับจาก ก-ฮ</option>
                                <option value="2">เรียงลำดับจาก ฮ-ก</option>
                                <option value="3">เรียงลำดับจาก สถานะ</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="button" id="btn-search" class="btn-create btn btn-gray btn-md m-b-10 m-l-5">
                            <i class="ti-search"> ค้นหา</i>
                        </button>
                    </div>
                </div>
            </form>  
        </div> 

        <div class="row">
            <div class="col-lg-12 pt-20 ml-8">
                <a href="<?=base_url("caraccessory/spareundercarriesdata/createSpareundercarriesData") ?>">
                    <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                    <i class="fa fa-plus"> สร้าง</i></button>
                </a>

                <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                    <i class="ti-search"> ค้นหา</i>
                </button>
            </div>
        </div>
        
        <div class="table">
            <table class="table table-bordered" id="spareUndercarries-table" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card card-header-height">

                                        <div class="card-body">
                                            <!-- <div class="icon-left">
                                                <img class="card-img-top" src="http://localhost/car/public/image/tire_brand/1991f5f7d21e5f4a613089261a791b41.JPG">
                                                <img class="card-img-top" src="http://localhost/car/public/image/tire/tire.jpg">
                                            </div>
                                            <div class="icon-right">
                                                <img class="card-img-top" src="http://localhost/car/public/image/icon/Wet-Grip-Tyre-Label.png">
                                                <img class="card-img-top" src="http://localhost/car/public/image/icon/External-noise-Tyre-Label.png">
                                                <img class="card-img-top" src="http://localhost/car/public/image/icon/Fuel-efficiency-Tyre-Label.png">
                                            </div> -->
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7 font-black">
                                                    <small>
                                                        อะไหล่ <span class="text-lebel">XXX</span> <br>
                                                        ยี่ห้อไหล่ <span class="text-lebel">XXX</span> <br>
                                                        ยี่ห้อรถ <span class="text-lebel">XXX</span> <br>
                                                        รุ่นรถ <span class="text-lebel">XXX</span> <br>
                                                        ปีผลิต <span class="text-lebel">XXX</span> <br>
                                                        ขนาดยนต์<span class="text-lebel">XXX</span> <br>
                                                    </small>
                                                </div>
                                                <div class="col-md-5 border-left">
                                                    <h3 class="top-margin">5,555 .-</h3>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="#"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>
                                                <a href="#"><button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-trash"></i> ลบ</button> </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->