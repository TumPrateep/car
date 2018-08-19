<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Lubricator/lubricators/$lubricator_brandId"); ?>">น้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <form id="create-lubricator">   
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header">
                    <div class="card-title">
                        <h4> เพิ่มข้อมูลน้ำมันเครื่อง</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <input type="hidden" id="lubricator_brandId" name="lubricator_brandId" value="<?=$lubricator_brandId ?>">   
                            <div class="row">
                                <div class="form-group col-md-4">
                                        <label class="control-label">ชื่อรุ่นน้ำมันเครื่อง</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อรุ่นน้ำมันเครื่อง" name="lubricatorName" id="lubricatorName">
                                </div>
                                <div class="form-group col-md-4">
                                <label>ชนิดน้ำมันเครื่อง</label>
                                    <select class="form-control" name="lubricator_gear" id="lubricator_gear">
                                        <option value="1">น้ำมันเครื่อง</option>
                                        <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                        <option value="3">น้ำมันเกียร์ออโต</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                        <label>เบอร์น้ำมันเครื่อง</label><span class="error">*</span>
                                    <select class="form-control input-default" name="lubricator_number" id="lubricator_number">
                                        <option value="">เลือกเบอร์น้ำมันเครื่อง</option>
                                    </select>      
                                </div>
                            </div><br>
                            <div class="row p-t-20">
                                    <div class="col-md-12 card-grid">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                        <a href="<?=base_url("caraccessory/Lubricator/lubricators/$lubricator_brandId"); ?>">
                                        <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                        </a>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Container fluid  -->