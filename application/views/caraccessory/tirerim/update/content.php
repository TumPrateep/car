<-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> แก้ไขข้อมูลขอบยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/tirerim"); ?>">รายการขอบยาง</a></li>
                <li class="breadcrumb-item active">เเก้ไขข้อมูลขอบยาง</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">  
    <form id="submit">  
    <input type="hidden" id="rimId" name="rimId" value="<?=$rimId ?>"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header">
                    <div class="card-title">
                        <h4><i class="fa fa-fw fa-car"></i> แก้ไขข้อมูลขอบยาง</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-group col-md-6">
                                    <label>ชื่อขอบยาง</label>
                                    <input type="text" class="form-control" placeholder="ชื่อขอบยาง" name="rimName" id="rimName">
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/tirerim"); ?>">
                                <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Container fluid -->