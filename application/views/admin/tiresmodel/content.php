
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresbrand/") ?>">ยี่ห้อยาง</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresmodel/") ?>">รุ่นยาง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>
      <!-- Example DataTables Card-->
    <div class="card-tools one">

        <div class="input-group input-group-sm" >
          <span id="tire_brandPicture"></span>
          <h3 class="car-img" id="tire_brandName"></h3>
        </div>

      <form>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <a class="btn btn-primary create" href="<?=base_url("admin/tires/createtiresmodel/$tire_brandId") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input type="text" name="car_search" id="car-search" class="form-control float-right" placeholder="ชื่อรุ่นยางรถ">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-eercast"></i></i></button>
          </div>
          <select class="form-control" name="status" id="status" ><option>สถานะ</option></select>
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info">
              <i class="fa fa-user-circle"></i>
            </button>
          </div>
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-success">
              <i class="fa fa-search"></i>  ค้นหา
            </button>
          </div>
        </div>
      </form>
    </div>
    
    <input type="hidden" id="tire_brandId" value="<?=$tire_brandId?>">

    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-eercast"></i>  ชื่อรุ่นยางรถ</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
