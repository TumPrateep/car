
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=base_url("admin/garagesmanagement") ?>">การจัดการผู้ให้บริการ</a>
    </li>
    <li class="breadcrumb-item active">ค้นหา</li>        
  </ol>

  <!-- Example DataTables Card-->
  <div class="card-tools one">
      <form id="form-search">
          <div class="form-row">
              <div class="col-md-3 offset-md-5">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="ชื่อร้านผู้ให้บริการ" id="table-search">
                    <div class="input-group-append">
                      <span class="input-group-text fa fa-cogs"></span>
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
                        <span class="input-group-text fa fa-toggle-on"></span>
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

  <div class="table-responsive">
    <table class="table table-bordered" id="shop-table" width="100%" cellspacing="0" style=margin-top:12>
      <thead>
        <th><i class="fa fa-sort"></i> ลำดับ</th>
        <th><i class="fa fa-picture-o"></i> รูป</th>
        <th><i class="fa fa-home"></i> ชื่อร้านผู้ให้บริการ</th>
        <th><i class="fa fa-phone"></i>  เบอร์โทรศัพท์</th>
        <th></th>
      </thead>	
    </table>
  </div>
</div>

