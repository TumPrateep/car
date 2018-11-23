
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Charge/SpareCharge") ?>">ราคาเปลี่ยนอะไหล่ช่วงล่าง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->

    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/Charge/createSpareCharge") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <select class="form-control" name="spares_undercarriageId" id="spares_undercarriageId">
              <option value="">เลือกรายการอะไหล่ช่วงล่าง</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-circle-o"></i></button>
          </div>
          <select class="form-control" id="status" name="status" >
            <option value >สถานะ</option>
            <option value=1>เปิด</option>
            <option value=2>ปิด</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i></button>
          </div>
          <div class="input-group-append">
            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>  ค้นหา</button>
          </div>
        </div>
      </form>
    </div>

     <div class="table-responsive">
      <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-toggle-left"></i>  ราคาเปลี่ยนอะไหล่ช่วงล่าง</th>
          <th><i class="fa fa-toggle-right"></i>  ค่าบริการ</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>

  
