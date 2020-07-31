<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatormatching") ?>">น้ำมันเครื่องตามข้อมูลรถ</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>        
      </ol>

         <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
      <div class="form-row">
        <div class="col-lg-2">
          <a class="btn btn-primary create btn-block" href="<?=base_url("admin/lubricatormatching/createlubricatormatching") ?>">
            <i class="fa fa-plus">  สร้าง</i>
          </a>
        </div>
        <div class="col-lg-3 offset-md-3">
          <div class="input-group">
            <input name="lubricatorId" id="table-search" class="form-control " placeholder="ชื่อน้ำมันเครื่องตามข้อมูลรถ">
              <div class="input-group-append">
                <span class="input-group-text fa fa-rebel">
                </span>
              </div>
          </div>
        </div>
        <div class="col-lg-2 ">
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
        <div class="col-lg-2">
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
        <table class="table table-bordered" id="lubricator-table" width="100%" cellspacing="0">
          <thead>
            <th><i class="fa fa-sort"></i> ลำดับ</th>
            <th><i class="fa fa-car"></i>  ข้อมูลรถยนต์</th>
            <th><i class="fa fa-automobile"></i>  โฉมรถยนต์</th>
            <th><i class="fa fa-car"></i>  ประเภทน้ำมันเครื่อง</th>
            <th><i class="fa fa-tint"></i>  เบอร์น้ำมันเครื่อง</th>
            <th><i class="fa fa-user-circle"></i>  สถานะ</th>
            <th></th>
          </thead>	
        </table>
      </div>
    </div>

</div>
