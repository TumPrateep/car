<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เเก้ไขข้อมูลอะไหล่ช่วงล่าง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/spareundercarries"); ?>">อะไหล่ช่วงล่วง</a></li>
                <li class="breadcrumb-item active">เเก้ไขข้อมูลอะไหล่ช่วงล่าง</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <div class="container-fluid">   
      <div class="row">
        <div class="col-12">
            <div class="card card-header-blue">
                <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
                <div class="card-title"></div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>อะไหล่ช่วงล่าง</label> <span class="error">*</span>
                                <input type="text" class="form-control input-default " name="spares_undercarriageName" id="spares_undercarriageName" placeholder="อะไหล่ช่วงล่าง">
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
                    
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                    <a href="<?=base_url("caraccessory/spareundercarries"); ?>">
                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                    </a>
                </div>

            </div>
        </div>
        </div>
    </div>
    </form>
<!-- End Container fluid 
