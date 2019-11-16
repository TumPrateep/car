
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/charge/tireservice") ?>">ราคาค่าขนส่งยางรถยนต์</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->

    <div class="card-tools one">
      <form id="form-search">
        <div class="row justify-content-between">
          <div class="col-md-2">
            <a class="btn btn-primary btn-block create" href="<?=base_url("admin/charge/createtireservice") ?>">
              <i class="fa fa-plus">  สร้าง</i>
            </a>
          </div>
          <div class="col-md-5">
            <div class="input-group">
              <input id="table-search" class="form-control float-right" placeholder="ขอบยาง">
              <div class="input-group-append">
              <span class="input-group-text fa fa-circle-o"></span>
              </div>
              <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>  ค้นหา</button>
              </div>
            </div>
          </div>
        </div>
       
      </form>
    </div>

     <div class="table-responsive">
      <table class="table table-bordered" id="service-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-circle-o"></i>  ขอบยาง</th>
          <th><i class="fa fa-usd" ></i>  ราคาค่าจัดส่ง</th>
          <!-- <th><i class="fa fa-user-circle"></i>  สถานะ</th> -->
          <th></th>
        </thead>	
      </table>
    </div>

  
