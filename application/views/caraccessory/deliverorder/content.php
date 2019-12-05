<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">รายการส่งสินค้า</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="<?=base_url("caraccessory/lubricatordata");?>">ข้อมูลการจัดส่งสินค้า</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- End Container fluid  -->
    <div class="container-fluid">


        <!-- <div class="row">
            <div class="col-lg-12 pt-20 ml-8">
                <a href="<?=base_url("caraccessory/lubricatordata/create")?>">
                        <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                        <i class="fa fa-plus"> สร้าง</i></button>
                    </a>

                <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                    <i class="ti-search"> ค้นหา</i>
                </button>
            </div>
        </div> -->

        <div class="table">
            <table class="table table-striped" id="dt-table" width="100%" cellspacing="0">
                <thead>
                    <th><i class="fa fa-sort"></i> ลำดับ</th>
                    <th><i class="fa fa-bars"></i> รายละเอียดสินค้า</th>
                    <th> จำนวน</th>
                    <th> ราคา (บาท)</th>
                    <!-- <th><i class="fa fa-user-circle"></i>  สถานะ</th> -->
                    <!-- <th></th> -->
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tracking-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" id="maxWidthSelect" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดหลักฐานการส่ง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="submit">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="orderId" id="orderId">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span>วันที่-เวลาส่ง</span><span class="error">*</span>
                                            <input type="text" class="form-control" id="time" name="time"
                                                placeholder="วันที่-เวลาส่ง">
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span>แนบไฟล์หลักฐานการส่ง</span><span class="error">*</span>
                                            <input type="file" name="tracking" id="tracking">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"> บันทึก</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"> ปิด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>