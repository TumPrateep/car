	
	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/usermanagement") ?>">ข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->   

    <div class="card-tools one">
      <form id="form-search">
        <a class="btn btn-primary create" href="<?=base_url("admin/usermanagement/createUser") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>
        <div class="input-group float-right">
          <input type="text" name="table-search" id="table-search" class="form-control float-right" placeholder="ชื่อผู้ใช้งาน">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-address-book"></i></button>
          </div>

          <input type="text" name="typeuser_search" id="typeuser-search" class="form-control float-right" placeholder="ประเภทผู้ใช้งาน">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-users"></i></button>
          </div>

          <select class="form-control" name="status" id="status" >
            <option>สถานะ</option>
            <option>เปิด</option>
            <option>ปิด</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-info inactive">
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
      <table class="table table-bordered" id="user-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-address-book"></i>  ชื่อผู้ใช้งาน</th>
          <th><i class="fa fa-phone"></i> เบอร์โทรศัพท์</th>
          <th><i class="fa fa-users">  ประเภทผู้ใช้งาน</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>