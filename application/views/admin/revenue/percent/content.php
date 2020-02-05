<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/revenue/percent")?>">เปอร์เซ็นต์กําไร</a>
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
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-8">
                    <div class="input-group mb-3">
                        <select class="form-control" name="year" id="year">
                            <option value="">เลือกปี</option>
                        </select>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-info btn-block" id="search"><i class="fa fa-search"></i>
                        ค้นหา</i></button>
                </div>
            </div><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-info mb-3">
                            <div class="card-header">
                                <strong>จำนวนรายการสั่งซื้อ</strong>
                            </div>
                            <div class="card-body">
                                <span id="txt-number"></span> รายการ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-info mb-3">
                            <div class="card-header">
                                <strong>ยอดขายรวม</strong>
                            </div>
                            <div class="card-body">
                                <span id="txt-price"></span> บาท
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning mb-3">
                            <div class="card-header">
                                <strong>กำไรรวม</strong>
                            </div>
                            <div class="card-body">
                                <strong><span class="badge badge-warning">+<span id="txt-profit"></span></span>
                                    บาท <small class="badge badge-info">(<span
                                            id="txt-profit-percent">0</span>%)</small></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="line-profit"></canvas>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>