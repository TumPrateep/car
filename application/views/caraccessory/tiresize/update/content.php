<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เเก้ไขข้อมูลขนาดยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireRim"); ?>">ขอบยาง</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireSize/index/$tire_rimId"); ?>">ขนาดยาง</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูลขนาดยาง</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <div class="container-fluid">   
      <div class="row">
        <div class="col-12">
            <div class="card card-header-blue">
                <input type="hidden" id="rimId" name="rimId" value="<?=$tire_rimId ?>">
                <input type="hidden" id="tire_sizeId" name="tire_sizeId" value="<?=$tire_sizeId ?>">
                <div class="card-title"></div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ขนาดยาง</label> <span class="error">*</span>
                                <input type="text" class="form-control input-default " name="tire_size" id="tire_size" placeholder="ขนาดยาง">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ซีรี่ยาง</label> <span class="error">*</span>
                                <input type="text" class="form-control input-default" placeholder="ซีรี่ย์ยาง" name="tire_series" id="tire_series">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ขนาดกะทะล้อ</label> <span class="error">*</span>
                                <input type="text" class="form-control input-default" placeholder="ขนาดกะทะล้อ" name="rim" id="rim">
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                    <a href="<?=base_url("caraccessory/TireSize/index/$tire_rimId"); ?>">
                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                    </a>
                </div>

            </div>
        </div>
        </div>
    </div>
    </form>
<!-- End Container fluid 
