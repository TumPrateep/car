
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/tires/createtirechange") ?>">ราคาเปลี่ยนยางนอก</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <!-- Example DataTables Card-->

    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/Tires/createtirechange") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input id="table-search" class="form-control float-right" placeholder="ขอบยาง">
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

    <input type="hidden" id="rimId" value="<?=$rimId ?>">
  
    <!-- <div class="table-responsive">
      <table class="table table-bordered" id="tires-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i> ลำดับ</th>
          <th><i class="fa fa-circle-o"></i> ขอบยาง</th>
          <th><i class="fa fa-user-circle"></i> สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div> -->
