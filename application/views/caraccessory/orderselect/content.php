<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ยืนยันการสั่งซื้อ</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">ยืนยันการสั่งซื้อ</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->

        <!-- <div class="row">
            <div class="card col-lg-12"> -->
        <!-- <div class="row justify-content-between">

                    <div class="col-lg-3 offset-lg-7 mt-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="spa" placeholder="ประเภทสินค้า">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-info btn-block" id="search"><i class="fa fa-search"></i>
                            ค้นหา</i></button>
                    </div>
                </div><br> -->
        <div class="card">
            <div class="card-body">

                <table class="table table-striped" id="changes-table" width="100%" cellspacing="0">
                    <thead>
                        <!-- <th>ลำดับ</th>
                        <th>รูป</th> -->
                        <th data-priority="2">รายละเอียดสินค้า</th>
                        <th>จำนวน</th>
                        <th data-priority="1"> </th>
                    </thead>
                </table>
            </div>
        </div>
        <!-- </div>
        </div> -->
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->

    <div class="modal fade" id="confirm-price-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ยืนยันการสั่งซื้อสินค้า</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="content-delete">
                    <div class="alert alert-warning" role="alert" id="product-detail"></div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ราคารวมค่าสินค้า</label>
                        <div class="col-sm-8">
                            <label class="col-form-label" id="product-price"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ราคารวมค่าสินค้าหลังหักโปรโมชั่น</label>
                        <div class="col-sm-8">
                            <form id="caraccessory-price-form">
                                <input type="number" class="form-control" name="caraccessory_price"
                                    id="caraccessory_price" placeholder="ราคาหลังหักโปรโมชั่น">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" id="btn-save-car-price">ยืนยันการสั่งซื้อ</button>
                </div>
            </div>
        </div>
    </div>