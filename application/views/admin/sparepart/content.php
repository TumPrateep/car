 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("/admin/sparepartcar") ?>">รายการอะไหล่</a>
        </li>
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar/sparepart/$spares_undercarriageId") ?>">ยี่ห้ออะไหล่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->

      <input type="hidden" id="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
        
    <div class="card-tools">
        <div class="input-group input-group-sm float-right" >
          <a href="<?=base_url("admin/sparepartcar/createspare/$spares_undercarriageId") ?>">
            <button class="btn btn-success"><i class="fa fa-plus">สร้าง</i></button>
          </a>
          <input type="text" name="table_search" id="table-search" class="form-control float-right" placeholder="ค้นหา">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-search"></i></button>
          </div>
        </div>
    </div>


  
    
    
    <div class="table-responsive">
      <table class="table table-bordered" id="spares_brand-table" width="100%" cellspacing="0">
        <thead>
          <th>ลำดับ</th>
          <th>ชื่อยี่ห้ออะไหล่</th>
          <th>สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
