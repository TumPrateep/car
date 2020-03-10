<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="<?=base_url("admin/Filter") ?>">ยี่ห้อไส้กรอง</a>
      </li>
      <li class="breadcrumb-item">
      <a href="<?=base_url("admin/Filter/filters/$filter_brandId") ?>">รุ่นไส้กรอง</a>
      </li>
      <li class="breadcrumb-item active">ค้นหา</li>        
    </ol>

    <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
          <div class="form-row">
              <div class="col-md-2">
              <a class="btn btn-primary create btn-block" href="<?=base_url("admin/Filter/createfilter/$filter_brandId") ?>">
                  <i class="fa fa-plus">  สร้าง</i>
              </a>
              </div>
              <div class="col-md-3 offset-md-3">
                  <div class="input-group">
                      <input name="lubricatorName" id="table-search" class="form-control float-right" placeholder="ชื่อรุ่นไส้กรอง">
                      <div class="input-group-append">
                        <span class="input-group-text fa fa-tint">
                        </span>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 ">
                <div class="input-group">
                  <select class="form-control" name="status" id="status" >
                    <option value>สถานะ</option>
                    <option value=1>เปิด</option>
                    <option value=2>ปิด</option>
                  </select>
                  <div class="input-group-append">
                    <span class="input-group-text fa fa-toggle-on">
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                  <div class="input-group-append">
                      <button type="submit" id="btn-search" class="btn btn-success btn-block">
                      <i class="fa fa-search"></i>  ค้นหา
                      </button>
                  </div>
              </div>
          </div>
      </form>
    </div>

  <input type="hidden" id="filter_brandId" value="<?=$filter_brandId ?>">

  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-tint"></i>  ชื่อรุ่นไส้กรอง</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
  </div>
</div>
