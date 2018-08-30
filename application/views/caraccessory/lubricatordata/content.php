<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ข้อมูลน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Lubricatordata"); ?>">ข้อมูลน้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- End Container fluid  -->
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">ชนิดน้ำมันเครื่อง</label>
                            <div class="input-group input-group-default">
                                <select class="form-control valid" name="lubricator_gear" id="lubricator_gear">
                                    <option value="">เลือกชนิดน้ำมันเครื่อง</option>
                                    <option value="1">น้ำมันเครื่อง</option>
                                    <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                    <option value="3">น้ำมันเกียร์ออโต</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">ยี่ห้อน้ำมันเครื่อง</label>
                            <div class="input-group input-group-default">
                                <select class="form-control" id="lubricator_brandId" name="lubricator_brandId">
                                    <option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">รุ่นน้ำมันเครื่อง</label>
                            <div class="input-group input-group-default">
                                <select class="form-control" id="lubricatorId" name="lubricatorId">
                                <option value="">เลือกรุ่นน้ำมันเครื่อง</option>
                                </select>
                            </div>
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
                    <a href="<?=base_url("caraccessory/LubricatorData/create") ?>">
                        <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                        <i class="fa fa-plus"> สร้าง</i></button>
                    </a>

                    <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                        <i class="ti-search"> ค้นหา</i>
                    </button>
                </div>
            </div>
            
        <div class="table mt-20">
            <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                </thead>
            </table>
        </div>
        