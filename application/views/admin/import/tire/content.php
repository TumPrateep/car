<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/import")?>">นำเข้าข้อมูล (ยาง) <?php echo $car_accessories->car_accessoriesName; ?></a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>

    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <a href="<?=base_url("admin/import/tireimport/".$car_accessoriesId)?>" class="btn btn-info btn-block"><i class="fa fa-download" aria-hidden="true"></i> นำเข้าราคาสินค้า</a>
        </div>
    </div>

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