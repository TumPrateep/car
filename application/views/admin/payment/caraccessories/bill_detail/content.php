<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/payment/caraccessories")?>">การจ่ายเงิน</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/payment/caraccessories_detail/" . $userId)?>">รายการสั่งซื้อ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/payment/caraccessories_bill/" . $userId)?>">รายการบิลจ่ายเงิน</a>
        </li>
        <li class="breadcrumb-item active">รายละเอียด</li>
    </ol>

    <!-- Example DataTables Card-->

    <div class="container-fluid">
        <form id="form">
            <div class="row">
                <input type="hidden" name="userId" id="userId" value="<?=$userId?>">
                <input type="hidden" name="billId" id="billId" value="<?=$billId?>">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" width="10%">คำสั่งซื้อ</th>
                                <th scope="col">รายการ</th>
                                <th scope="col" width="10%">จำนวน</th>
                                <th scope="col" width="20%">ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody id="tbl-order"></tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="" id="file_path" width="100%">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>ชื่อบัญชีผู้โอน</label><span class="error">*</span>
                                <input type="text" class="form-control" name="transfer_name" id="transfer_name"
                                    placeholder="ชื่อบัญชีผู้โอน" disabled>
                            </div>
                            <div class="form-group">
                                <label>วันที่โอนเงิน</label><span class="error">*</span>
                                <input type="text" class="form-control" name="transfer_time" id="transfer_time"
                                    placeholder="วันที่โอนเงิน" disabled>
                            </div>
                            <div class="form-group">
                                <label>เวลาที่โอนเงิน</label><span class="error">*</span>
                                <input type="text" class="form-control" name="time" id="time"
                                    placeholder="เวลาที่โอนเงิน" disabled>
                            </div>
                            <div class="form-group">
                                <label>จำนวนเงิน</label><span class="error">*</span>
                                <input type="number" class="form-control" name="transfer_price" id="transfer_price"
                                    placeholder="จำนวนเงิน" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </form>
    </div>

    <div id="slipModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" id="slipImage" class="img-responsive" width="100%">
                </div>
            </div>
        </div>
    </div>