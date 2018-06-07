 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar") ?>">รายการอะไหล่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->

    <div class="card-tools one">
      <form id="form-search">
        <a class="btn btn-primary create" href="<?=base_url("admin/sparepartcar/createtypespare") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>
        <div class="input-group float-right">
          <input id="table-search" class="form-control float-right" placeholder="ชื่อรายการอะไหล่">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info inactive"><i class="fa fa-cog"></i></button>
          </div>

          <select class="form-control" >
            <option>สถานะ</option>
            <option>เปิด</option>
            <option>ปิด</option>
          </select>
          <div class="input-group-append">
            <button id="btn-search" class="btn btn-info inactive"><i class="fa fa-user-circle"></i></button>
          </div>
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-success"><i class="fa fa-search"></i>  ค้นหา</button>
          </div>`
        </div>
      </form>
    </div>

    <input type="hidden" id="brandId" value="<?=$id ?>">
    <div class="table-responsive">
      <table class="table table-bordered" id="spares_undercarriage-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-cog"></i>  รายการอะไหล่</th>
          <th><i class="fa fa-user-circle"></i>  สถานะอะไหล่</th>
          <th></th>
        </thead>	
      </table>
    </div>
