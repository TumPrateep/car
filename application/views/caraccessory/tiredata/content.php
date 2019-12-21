<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <span class="text-primary">ข้อมูลยาง</span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/tiredata");?>">ข้อมูลยาง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <form id="form-search">
            <div class="form-row">
                <div class="col-lg-2">
                    <div class="input-group-append">
                        <a href="<?=base_url("caraccessory/tiredata/createtiredata")?>"
                            class="btn btn-success btn-block">
                            <i class="fa fa-plus"></i> สร้าง
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <select class="form-control" id="tire_brandId" name="tire_brandId">
                            <option value="">เลือกยี่ห้อยาง</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <select class="form-control" id="tire_modelId" name="tire_modelId">
                            <option value="">เลือกรุ่นยาง</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="input-group">
                        <input name="tire_size" id="tire_size" class="form-control" placeholder="ขนาดยาง">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="input-group-append">
                        <button type="submit" id="btn-search" class="btn btn-success btn-block">
                            <i class="fa fa-search"></i> ค้นหา
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="table">
            <table class="table table-striped" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th data-priority="1">ยี่ห้อยาง</th>
                        <th data-priority="2">รุ่นยาง</th>
                        <th data-priority="3">ขนาดยาง</th>
                        <th>ราคา</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->