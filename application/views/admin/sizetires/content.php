
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires") ?>">ขอบยาง</a>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresize/$rimId") ?>">ขนาดยาง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>

        <a href="<?=base_url("admin/Tires/createtiresize") ?>" class="right">
            <button class="btn btn-primary" ><i class="fa fa-plus"> สร้าง</i></button>
        </a>
        
      </ol>

      <!-- Example DataTables Card-->
      <div class="table-responsive">
      <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
        <thead>
          <th>ลำดับ</th>
          <th>ขนาดยาง</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
    
