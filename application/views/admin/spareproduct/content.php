<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/spareproduct") ?>">ข้อมูลสินค้า</a>
        </li>
        <li class="breadcrumb-item active">อะไหล่ช่วงล่าง</li>        
      </ol>

      <!-- Example DataTables Card-->
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2  mt-4">
          <div class="input-group mb-3">
            <a class="btn btn-info btn-block" href="<?=base_url("admin/spareproduct/create") ?>">
              <i class="fa fa-plus">  สร้าง</i>
            </a>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
              <thead>
                <th>ลำดับ</th>
                <th>รูปอะไหล่</th>
                <th>รายการอะไหล่</th>
                <th>ยี่ห้ออะไหล่</th>
                <th>ข้อมูลรถ</th>
                <th>สถานะ</th>
                <th></th>
              </thead>	
            </table>
          </div>
        </div>			
      </div>