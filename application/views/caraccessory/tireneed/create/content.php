<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลความต้องการราคาเปลี่ยนยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("/caraccessory/TireNeed"); ?>">ราคาเปลี่ยนยาง</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireNeed/index/$tire_needId"); ?>">ความต้องการราคาเปลี่ยนยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">
                    <input type="hidden" id="tire_needId" name="tire_needId" value="<?=$tire_needId ?>">
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ราคาล้อหน้า</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ราคาล้อหน้า" name="tire_front" id="tire_front">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ราคาล้อหลัง</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ราคาล้อหลัง" name="tire_back" id="tire_back">
                                    </div>   
                                </div>       
                            </div>
                            
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ขนาดขอบยาง</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tireBrand"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">อู่</label><span class="error">*</span>
                                        <div class="input-group input-group-default">
                                            <select class="form-control" id="tireBrand"></select>
                                        </div>
                                    </div>
                                </div>      
                            </div>               
                        </div>
                        
                        <div class="row p-t-20">
                            <div class="col-md-12 card-grid">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/TireModel/index/$tire_brandId"); ?>">
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
