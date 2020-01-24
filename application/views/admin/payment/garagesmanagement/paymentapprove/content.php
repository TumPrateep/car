<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/paymentapprove ") ?>">ยืนยันการจ่ายเงิน</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>

    <!-- Example DataTables Card-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3  mt-8 offset-md-7" >
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ผู้จอง" id="orderId">
                    <div class="input-group-append">
                        <span class="input-group-text fa fa-user-circle-o"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button type="button" id="OK" class="btn btn-info btn-block"><i class="fa fa-search"></i> ค้นหา</i>
                </button>
            </div>
        </div>
        <from></from>
        <div class="row">
          <input type="hidden" name="garageId" id="garageId" value="<?=$garageId?>">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                        <thead>
                            <th>ลำดับ</th>
                            <th>หมายเลขการสั่งซื้อ</th>
                            <th>เงินทั้งหมด</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="slipModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" id="slipImage" class="img-responsive" width="100%">
                </div>
            </div>
        </div>
    </div>