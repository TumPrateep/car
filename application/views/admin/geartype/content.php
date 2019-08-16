<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/geartype") ?>">ประเภทเกียร์</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>

    <div class="container-fluid">
      <form id="form-search">
        <div class="row mb-10">
            <div class="col-lg-2">
                <a href="<?=base_url("admin/geartype/create") ?>"><button type="button" class="btn btn-info btn-block"><i class="fa fa-plus" aria-hidden="true"></i> สร้าง </button></a>
            </div>
            <div class="col-lg-3 offset-lg-2  mt-8">
                <input type="text" class="form-control" placeholder="ชื่อประเภทเกียร์" id="gearname">
            </div>
            <div class="col-lg-3 mt-8">
                <select class="form-control" name="status" id="status">
                    <option value="">สถานะ</option>
                    <option value="1">เปิด</option>
                    <option value="2">ปิด</option>
                </select>
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> ค้นหา </button>
            </div>
        </div>
      </form>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="dt-table" width="100%" cellspacing="0">
                    <thead>
                        <th><i class="fa fa-sort"></i> ลำดับ</th>
                        <th><i class="fa fa-toggle-left"></i> ชื่อประเภทเกียร์</th>
                        <th><i class="fa fa-circle-o"></i> สถานะ</th>
                        <th></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
