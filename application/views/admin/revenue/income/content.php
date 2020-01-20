<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/revenue/graph")?>">รายได้แต่ละเดือน</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-between">

                <div class="col-lg-3 offset-lg-4 mt-8">
                    <div class="input-group mb-3">
                        <select class="form-control" name="month" id="month">
                            <option value="">เลือกเดือน</option>
                        </select>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-8">
                    <div class="input-group mb-3">
                        <select class="form-control" name="year" id="year">
                            <option value="">เลือกปี</option>
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
                                <th>หมายเลขคำสั่งซื้อ</th>
                                <th>ราคาขาย</th>
                                <th>ราคาร้านค้าส่ง</th>
                                <th>ค่าบริการ</th>
                                <th>ค่าถอดใส่</th>
                                <th>ค่าจัดส่ง</th>
                                <th>กำไร</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>