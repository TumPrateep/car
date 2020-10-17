<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/import")?>">นำเข้าข้อมูล (ยาง)</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>


    <!-- Example DataTables Card-->
    <!-- <div class="card-tools one">
        <form id="form-search">
            <div class="form-row">
                <div class="col-md-3 offset-md-5">
                    <div class="input-group">
                        <input name="car_search" id="table-search" class="form-control float-right"
                            placeholder="ชื่อร้านอะไหล่">
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-cogs"></span>
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
                            <span class="input-group-text fa fa-toggle-on"></span>
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
    </div> -->

    <input type="hidden" name="userId" id="userId" value="<?=$car_accessoriesId?>">

    <div class="table-responsive">
        <table class="table table-bordered" id="shop-table" width="100%" cellspacing="0" style=margin-top:12>
            <thead>
                <th><i class="fa fa-sort"></i> ลำดับ</th>
                <th><i class="fa fa-home"></i> สินค้า</th>
                <th><i class="fa fa-user"></i> ราคา (บาท)</th>
                <th></th>
            </thead>
        </table>
    </div>