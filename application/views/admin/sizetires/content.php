
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires") ?>">ขอบยาง</a>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/Tires/tiresize/$rimId") ?>">ขนาดยาง</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/Tires/createtiresize/$rimId") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
        <input type="hidden" name="rimId" id="rimId" value="<?=$rimId?>">
          <input id="table-search" class="form-control float-right" placeholder="ขนาดยาง">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-arrows"></i></button>
          </div>
          <select class="form-control" id="status"  name="status">
            <option value>สถานะ</option>
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
      <table class="table table-bordered" id="tiresize-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-arrows"></i>  ขนาดยาง</th>
          <th><i class="fa fa-user-circle"></i>  สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>
    
