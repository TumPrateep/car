
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/paymentapprove") ?>">ยืนยันค่ามัดจำ</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>        
      </ol>

      <!-- Example DataTables Card-->
    
    <div class="container-fluid">
      <div class="row">
            <div class="col-lg-3 offset-lg-1  mt-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="วันที่" id="date">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3  mt-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ผู้จอง" id="reservename">
                        <div class="input-group-append">
                            <span class="input-group-text"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="สถานะ" id="status">
                        <div class="input-group-append">
                            <span class="input-group-text"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-info btn-block"><i class="fa fa-search"></i>  ค้นหา</i></button>
                </div>
            </div>
        
            <div class="row">
              <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                  <thead>
                    <th>ลำดับ</th>
                    <th>หมายเลขการสั่งซื้อ</th>
                    <th>ผู้สั่ง</th>
                    <th>เงินมัดจำ</th>
                    <th>เงินที่จ่าย</th>
                    <th>ดูสลิป</th>
                    <th></th>
                  </thead>	
                </table>
              </div>
            </div>
      	</div>		
      </div>