<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">รายการสินค้ารับคืน</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Lubricatordata"); ?>">รายการสินค้ารับคืน</a></li>
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
                    <!-- <a href="<?=base_url("caraccessory/LubricatorData/create") ?>">
                        <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                        <i class="fa fa-plus"> สร้าง</i></button>
                    </a> -->

                    <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                        <i class="ti-search"> ค้นหา</i>
                    </button>
                </div>
            </div>
            
        <div class="table">
            <table class="table table-bordered" id="dome-table" width="100%" cellspacing="0">
                <thead>
                  <th><i class="fa fa-sort"></i> ลำดับ</th>
                  <th><i class="fa fa-bars"></i>  รายละเอียดสินค้า</th>
                  <th><i class="fa fa-plus"></i>  จำนวน</th>
                  <th><i class="fa fa-usd"></i>  ราคา</th>
                  <!-- <th><i class="fa fa-user-circle"></i>  สถานะ</th> -->
                  <!-- <th></th> -->
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tracking-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-lg model-Width-sm" id="maxWidthSelect" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">กรอกรูปติดตาม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="submit">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="orderId" id="orderId">
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <textarea class="form-control sm-text-a" name="tracking-number" id="tracking-number" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <!-- <label class="control-label"></label> -->
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="tempImage" required>
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">ปรับขนาด</div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="picture_tracking" id="picture_tracking" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-success"> บันทึก</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> ปิด</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
        