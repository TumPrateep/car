
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?=base_url("admin/car/model/$brandId") ?>">รุ่นรถ</a>
    </li>
    <li class="breadcrumb-item active">ค้นหา</li>
  </ol>

  <!-- Example DataTables Card-->      
  <!-- <div class="form-group"> -->
    <div class="card-tools">
      <div class="img-resize" >
          <span id="brandPicture"></span>
          <h3 class="car-img" id="brandName"></h3>
      </div>
    </div>
  <!-- </div> -->

  <div class="card-tools one">
    <form id="form-search">
    <div class="form-row">
      <div class="col-lg-2">
        <a class="btn btn-primary create btn-block" href="<?=base_url("admin/car/createmodel/$brandId") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>
      </div>
      <div class="col-lg-2 offset-md-2">
        <div class="input-group-append">
          <input id="table-search" class="form-control float-right" placeholder="ชื่อรุ่นรถ">
          <button class="btn btn-info inactive"><i class="fa fa-car"></i></button>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="input-group-append">
          <input type="number" class="form-control float-right" id="year" placeholder="ปีที่ผลิต">
          <button class="btn btn-info inactive"><i class="fa fa-calendar-check-o"></i></button>
        </div>
      </div>
      <div class="col-lg-2 ">
        <div class="input-group-append">
          <select class="form-control" name="status" id="status" >
            <option value>สถานะ</option>
            <option value=1>เปิด</option>
            <option value=2>ปิด</option>
          </select>
            <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i>
            </button>
          </div>
      </div>
      <div class="col-lg-2">
        <div class="input-group-append">
          <button type="submit" id="btn-search" class="btn btn-success btn-block">
            <i class="fa fa-search"></i>  ค้นหา
          </button>
        </div>
      </div>
    </div>
    </form>
  </div>

  <input type="hidden" id="brandId" value="<?=$brandId ?>">

  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-car"></i>  ชื่อรุ่น</th>
          <th><i class="fa fa-car"></i>  รายละเอียด</th>
          <th><i class="fa fa-calendar-check-o"></i>  ปีที่ผลิต</th>
          <th><i class="fa fa-car"></i> ประเภทรถ</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
  </div>
</div>
