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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">ยี่ห้อยาง</label><span class="error">*</span> <label id="tire_brandId-error" class="error" for="tire_brandId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="tire_brandId" name="tire_brandId" data-placeholder="เลือกยี่ห้อยาง" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">รุ่นยาง</label><span class="error">*</span> <label id="tire_modelId-error" class="error" for="tire_modelId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="tire_modelId" name="tire_modelId" data-placeholder="เลือกรุ่นยาง" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">ขอบยาง</label><span class="error">*</span> <label id="rimId-error" class="error" for="rimId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="rimId" name="rimId" data-placeholder="เลือกขอบยาง" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">ขนาดยาง</label><span class="error">*</span> <label id="tire_sizeId-error" class="error" for="tire_sizeId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control form-control-chosen-required" id="tire_sizeId" name="tire_sizeId" data-placeholder="เลือกขนาดยาง" required></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>       
                            
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">ราคา</label><span class="error">*</span> <label id="price-error" class="error" for="price"></label>
                                        <div class="input-group input-group-default">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="ราคา" min=0>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">การรับประกัน-ปี</label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="warranty_year" name="warranty_year">
                                                <option value="">เลือกการรับประกัน-ปี</option>
                                                <option value="1">1 ปี</option>
                                                <option value="2">2 ปี</option>
                                                <option value="3">3 ปี</option>
                                                <option value="4">4 ปี</option>
                                                <option value="5">5 ปี</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">เงื่อนไข</label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" name="warranty" id="warranty">
                                                <option value="">เลือกเงื่อนไข</option>
                                                <option value="1">และ</option>
                                                <option value="2">หรือ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">การรับประกัน-ระยะทาง (กิโลเมตร)</label>
                                        <div class="input-group input-group-default">
                                            <input type="number" class="form-control" id="warranty_distance" name="warranty_distance" placeholder="ระยะทาง (กิโลเมตร)" min=0>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                        </div>
                        
                        <div class="row p-t-20">
                            <div class="col-md-12 card-grid">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/tiredata/"); ?>">
                                <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </a>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>   
</div>
<!-- End Container fluid  -->
