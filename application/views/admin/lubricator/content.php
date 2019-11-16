<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricator") ?>">ยี่ห้อน้ำมันเครื่อง</a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricator/lubricators/$lubricator_brandId") ?>">น้ำมันเครื่อง</a>
      </li>
      <li class="breadcrumb-item active">ค้นหา</li>        
    </ol>

    <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
          <div class="form-row">
              <div class="col-md-2">
              <a class="btn btn-primary create btn-block" href="<?=base_url("admin/lubricator/createlubricator/$lubricator_brandId") ?>">
                  <i class="fa fa-plus">  สร้าง</i>
              </a>
              </div>
              <div class="col-md-3 offset-md-3">
                  <div class="input-group">
                      <input name="lubricatorName" id="table-search" class="form-control float-right" placeholder="ชื่อน้ำมันเครื่อง">
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

  <input type="hidden" id="lubricator_brandId" value="<?=$lubricator_brandId ?>">

  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-tint"></i>  ชื่อรุ่นน้ำมันเครื่อง</th>
          <th><i class="fa fa-safari"></i>  ชื่อเบอร์น้ำมันเครื่อง(SAE)</th>
          <th><i class="fa fa-tint"></i>  API</th>
          <th><i class="fa fa-tint"></i>  ความจุ</th>
          <th><i class="fa fa-tint"></i>  ประเภทเครื่องยนต์</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
  </div>
</div>
