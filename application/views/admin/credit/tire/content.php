<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/credit/tirescharge")?>">จำนวนเงินบัตรเครดิต(ยาง)</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
    </ol>

    <!-- Example DataTables Card-->

    <div class="card-tools one">
        <form id="form-search">
            <div class="form-row">
                <div class="col-md-2">
                    <a class="btn btn-primary create" href="<?=base_url("admin/credit/createtirescharge")?>">
                        <i class="fa fa-plus"> สร้าง</i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
        <thead>
            <th><i class="fa fa-sort"></i> ลำดับ</th>
            <th><i class="fa fa-usd"></i> ค่าบัตรเครดิต</th>
            <th><i class="fa fa-user-circle"></i> สถานะ</th>
            <th></th>
        </thead>
    </table>
</div>