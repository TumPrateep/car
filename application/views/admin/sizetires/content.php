
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires") ?>">ขอบยาง</a>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresize/$rimId") ?>">ขนาดยาง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>

        <a href="<?=base_url("admin/Tires/createtiresize/$rimId") ?>" class="right">
            <button class="btn btn-primary" ><i class="fa fa-plus"> สร้าง</i></button>
        </a>
        
      </ol>

    <input type="hidden" id="rimId" name="rimId" value="<?=$rimId ?>">
  
    <div class="table-responsive">
      <table class="table table-bordered" id="tiresize-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-futbol-o"></i>  ขนาดยาง</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
    
