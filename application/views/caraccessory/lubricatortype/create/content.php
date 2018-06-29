<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มประเภทน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/lubricator"); ?>">ประเภทน้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
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
                        <h4> เพิ่มข้อมูประเภทน้ำมันเครื่อง</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <!-- <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>"> -->   
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ชื่อประเภทน้ำมันเครื่อง</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อประเภทน้ำมันเครื่อง" name="lubricator_typeName" id="lubricator_typeName">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ระยะทาง</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ระยะทาง" name="lubricator_typeSize" id="lubricator_typeSize">
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                <a href="#">
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