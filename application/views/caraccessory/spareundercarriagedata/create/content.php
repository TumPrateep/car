<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มข้อมูลอะไหล่ช่วงล่าง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/spareundercarriesdata"); ?>">ข้อมูลอะไหล่ช่วงล่าง</a></li>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">อะไหล่ช่วงล่าง</label><span class="error">*</span> <label id="spares_undercarriageId-error" class="error" for="spares_undercarriageId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen" id="spares_undercarriageId" name="spares_undercarriageId" data-placeholder="เลือกอะไหล่ช่วงล่าง" multiple required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">ยี่ห้ออะไหล่ช่วงล่าง</label><span class="error">*</span> <label id="spares_brandId-error" class="error" for="spares_brandId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" id="spares_brandId" name="spares_brandId" data-placeholder="เลือกยี่ห้ออะไหล่ช่วงล่าง" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">ยี่ห้อรถ</label><span class="error">*</span> <label id="brandId-error" class="error" for="brandId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" id="brandId" name="brandId" data-placeholder="เลือกยี่ห้อรถ" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">รุ่นรถ</label><span class="error">*</span> <label id="modelId-error" class="error" for="modelId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" id="modelId" name="modelId" data-placeholder="เลือกรุ่นรถ">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>โฉมรถยนต์</label><span class="error">*</span>
                                            <select id="detail" name="detail" class="form-control form-control-chosen" data-placeholder="เลือกโฉมรถยนต์" multiple>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label>รายระเอียดรุ่นรถ</label><span class="error">*</span>
                                            <select id="modelofcarId" name="modelofcarId" class="form-control form-control-chosen-optgroup" data-placeholder="เลือกรายระเอียดรุ่นรถ" multiple>
                                            </select>
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
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- End Container fluid -->