<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?=base_url("admin/paymentapprove")?>">จัดการการสั่งสินค้า</a>
            </li>
            <li class="breadcrumb-item active">ค้นหา</li>
        </ol>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->

        <!-- Start Page Content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-between">

                    <div class="col-lg-3 offset-lg-4 mt-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="spa" placeholder="หมายเลขสั่งซื้อ">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-8">
                        <div class="input-group mb-3">
                            <select class="form-control" name="status" id="status">
                                <option value="">เลือกสถานะ</option>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-info btn-block" id="search"><i class="fa fa-search"></i>
                            ค้นหา</i></button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
                                <thead>
                                    <th>ลำดับ</th>
                                    <th>รูป</th>
                                    <th>รายละเอียดสินค้า</th>
                                    <th>จำนวน</th>
                                    <th>สถานะ</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->