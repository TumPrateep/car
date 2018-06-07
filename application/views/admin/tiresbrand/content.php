
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/tiresbrand") ?>">ยี่ห้อยาง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/tires/createtiresbrand/") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input id="table-search" class="form-control float-right" placeholder="ชื่อยี่ห้อยางรถ">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-futbol-o"></i></button>
          </div>
          <select class="form-control" >
            <option>สถานะ</option>
            <option>เปิด</option>
            <option>ปิด</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i></button>
          </div>
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-success"><i class="fa fa-search"></i>  ค้นหา</button>
          </div>
        </div>
      </form>
    </div>

    <input type="hidden" id="tire_brandId" value="<?=$tire_brandId ?>">
  
    <div class="table-responsive">
      <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-picture-o"></i>  รูปยี่ห้อ</th>
          <th><i class="fa fa-futbol-o"></i>  ชื่อยี่ห้อยางรถ</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>