Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลขนาดยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireSize/index/$rimId"); ?>">รายการขนาดยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <div class="container-fluid">   
      <div class="row">
        <div class="col-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"><i class="fa fa-fw fa-car"></i> เพิ่มข้อมูลขนาดยาง </h4>
                </div> 
                    <input type="hidden" id="rimId" name="rimId" value="<?=$rimId ?>">
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                <div class="col">
                                    <label>หน้ายาง</label> <span class="error">*</span>
                                    <input type="text" class="form-control" placeholder="หน้ายาง" name="tire_size" id="tire_size">
                                </div>  
                                <div class="col">
                                    <label>ซีรี่ย์ยาง</label> <span class="error">*</span>
                                    <input type="text" class="form-control" placeholder="ซีรี่ย์ยาง" name="tire_series" id="tire_series">
                                </div>
                                <div class="col">
                                    <label>ขนาดกะทะล้อ</label> <span class="error">*</span>
                                    <input type="text" class="form-control" placeholder="ขนาดกะทะล้อ" name="rim" id="rim">
                                </div><br>
                                </div>       
                            </div>           
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                            <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                        </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid 