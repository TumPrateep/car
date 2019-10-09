<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=base_url("admin/tires") ?>">ขอบยาง</a>
    </li>
    <li class="breadcrumb-item active">ค้นหา</li>
  </ol>

  <!-- Example DataTables Card-->
  <div class="card-tools one">
    <form id="form-search">
        <div class="form-row">
            <div class="col-md-2">
            <a class="btn btn-primary create btn-block" href="<?=base_url("admin/tires/createrim") ?>">
                <i class="fa fa-plus">  สร้าง</i>
            </a>
            </div>
            <div class="col-md-3 offset-md-3">
                <div class="input-group-append">
                    <input id="table-search" class="form-control float-right" placeholder="ขอบยาง">
                    <button class="btn btn-info inactive"><i class="fa fa-circle-o"></i></button>
                </div>
            </div>
            <div class="col-md-2 ">
              <div class="input-group-append">
                <select class="form-control" name="status" id="status" >
                  <option value>สถานะ</option>
                  <option value=1>เปิด</option>
                  <option value=2>ปิด</option>
                </select>
                <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i>
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

  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered" id="tires-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-circle-o"></i> ขอบยาง</th>
          <th><i class="fa fa-user-circle"></i> สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
  </div>
</div>

