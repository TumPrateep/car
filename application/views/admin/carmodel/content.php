
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/model/$brandId") ?>">รุ่นรถ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/carmodel/$brandId/$modelId") ?>">โมเดลรถ</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->      
    <!-- <div class="card-tools">
      <div class="img-resize" >
        <span id="brandPicture"></span>
        <h3 class="car-img" id="brandName"></h3>
      </div>
    </div> -->

    <div class="card-tools one">
      <form id="form-search">
        <input type="hidden" name="brandId" value="<?=$brandId ?>">
        <input type="hidden" name="modelId" value="<?=$modelId ?>">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/car/createCarModel/$brandId/$modelId") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input id="table-search" class="form-control float-right" placeholder="ชื่อโมเดลรถ">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-car"></i></button>
          </div>

          <select class="form-control" name="status" id="status" >
            <option value>สถานะ</option>
            <option value="1">เปิด</option>
            <option value="2">ปิด</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i></button>
          </div>

          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-success">
              <i class="fa fa-search"></i>  ค้นหา
            </button>
          </div>`

        </div>
      </form>
    </div>

    <input type="hidden" id="brandId" value="<?=$brandId ?>">
  
    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-car"></i>  ชื่อรุ่น</th>
          <th><i class="fa fa-calendar-check-o"></i>  ปีที่ผลิต</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
