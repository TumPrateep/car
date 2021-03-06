
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/partstable") ?>">ตารางการเช็คระยะ</a>
        </li>
        <li class="breadcrumb-item active">ระยะในการเช็ค</li>
      </ol>

      <!-- Example DataTables Card-->

    <div class="card-tools one">
      <form id="form-search">
        <input type="hidden" name="parts_table_id" id="parts_table_id" value="<?=$parts_table_id?>">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/partstable/createlists/".$parts_table_id) ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input id="table-search" class="form-control float-right" placeholder="ระยะในการเช็ค">
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
          <th><i class="fa fa-toggle-left"></i>  ระยะในการเช็ค</th>
          <th>สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>

  
