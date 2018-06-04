 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar") ?>">รายการอะไหล่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->
        
    <div class="card-tools">
        <div class="input-group input-group-sm float-right" >
          <a href="<?=base_url("admin/sparepartcar/createtypespare") ?>">
            <button class="btn btn-success"><i class="fa fa-plus">  สร้าง</i></button>
          </a>
        </div>
    </div>

    <div class="card-tools one">
      <form>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <div class="input-group float-right">
          <input type="text" name="spareparts_search" id="spareparts-search" class="form-control float-right" placeholder="ชื่อรายการอะไหล่">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-cog"></i></button>
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

    <input type="hidden" id="brandId" value="<?=$id ?>">
    <div class="table-responsive">
      <table class="table table-bordered" id="spares_undercarriage-table" width="100%" cellspacing="0">
        <thead>
          <th>ลำดับ</th>
          <th><i class="fa fa-cog"></i>  รายการอะไหล่</th>
          <th><i class="fa fa-user-circle"></i>  สถานะอะไหล่</th>
          <th></th>
        </thead>	
      </table>
    </div>
