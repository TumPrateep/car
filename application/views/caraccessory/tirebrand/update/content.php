<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เเก้ไขยี่ห้อยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/tirebrand"); ?>">ยี่ห้อยาง</a></li>
                <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
            </ol>
        </div>
    </div>

    <form id="submit">

    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">
                <input type="hidden" id="tire_brandId" name="tire_brandId" value="<?=$tire_brandId?>">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <!-- <form action="#"> -->
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อยาง</label>
                                            <input type="text" class="form-control" placeholder="ชื่อยี่ห้อยาง" id="tire_brandName" name="tire_brandName">
                                         </div>
                                        </div>       
                                    </div>
                                       
                                    <div class="row p-t-20">
                      <div class="col-md-12">
                          <div class="form-group">
                          <label class="control-label">รูปยี่ห้อยาง</label>
                              <div class="image-editor">
                                  <input type="file" class="cropit-image-input" name="tempImage" required>
                                  <div class="cropit-preview"></div>
                                  <div class="image-size-label">
                                  ปรับขนาด
                                  </div>
                                  <input type="range" class="cropit-image-zoom-input">
                                  <input type="hidden" name="tire_brandPicture" class="hidden-image-data" />
                              </div>
                          </div>
                      </div>
                  </div>    
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                    <a href="<?=base_url("caraccessory/tirebrand"); ?>">
                                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<!-- End Container fluid >>