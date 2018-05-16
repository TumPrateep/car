 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("car") ?>">ยี่ห้ออะไหล่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->
        
    <div class="card-tools">

        <div class="input-group input-group-sm" >
          <img src="https://image.freepik.com/free-vector/workplace-background-with-laptop_1284-1119.jpg" class="rounded float-left" alt="">
          <h3 class="car-img">ชื่อยี่ห้อ</h3>
        </div>
        <div class="input-group input-group-sm float-right" >
          <a href="<?=base_url("sparepartcar/createspartcar") ?>"><button class="btn btn-success"><i class="fa fa-plus">สร้าง</i></button></a>
          <input type="text" name="table_search" id="table-search" class="form-control float-right" placeholder="ค้นหา">
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
          <th>ชื่อรุ่น</th>
          <th></th>
        </thead>	
      </table>
    </div>