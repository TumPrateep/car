<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">แก้ไขน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/lubricator/lubricators"); ?>">น้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">แก้ไขน้ำมันเครื่อง</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <form id="submit">   
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header">
                    <div class="card-title">
                        <h4> แก้ไขน้ำมันเครื่อง</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <input type="hidden" id="lubricator_brandId" name="lubricator_brandId" value="<?=$lubricator_brandId ?>">   
                            <input type="hidden" id="lubricatorId" name="lubricatorId" value="<?=$lubricatorId ?>">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <div class="form-group">
                                        <label class="control-label">ชื่อรุ่นน้ำมันเครื่อง</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อน้ำมันเครื่อง" name="lubricatorName" id="lubricatorName">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                        <label>ชนิดน้ำมันเครื่อง</label>
                                        <select class="form-control input-default" name="lubricator_gear" id="lubricator_gear">
                                            <option value="1">น้ำมันเครื่อง</option>
                                            <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                            <option value="3">น้ำมันเกียร์ออโต</option>
                                        </select>
                                </div>
                                <div class="col-md-4 form-group">
                                        <label>เบอร์น้ำมันเครื่อง </label>
                                        <select class="form-control input-default" name="lubricator_numberId" id="lubricator_numberId">
                                            <option value="1">เลือกเบอร์น้ำมันเครื่อง</option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                        </select> 
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/lubricator/lubricators/$lubricator_brandId"); ?>">
                                <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Container fluid  -->