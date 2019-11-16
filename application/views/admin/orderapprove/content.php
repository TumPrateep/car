
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tirechange") ?>">ยืนยันการจอง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

     
     <!-- Example DataTables Card-->


    <!-- <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
            <thead>
              <th><i class="fa fa-sort"></i>  ลำดับ</th>
              <th><i class="fa fa-toggle-left"></i>  หมายเลขสั่งซื่อ</th>
              <th><i class="fa fa-toggle-right"></i>  ผู้ส่ง</th>
              <th><i class="fa fa-circle-o"></i>  สถานะของอู่</th>
              <th><i class="fa fa-user-circle"></i>  สถานะการชำระเงิน</th>
              <th><i class="fa fa-user-circle"></i>  สถานะการสั่งซื้อ</th>
              <th></th>
            </thead>	
          </table>
        </div>
      </div>
    </div> -->

    <div class="container-fluid">
      <div class="row">
            <div class="col-lg-3 offset-lg-1  mt-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="วันที่" id="date">
                    <div class="input-group-append">
                        <span class="input-group-text fa fa-calendar"></span>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3  mt-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ผู้จอง" id="reservename">
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-user-circle-o"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="สถานะ" id="status">
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-toggle-on"></span>
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
                  <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
                    <thead>
                      <th><i class="fa fa-sort"></i>  ลำดับ</th>
                      <th><i class="fa fa-toggle-left"></i>  หมายเลขสั่งซื่อ</th>
                      <th><i class="fa fa-toggle-right"></i>  ผู้ส่ง</th>
                      <th><i class="fa fa-circle-o"></i>   สถานะการชำระเงิน</th>
                      <th><i class="fa fa-user-circle"></i> สถานะของอู่</th>
                      <!-- <th><i class="fa fa-user-circle"></i>  สถานะการสั่งซื้อ</th> -->
                      <th></th>
                    </thead>	
                  </table>
                </div>
              </div>
            </div>
      	</div>		
      </div>
      
       <!-- End PAge Content -->
  </div> 

  
