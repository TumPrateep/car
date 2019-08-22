<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/tiredata"); ?>">ข้อมูลยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <form id="create-tiredata">
    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">ยี่ห้อยาง</label><span class="error">*</span> <label id="tire_brandId-error" class="error" for="tire_brandId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="tire_brandId" name="tire_brandId" data-placeholder="เลือกยี่ห้อยาง" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">รุ่นยาง</label><span class="error">*</span> <label id="tire_modelId-error" class="error" for="tire_modelId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="tire_modelId" name="tire_modelId" data-placeholder="เลือกรุ่นยาง" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">ขอบยาง</label><span class="error">*</span> <label id="rimId-error" class="error" for="rimId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="rimId" name="rimId" data-placeholder="เลือกขอบยาง" required></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">ขนาดยาง</label><span class="error">*</span> <label id="tire_sizeId-error" class="error" for="tire_sizeId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen" id="tire_sizeId" name="tire_sizeId" data-placeholder="เลือกขนาดยาง" multiple required></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>       
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <button class="btn btn-success" id="show_price"> <i class="fa fa-check"></i> แสดงรายการราคา</button>
                                </div>
                            </div>
                            <br>
                            <div class="p-t-20" id="renderPrice">

                            </div>
                        </div>
                        
                        <!-- <div class="row p-t-20">
                            <div class="col-md-12 card-grid">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/tiredata/"); ?>">
                                <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </a>
                            </div>
                        </div>       -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>   
</div>
<!-- End Container fluid  -->
