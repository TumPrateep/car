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
                                        <label class="control-label">ยี่ห้อยาง</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tire_brandId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">รุ่นยาง</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tire_modelId"></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>       
                            
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ขอบยาง</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="rimId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ขนาดยาง</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tire_sizeId"></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ร้านอะไหล่</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="car_accessoriesId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ราคา</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="car_accessoriesId"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">การประกัน(ปี)</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="car_accessoriesId"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">การประกัน(ระยะทาง)</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="car_accessoriesId"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fitted or Mail order</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="car_accessoriesId"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="control-label">รูปล้อ</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input"  required>
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
</div>
<!-- End Container fluid  -->
