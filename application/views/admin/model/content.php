
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">ยี่ห้อรถ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">รุ่น</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->
        
    <div class="card-tools">
        <div class="input-group input-group-sm float-right" style="width: 300px; padding: 2px;">
          <a href="<?=base_url("car/year") ?>"><button class="btn btn-success"><i class="fa fa-plus"> Create</i></button></a>
          <input type="text" name="table_search" id="table-search" class="form-control float-right" placeholder="Search">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-search"></i></button>
          </div>
        </div>
    </div>

    <input type="hidden" id="brandId" value="<?=$id ?>">
  
    
    
    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th>ลำดับ</th>
          <th>ชื่อยี่ห้อรถ</th>
          <th></th>
        </thead>	
      </table>
    </div>
