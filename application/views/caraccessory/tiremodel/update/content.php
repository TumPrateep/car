<-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> แก้ไขข้อมูลรุ่นยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireModel/index1/$tire_brandId"); ?>">รายการรุ่นยาง</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
            </ol>
        </div>
    </div>
    <form id="submit">
    <div class="container-fluid">   
      <div class="row">
        <div class="col-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"><i class="fa fa-fw fa-car"></i> แก้ไขข้อมูลรุ่นยาง </h4>
                </div> 
                <input type="hidden" id="tire_brandId" name="tire_brandId" value="<?=$tire_brandId ?>">
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ชื่อรุ่นยาง</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อรุ่นยาง" name="tire_modelName" id="tire_modelName">
                                    </div>
                                </div>       
                            </div>           
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                            <button type="button" class="btn btn-inverse">ยกเลิก</button>
                        </div>
                </div>
            </div>
        </div>
    </div>   
</div>
