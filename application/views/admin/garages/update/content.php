<div class="container-fluid">
      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?=base_url("admin/garages") ?>">ที่ตั้งอู่</a>
            </li>
            <li class="breadcrumb-item active">แก้ไขข้อมูล</li>
        </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                <div class="card text-white bg-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-tint"></i>  ข้อมูลอู่</h3>
                </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                    <div class="card-body black bg-light">
                        <form id="update-garages">
                            <input type="hidden" name="garageId" id="garageId" value="<?=$garageId ?>">  
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ชื่ออู่</label><span class="error">*</span>
                                    <input type="text" class="form-control" name="garageName" id="garageName" placeholder="ชื่ออู่" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>หมายเลขทะเบียนการค้า</label><span class="error">*</span>
                                    <input type="text" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ชื่อ</label><span class="error">*</span>
                                    <input type="text" name="firstnameGarage" id="firstnameGarage" class="form-control" placeholder="ชื่อ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>นามสกุล</label><span class="error">*</span>
                                    <input type="text" name="lastnameGarage" id="lastnameGarage" class="form-control" placeholder="นามสกุล">
                                </div>
                            </div>
                            <div class=form-row>
                                <div class="form-group col-md-12">
                                    <label>เลขบัตรประชาชน</label><span class="error">*</span>
                                    <input type="text" name="idcardGarage" id="idcardGarage" class="form-control" placeholder="เลขบัตรประชาชน" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>ที่อยู่</label><span class="error">*</span>
                                    <textarea class="form-control" name="addressGarage" id="addressGarage" placeholder="ที่อยู่" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label>จังหวัด</label><span class="error">*</span>
                                <select class="form-control" name="garage-provinceId" id="garage-provinceId"></select>
                                </div>
                                <div class="form-group col-md-4">
                                <label>อำเภอ</label><span class="error">*</span>
                                <select class="form-control" name="garage-districtId" id="garage-districtId"></select>
                                </div>
                                <div class="form-group col-md-4">
                                <label>ตำบล</label><span class="error">*</span>
                                <select class="form-control" name="garage-subdistrictId" id="garage-subdistrictId"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label>รหัสไปรษณีย์</label><span class="error">*</span>
                                <input type="text" class="form-control" name="zipCode" id="zipCode" placeholder="รหัสไปรษณีย์">
                                </div>
                                <div class="form-group col-md-4">
                                <label>ละติจูด</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="ละติจูด">
                                </div>
                                <div class="form-group col-md-4">
                                <label>ลองจิจูด</label>
                                <input type="text" class="form-control" name="longtitude" id="longtitude" placeholder="ลองจิจูด">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>คำอธิบาย</label>
                                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                            </div>
                            <label>สิ่งอำนวยความสะดวก</label>
                            <div class="form-row"> 
                                <div class="form-group">
                                    <div class="form-check panding">
                                        <input class="form-check-input" type="checkbox" name="option1" id="box1">
                                        <label class="form-check-label">Wifi</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="option2" id="box2">
                                        <label class="form-check-label">ห้องพัก-เเอร์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="option3" id="box3">
                                        <label class="form-check-label">ห้องพักพัดลม</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="option4"  id="box4">
                                        <label class="form-check-label">ที่นั่งรอ-พัดลม</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="other" id="other" placeholder="อื่นๆ">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">รูปภาพอู่</label>
                                        <div class="image-editor">
                                            <input type="file" class="cropit-image-input" name="tempImage">
                                            <div class="cropit-preview"></div>
                                                <div class="image-size-label">
                                                    ปรับขนาด
                                                </div>
                                            <input type="range" class="cropit-image-zoom-input">
                                            <input type="hidden" name="garage_picture" class="hidden-image-data" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
                    
              
                    <!-- /.card-body -->
                 
                </div>
              </div>
          </div>
        </div>
      </section>
</div>