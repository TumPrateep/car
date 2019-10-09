<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/spareundercarriesdata") ?>">อะไหล่ช่วงล่างตามข้อมูลรถ</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>        
      </ol>

         <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
      <div class="form-row">
        <div class="col-lg-2">
          <a class="btn btn-primary create btn-block" href="<?=base_url("admin/spareundercarriesdata/createspareundercarriesdata") ?>">
            <i class="fa fa-plus">  สร้าง</i>
          </a>
        </div>
        <div class="col-lg-3">
          <div class="input-group-append">
              <select class="form-control form-control-chosen-required" id="spares_undercarriageId" name="spares_undercarriageId" data-placeholder="รายการอะไหล่ช่วงล่าง">
              </select>
              <button class="btn btn-info inactive"><i class="fa fa-cog"></i>
              </button>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-group-append">
              <select class="form-control form-control-chosen-required" id="brandId" name="brandId" data-placeholder="ยี่ห้อรถ">
              </select>
              <button class="btn btn-info inactive"><i class="fa fa-wrench"></i>
              </button>
          </div>
        </div>

        <div class="col-lg-2 ">
          <div class="input-group-append">
            <select class="form-control form-control-chosen-required" name="status" id="status" data-placeholder="สถานะ" >
              <option value>สถานะ</option>  
              <option value=1>เปิด</option>
              <option value=2>ปิด</option>
            </select>
              <button class="btn btn-info inactive"><i class="fa fa-user-circle"></i>
              </button>
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
        <table class="table table-bordered" id="sparematching-table" width="100%" cellspacing="0">
          <thead>
            <th><i class="fa fa-sort"></i> ลำดับ</th>
            <th><i class="fa fa-car"></i>  ยี่ห้อรถ</th>
            <th><i class="fa fa-car"></i>  รายละเอียดรถ</th>
            <th><i class="fa fa-cogs"></i>  รายการอะไหล่</th>
            <th><i class="fa fa-user-circle"></i>  สถานะ</th>
            <th></th>
          </thead>	
        </table>
      </div>
    </div>

</div>
