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
                <li class="breadcrumb-item active">นำเข้าราคาสินค้า</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
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
                                    <a href="<?php echo base_url("caraccessory/export/export_tire"); ?> " class="btn btn-warning btn-block"><i class="fa fa-download"></i>
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
    </div>
    <!-- End Container fluid  -->