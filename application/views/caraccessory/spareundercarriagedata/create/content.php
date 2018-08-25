<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มข้อมูลอะไหล่ช่วงล่าง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Spareundercarriesdata"); ?>">ข้อมูลอะไหล่ช่วงล่าง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูลอะไหล่ช่วงล่าง</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">   
        <form id="create-sparesUndercarriageData">
        <div class="container-fluid">   
            <div class="row">
                <div class="col-12">
                    <div class="card card-header-blue">
                            <div class="form-body"> <br>
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">อะไหล่ช่วงล่าง</label><span class="error">*</span> <label id="spares_undercarriageId-error" class="error" for="spares_undercarriageId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control" id="spares_undercarriageId" name="spares_undercarriageId">
                                                    <option value="">เลือกอะไหล่ช่วงล่าง</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">ยี่ห้ออะไหล่ช่วงล่าง</label><span class="error">*</span> <label id="spares_brandId-error" class="error" for="spares_brandId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control" id="spares_brandId" name="spares_brandId">
                                                <option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">ราคา</label><span class="error">*</span> <label id="price-error" class="error" for="price"></label>
                                            <div class="input-group input-group-default">
                                                <input type="number" class="form-control" id="price" name="price" placeholder="ราคา">
                                            </div>
                                        </div>
                                    </div>      
                                </div>       
                                
                                <div class="row p-t-20">
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
                                            <label class="control-label">การรับประกัน-ระยะทาง</label>
                                            <div class="input-group input-group-default">
                                                <input type="number" class="form-control" id="warranty_distance" name="warranty_distance" placeholder="ระยะทาง (กิโลเมตร)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">รูปล้อ</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="tempImage">
                                                <div class="cropit-preview"></div>
                                                    <div class="image-size-label">
                                                        ปรับขนาด
                                                    </div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="spares_undercarriageDataPicture" id="spares_undercarriageDataPicture" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                            
                            <div class="row p-t-20">
                                <div class="col-md-12 card-grid">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                    <a href="<?=base_url("caraccessory/Spareundercarriesdata"); ?>">
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

    <!-- End Container fluid -->