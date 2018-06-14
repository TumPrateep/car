Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลขอบยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireRim"); ?>">รายการขอบยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">   
      <div class="row">
        <div class="col-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"><i class="fa fa-fw fa-car"></i> เพิ่มข้อมูลขอบยาง </h4>
                </div> 
                        <div class="form-body"> <br>
                            <div class="row p-t-20">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">ชื่อขอบยาง</label><span class="error">*</span>
                                        <input type="text" id="firstName" class="form-control" placeholder="ชื่อขอบยาง" name="rimName" id="rimName">
                                    </div>
                                </div>       
                            </div>           
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> ตกลง</button>
                            <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                        </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<!-- End Container fluid 