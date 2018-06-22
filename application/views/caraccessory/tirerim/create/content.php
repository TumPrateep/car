<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลขอบยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireRim"); ?>">ขอบยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">  
    <form id="submit">   
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header">
                    <div class="card-title">
                        <h4><i class="fa fa-fw fa-car"></i> เพิ่มข้อมูลขอบยาง</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-group col-md-6">
                                    <label>ชื่อขอบยาง</label>
                                    <input type="text" class="form-control" placeholder="ชื่อขอบยาง" name="rimName" id="rimName">
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Container fluid -->