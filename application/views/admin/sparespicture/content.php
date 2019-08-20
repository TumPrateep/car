 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/sparepartcar/sparepart") ?>">ยี่ห้ออะไหล่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

    <div class="card-tools one">
      <form id="form-search">
        <span class="left"></span>
        <a class="btn btn-primary create" href="<?=base_url("admin/Sparespicture/createsparespicture") ?>">
          <i class="fa fa-plus">  สร้าง</i>
        </a>

        <div class="input-group float-right">
          <input id="table-search" class="form-control float-right" placeholder="รายการอะไหล่">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-cog"></i></button>
          </div>
          <!-- <select class="form-control" name="status" id="status" >
            <option value>สถานะ</option>
            <option value =1>เปิด</option>
            <option value =2>ปิด</option>
          </select> -->
          <input id="table-searchs" class="form-control float-right" placeholder="ยี่ห้ออะไหล่">
          <div class="input-group-append">
            <button class="btn btn-info inactive"><i class="fa fa-wrench"></i></button>
          </div>
          <div class="input-group-append">
            <button type="submit" id="btn-search" class="btn btn-success"><i class="fa fa-search"></i>  ค้นหา</button>
          </div>`

        </div>
      </form>
    </div>
  
    <div class="table-responsive">
      <table class="table table-bordered" id="spares_brand-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-picture-o"></i> รูปยี่ห้อรถ</th>
          <th><i class="fa fa-cog">  รายการอะไหล่</th>
          <th><i class="fa fa-wrench"></i>  ยี่ห้ออะไหล่</th>
          <th></th>
        </thead>	
      </table>
    </div>
