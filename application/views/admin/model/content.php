
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
        
    <div class="card-tools">

        <div class="input-group input-group-sm" >
          <span id="brandPicture"></span>
          <h3 class="car-img" id="brandName"></h3>
        </div>
        <div class="input-group float-right" >
          <a href="<?=base_url("admin/car/createModel/$brandId") ?>">
            <button class="btn btn-success"><i class="fa fa-plus">สร้าง</i></button>
          </a>
        </div>
    </div>

    <div class="card-tools one">
      <form>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <div class="input-group float-right">
          <input type="text" name="model_search" id="model-search" class="form-control float-right" placeholder="ชื่อรุ่นรถ">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-car"></i></button>
          </div>

          <input type="text" name="year_search" id="year-search" class="form-control float-right" placeholder="ปีที่ผลิต">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-calendar-check-o"></i></button>
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
          </div>`

        </div>
      </form>
    </div>

    <input type="hidden" id="brandId" value="<?=$brandId ?>">
  
    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th>ลำดับ</th>
          <th><i class="fa fa-car"></i>  ชื่อรุ่น</th>
          <th><i class="fa fa-calendar-check-o"></i>  ปีที่ผลิต</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
