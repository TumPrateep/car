<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/import/tire/".$car_accessoriesId)?>">นำเข้าข้อมูล (ยาง) <?php echo $car_accessories->car_accessoriesName; ?></a>
        </li>
        <li class="breadcrumb-item active">นำเข้าราคายาง</li>
    </ol>

    <input type="hidden" name="userId" id="userId" value="<?=$car_accessoriesId?>">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form id="form">
                        <div class="row justify-content-md-center">
                            <div class="col-lg-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_input" required="">
                                    <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                    <small>เลือกไฟล์ .csv เท่านั้น</small>
                                    <small id="response"></small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?php echo base_url("admin/export/export_tire/".$car_accessoriesId); ?> " class="btn btn-warning btn-block"><i class="fa fa-download"></i>
                                        ดาวน์โหลดไฟล์ตัวอย่าง .csv</a>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-info btn-block">
                                    <i class="fa fa-book"></i> 
                                    แสดงข้อมูล
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 table-responsive" id="parsed_csv_list">

                </div>
            </div>
        </div>
    </div>