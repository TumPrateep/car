<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มยี่ห้อรถ</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">

                    <div class="card-title"></div>
                    <div class="card-body">
                        <form id="submit">
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อรถ</label>
                                            <input type="text" id="brandName" class="form-control" name="brandName" placeholder="ชื่อยี่ห้อรถ">
                                         </div>
                                        </div>       
                                    </div>
                                </div>

                                <!-- <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อรถ</label>
                                            <input name="brandPicture" type="file" multiple />
                                         </div>
                                        </div>       
                                    </div>
                                </div>   -->

                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="control-label">รูปยี่ห้อรถ</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="tempImage" required>
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">
                                                ปรับขนาด
                                                </div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="brandPicture" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div>     

                                <div class="row p-t-20">
                                    <div class="col-md-12 card-grid">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                        <a href="<?=base_url("caraccessory/Car"); ?>">
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

    <!-- End Container fluid -->