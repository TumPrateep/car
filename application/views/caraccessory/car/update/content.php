<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เเก้ไขยี่ห้อรถ</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item active">เเก้ไข</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    
    <div class="container-fluid">  
    <form id="submit">  
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">
                <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <!-- <form action="#"> -->
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อรถ</label><span class="error">*</span>
                                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้อรถ" name="brandName" id="brandName" value="brandName">
                                         </div>
                                        </div>       
                                    </div>
                                       
                                    <h3 class="box-title m-t-40">รูปภาพ</h3>
                                    <hr>
                                    
                                    
                                        <div class="fallback"><input type="file" multiple name="brandPicture" id="brandPicture" /></div>
                                    
                                
                                    <h6 class="card-subtitle">เพิ่ม <code>รูปภาพ</code> ที่นี้</h6>
                                           
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                    <a href="<?=base_url("caraccessory/car"); ?>">
                                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                    </a>
                                </div>
                            </div>
                        <!-- </form>    -->

                        <!-- <h4 class="card-title">Dropzone</h4>
                        <h6 class="card-subtitle">For multiple file upload put class <code>.dropzone</code> to form.</h6>
                        <form action="#" class="dropzone">
                            <div class="fallback"><input name="file" type="file" multiple /></div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <!-- End Container fluid  -->