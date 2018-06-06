 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("/admin/sparepartcar") ?>">รายการอะไหล่</a>
        </li>
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/sparepartcar/sparepart/$spares_undercarriageId") ?>">ยี่ห้ออะไหล่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->

      <input type="hidden" id="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">

    <div class="card-tools one">
      <form>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <a class="btn btn-primary create" href="<?=base_url("admin/sparepartcar/createspare/$spares_undercarriageId") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input type="text" name="spareparts_search" id="spareparts-search" class="form-control float-right" placeholder="ชื่อยี่ห้ออะไหล่">
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
  
    <div class="table-responsive">
      <table class="table table-bordered" id="spares_brand-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>ลำดับ</th>
          <th><i class="fa fa-cog">  ชื่อยี่ห้ออะไหล่</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
