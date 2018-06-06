
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>

        <a href="<?=base_url("admin/car/createBrand") ?>" class="right">
            <button class="btn btn-primary" ><i class="fa fa-plus"> สร้าง</i></button>
        </a>
        
      </ol>

      <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <div class="input-group float-right">
          <input type="text" name="car_search" id="car-search" class="form-control float-right" placeholder="ชื่อยี่ห้อรถ">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-car"></i></button>
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

    
    <div class="table-responsive">
      <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-picture-o"></i> รูปยี่ห้อรถ</th>
          <th><i class="fa fa-car"></i>  ชื่อยี่ห้อรถ</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
