<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เเก้ไขน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/numberlubricator"); ?>">น้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <form id="update-lubricatornumber"> 
        <input type="hidden" id="lubricator_numberId" name="lubricator_numberId" value="<?=$lubricator_numberId ?>">     
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header">
                    <div class="card-title">
                        <h4> เเก้ไขข้อมูเบอร์น้ำมันเครื่อง</h4>
                    </div>
                    <div class="card-body">
                    <form id="sumbit" >
                        <div class="basic-form">
                            <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อเบอร์น้ำมันเครื่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อเบอร์น้ำมันเครื่อง" name="lubricator_number" id="lubricator_number">
                          </div>
                        </div>
                      </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชนิดน้ำมันเครื่อง</label>
                                    <select class="form-control" name="lubricator_gear" id="lubricator_gear">
                                    <option value="1">น้ำมันเครื่อง</option>
                                    <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                    <option value="3">น้ำมันเกียร์ออโต</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>ประเภทน้ำมันเครื่อง</label> <span class="error">*</span>
                                    <select class="form-control" id="lubricator_typeId" name="lubricator_typeId">
                                    <option value="">ประเภทน้ำมันเครื่อง</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                <a href="<?=base_url("caraccessory/numberlubricator"); ?>">
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