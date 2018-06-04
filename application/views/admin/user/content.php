	
	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/usermanagement") ?>">ข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->
        
    <div class="card-tools">
        <div class="input-group float-right">
          <a href="<?=base_url("admin/usermanagement/createUser") ?>">
            <button class="btn btn-success"><i class="fa fa-plus"> สร้าง</i></button>
          </a>
        </div>
    </div>

    <div class="card-tools one">
      <form>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <div class="input-group float-right">
          <input type="text" name="nameuser_search" id="nameuser-search" class="form-control float-right" placeholder="ชื่อผู้ใช้งาน">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-address-book"></i></button>
          </div>

          <input type="text" name="typeuser_search" id="typeuser-search" class="form-control float-right" placeholder="ประเภทผู้ใช้งาน">
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-info"><i class="fa fa-users"></i></button>
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
      <table class="table table-bordered" id="user-table" width="100%" cellspacing="0">
        <thead>
          <th>ลำดับ</th>
          <th><i class="fa fa-address-book"></i>  ชื่อผู้ใช้งาน</th>
          <th>เบอร์โทรศัพท์</th>
          <th><i class="fa fa-users">  ประเภทผู้ใช้งาน</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>