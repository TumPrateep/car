<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/lubricatorgearnumber ") ?>">เบอร์น้ำมันเกียร์</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>

    <!-- Example DataTables Card-->
    <div class="card-tools one">
        <form id="form-search">
            <div class="form-row">
                <div class="col-md-2">
                    <a class="btn btn-primary create btn-block" href="<?=base_url("admin/lubricatorgearnumber/createlubricatorgearnumber ") ?>">
                        <i class="fa fa-plus">  สร้าง</i>
                    </a>
                </div>
                <div class="col-md-3 offset-md-3">
                    <div class="input-group">
                        <input name="car_search" id="table-search" class="form-control float-right" placeholder="เบอร์น้ำมันเกียร์">
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-safari">
                    </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="input-group">
                        <select class="form-control" name="status" id="status">
                            <option value>สถานะ</option>
                            <option value=1>เปิด</option>
                            <option value=2>ปิด</option>
                        </select>
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-toggle-on">
                    </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group-append">
                        <button type="submit" id="btn-search" class="btn btn-success btn-block">
                            <i class="fa fa-search"></i> ค้นหา
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <th><i class="fa fa-sort"></i> ลำดับ</th>
                    <th><i class="fa fa-safari"></i> ชื่อเบอร์น้ำมันเกียร์</th>
                    <th><i class="fa fa-tachometer"></i> ประเภทน้ำมันเกียร์</th>
                    <th><i class="fa fa-user-circle"></i> สถานะ</th>
                    <th></th>
                </thead>
            </table>
        </div>
    </div>
</div>