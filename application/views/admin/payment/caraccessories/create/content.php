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
        <li class="breadcrumb-item active">สร้าง</li>
    </ol>

    <!-- Example DataTables Card-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 offset-md-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="วันที่เริ่ม" id="start_date">
                    <div class="input-group-append">
                        <i class="input-group-text fa fa-calendar-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="วันที่สิ้นสุด" id="end_date">
                    <div class="input-group-append">
                        <i class="input-group-text fa fa-calendar-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button type="button" id="search" class="btn btn-info btn-block"><i class="fa fa-search"></i> ค้นหา</i>
                </button>
            </div>
        </div>
        <form id="form">
            <div class="row">
                <input type="hidden" name="userId" id="userId" value="<?=$userId?>">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <strong>บัญชีผู้รับ</strong>
                            <span id="txt-bank"><strong>เลขที่บีญชี</strong> - <strong>ธนาคาร</strong> -
                                <strong>ชื่อเจ้าของบัญชี</strong> - </span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>หลักฐาน</label><span class="error">*</span>
                                <div class="image-editor">
                                    <input type="file" class="cropit-image-input" name="tempImage" required>
                                    <div class="cropit-preview"></div>
                                    <div class="image-size-label">
                                        ปรับขนาด
                                    </div>
                                    <input type="range" class="cropit-image-zoom-input">
                                    <input type="hidden" name="file_path" class="hidden-image-data" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>ชื่อบัญชีผู้โอน</label><span class="error">*</span>
                                <input type="text" class="form-control" name="transfer_name" id="transfer_name"
                                    placeholder="ชื่อบัญชีผู้โอน">
                            </div>
                            <div class="form-group">
                                <label>วันที่โอนเงิน</label><span class="error">*</span>
                                <input type="text" class="form-control" name="transfer_time" id="transfer_time"
                                    placeholder="วันที่โอนเงิน">
                            </div>
                            <div class="form-group">
                                <label>เวลาที่โอนเงิน</label><span class="error">*</span>
                                <input type="text" class="form-control" name="time" id="time"
                                    placeholder="เวลาที่โอนเงิน">
                            </div>
                            <div class="form-group">
                                <label>จำนวนเงิน</label><span class="error">*</span>
                                <input type="number" class="form-control" name="transfer_price" placeholder="จำนวนเงิน">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
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