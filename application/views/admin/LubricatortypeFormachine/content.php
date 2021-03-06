
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricatortypeformachine") ?>">การจัดการประเภทน้ำมันเครื่องตามเครื่องยนต์</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      
      <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/lubricatortypeformachine/createlubricatortypeformachine") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <div class="input-group float-right">
          <input name="lubricatortypeFormachine" id="table-search" class="form-control float-right" placeholder="ชื่อยี่ห้อน้ำมันเครื่องตามเครื่องยนต์">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-cogs"></i></button>
          </div>

          <select class="form-control" name="status" id="status" >
            <option value>สถานะ</option>
            <option value=1>เปิด</option>
            <option value=2>ปิด</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i>
            </button>
          </div>
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-success">
              <i class="fa fa-search"></i>  ค้นหา
            </button>
          </div>

        </div>
      </form>
    </div>

    
    <div class="table-responsive">
      <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-cogs"></i>  ชื่อยี่ห้อน้ำมันเครื่องตามเครื่องยนต์</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>