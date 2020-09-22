<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/tirepicture")?>">รูปภาพสินค้า</a>
        </li>
        <li class="breadcrumb-item active">น้ำมันเครื่อง</li>
    </ol>

    <!-- Example DataTables Card-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2  mt-4">
                <div class="input-group mb-3">
                    <a class="btn btn-info btn-block" href="<?=base_url("admin/lubricatorpicture/create")?>">
                        <i class="fa fa-plus"> สร้าง</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dt-table" width="100%" cellspacing="0">
                        <thead>
                            <th>ลำดับ</th>
                            <th>รูปภาพสินค้า</th>
                            <th>ยี่ห้อ</th>
                            <th>น้ำมันเครื่อง</th>
                            <th>เบอร์น้ำมันเครื่อง</th>
                            <th>ความจุ</th>
                            <th>สถานะ</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>