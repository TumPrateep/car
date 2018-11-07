<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มยี่ห้อน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Lubricator"); ?>">ยี่ห้อน้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">

                    <div class="card-title"></div>
                    <div class="card-body">
                        <form id="create-lubricatorbrand">
                        <!-- <input type="hidden" id="lubricator_brandId" name="lubricator_brandId" value="<?=$lubricator_brandId ?>">    -->
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อน้ำมันเครื่อง</label><span class="error">*</span>
                                            <input type="text" id="lubricator_brandName" class="form-control" name="lubricator_brandName" id="lubricator_brandName" placeholder="ชื่อยี่ห้อน้ำมันเครื่อง">
                                         </div>
                                        </div>       
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="control-label">รูปยี่ห้อน้ำมันเครื่อง</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input"  required>
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">
                                                ปรับขนาด
                                                </div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="lubricator_brandPicture" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div>     

                                <div class="row p-t-20">
                                    <div class="col-md-12 card-grid">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                        <a href="#">
                                        <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        
        
    </div>
    <!-- End Container fluid  -->