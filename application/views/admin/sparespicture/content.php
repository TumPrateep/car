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
          <div class="form-row ">
              <div class="col-md-2">
                <a class="btn btn-primary create  btn-block" href="<?=base_url("admin/Sparespicture/createsparespicture") ?>">
                  <i class="fa fa-plus">  สร้าง</i>
                </a>
              </div>
              <div class="col-md-3 offset-md-3">
                  <div class="input-group">
                      <input id="table-search" class="form-control float-right" placeholder="รายการอะไหล่">
                      <div class="input-group-append">
                        <span class="input-group-text fa fa-list-alt"></span>
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="input-group">
                    <input id="table-searchs" class="form-control float-right" placeholder="ยี่ห้ออะไหล่">
                    <div class="input-group-append">
                        <span class="input-group-text fa fa-wrench"></span>
                      </div>
                </div>
              </div>
              <div class="col-md-2">
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
        <table class="table table-bordered" id="spares_brand-table" width="100%" cellspacing="0">
          <thead>
            <th><i class="fa fa-sort"></i>  ลำดับ</th>
            <th><i class="fa fa-picture-o"></i> รูปยี่ห้อรถ</th>
            <th><i class="fa fa-list-alt">  รายการอะไหล่</th>
            <th><i class="fa fa-wrench"></i>  ยี่ห้ออะไหล่</th>
            <th></th>
          </thead>	
        </table>
      </div>
    </div>
</div>

