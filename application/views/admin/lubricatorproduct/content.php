
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatorproduct") ?>">ข้อมูลสินค้า</a>
        </li>
        <li class="breadcrumb-item active">น้ำมันเครื่อง</li>        
      </ol>

      <!-- Example DataTables Card-->
    
    <div class="container-fluid">
      <div class="row">
            <div class="col-lg-2  mt-4">
                <div class="input-group mb-3">
                  <a class="btn btn-info btn-block" href="<?=base_url("admin/lubricatorproduct/create") ?>">
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
                    <th>รูปน้ำมันเครื่อง</th>
                    <th>ยี่ห้อน้ำมันเครื่อง</th>
                    <th>รุ่นนน้ำมันเครื่อง</th>
                    <th>ชนิดมันเครื่อง</th>
                    <th>สถานะ</th>
                    <th></th>
                  </thead>	
                </table>
              </div>
            </div>
      			
      </div>