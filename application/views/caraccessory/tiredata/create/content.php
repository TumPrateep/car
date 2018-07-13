<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("/caraccessory/TireData"); ?>">ราคาเปลี่ยนยาง</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireData/index/$tire_dataId"); ?>">ความต้องการราคาเปลี่ยนยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">
                    <input type="hidden" id="tire_dataId" name="tire_dataId" value="<?=$tire_dataId ?>">
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ยี่ห้อยาง</label><span class="error">*</span> <label id="tire_brandId-error" class="error" for="tire_brandId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tire_brandId" name="tire_brandId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">รุ่นยาง</label><span class="error">*</span> <label id="tire_modelId-error" class="error" for="tire_modelId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tire_modelId" name="tire_modelId"></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>       
                            
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ขอบยาง</label><span class="error">*</span> <label id="rimId-error" class="error" for="rimId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="rimId" name="rimId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ขนาดยาง</label><span class="error">*</span> <label id="tire_sizeId-error" class="error" for="tire_sizeId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tire_sizeId" name="tire_sizeId"></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ร้านอะไหล่</label><span class="error">*</span> <label id="car_accessoriesId-error" class="error" for="car_accessoriesId"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="car_accessoriesId" name="car_accessoriesId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ราคา</label><span class="error">*</span> <label id="price-error" class="error" for="price"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="price" name="price"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">การประกัน(ปี)</label><span class="error">*</span> <label id="warranty_year-error" class="error" for="warranty_year"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="warranty_year" name="warranty_year"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">การประกัน(ระยะทาง)</label><span class="error">*</span> <label id="warranty_distance-error" class="error" for="warranty_distance"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="warranty_distance" name="warranty_distance"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fitted or Mail order</label><span class="error">*</span> <label id="can_change-error" class="error" for="can_change"></label>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="can_change" name="can_change"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="control-label">รูปล้อ</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="tempImage"  required>
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">
                                                ปรับขนาด
                                                </div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="tire_picture	" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                    
                        </div>
                        
                        <div class="row p-t-20">
                            <div class="col-md-12 card-grid">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/TireModel/index/$tire_dataId"); ?>">
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
