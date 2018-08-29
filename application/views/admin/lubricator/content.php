<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Lubricator") ?>">ยี่ห้อน้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Lubricator/lubricators/$lubricator_brandId") ?>">น้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>        
      </ol>

      <!-- Example DataTables Card-->
    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/Lubricator/createlubricator/$lubricator_brandId") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>
        <!-- <div class="input-group input-group-sm float-right"> -->
        <div class="input-group float-right">
          <input name="lubricatorName" id="table-search" class="form-control float-right" placeholder="ชื่อน้ำมันเครื่อง">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-tint"></i></button>
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

    <input type="hidden" id="lubricator_brandId" value="<?=$lubricator_brandId ?>">

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
