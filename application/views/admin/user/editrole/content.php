 
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/usermanagement") ?>">ข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
      </ol>

      <!-- Example DataTables Card-->
      <input type="hidden" name="userId" id="userId" value="<?=$userId ?>" />
      <input type="hidden" name="category" id="category" value="<?=$category ?>" />
      <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card text-white bg-success">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-user-circle-o" ></i> แก้ไขประเภทผู้ใช้งาน</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                      <div class="card-body black bg-white">
                        <!-- SmartWizard html -->
                        <div id="smartwizard">
                            <ul>
                                <li><a href="#step-1">Step 1<br /><small>ข้อมูลส่วนตัว</small></a></li>
                                <li><a href="#step-2">Step 2<br /><small>ประเภทผู้ใช้งาน</small></a></li>
                                <li><a href="#step-3">Step 3<br /><small>ข้อมูลเพิ่มเติม</small></a></li>
                            </ul>

                            <div id="content" style="min-height:30px !important">
                                  <div id="step-1">
                                  
                                      <h4>ข้อมูลส่วนตัว</h4>
                                      <div id="form-step-0" role="form" data-toggle="validator">
                                          <form id="form-1">
                                            <div class="form-row">
                                              <div class="form-group col-md-2">
                                                <label>คำนำหน้า</label><span class="error">*</span>
                                                <select class="form-control" name="titleName" id="titleName">
                                                  <option value="">คำนำหน้า</option>
                                                  <option value="นาย">นาย</option>
                                                  <option value="นาง">นาง</option>
                                                  <option value="นางสาว">นางสาว</option>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-5">
                                                <label>ชื่อ</label><span class="error">*</span>
                                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="ชื่อ">
                                              </div>
                                              <div class="form-group col-md-5">
                                                <label>นามสกุล</label><span class="error">*</span>
                                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="นามสกุล">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label>ที่อยู่</label><span class="error">*</span>
                                              <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-4">
                                                <label>จังหวัด</label><span class="error">*</span>
                                                <select class="form-control" name="provinceId" id="provinceId"></select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>อำเภอ</label><span class="error">*</span>
                                                <select class="form-control" name="districtId" id="districtId"></select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>ตำบล</label><span class="error">*</span>
                                                <select class="form-control" name="subdistrictId" id="subdistrictId"></select>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label>เบอร์โทรศัพท์</label>
                                                <input type="text" name="phone1" id="phone1" class="form-control" placeholder="เบอร์โทรศัพท์">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                                                <input type="text" name="phone2" id="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้">
                                              </div>
                                            </div>
                                          </form>
                                      </div>
                                  </div>
                                
                                  <div id="step-2">
                                      <h4>ประเภทผู้ใช้งาน</h4>
                                      <div id="form-step-1" role="form" data-toggle="validator">
                                        <form id="form-2">
                                          <div class="form-group text-center">
                                            <select id="role" class="image-picker show-html" name="role">
                                              <option data-img-src="<?=base_url("public/image/role/4.jpg");?>" value="4">ผู้ใช้งาน</option>
                                              <option data-img-src="<?=base_url("public/image/role/3.jpg");?>" value="3">อู่</option>
                                              <option data-img-src="<?=base_url("public/image/role/2.jpg");?>" value="2">ร้านอะไหล่</option>
                                              <option data-img-src="<?=base_url("public/image/role/1.jpg");?>" value="1">ผู้ดูแลระบบ</option>
                                            </select>
                                          </div>
                                        </form>
                                      </div>
                                  </div>

                                  <div id="step-3">
                                  <input type="hidden" name="userId" id="userId" value="<?=$userId ?>" />
                                  <input type="hidden" name="category" id="category" value="<?=$category ?>" />
                                      <div id="form-step-2" role="form" data-toggle="validator">
                                      <div id="role-4" style="display:none">  
                                        <h5>ข้อมูลรถ</h5><label><h6>ทะเบียนรถ</h6></label><span class="error">*</span>
                                        <form id="form-role-4">
                                            <div class="form-row">
                                              <div class="form-group col-md-4">
                                                <label>ตัวอักษรนำหน้า</label><span class="error">*</span>
                                                <input type="text" name="characterPlate" id="character_plate" class="form-control" placeholder="ตัวอักษรนำหน้า">
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>ตัวเลข</label><span class="error">*</span>
                                                <input type="text" name="numberPlate" id="number_plate" class="form-control" placeholder="ตัวเลข">
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>จังหวัด</label><span class="error">*</span>
                                                <select class="form-control" name="provincePlate" id="province_plate"  class="form-control" placeholder="จังหวัด"></select>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-6">
                                                <label>เลขไมล์</label><span class="error">*</span>
                                                <input type="text" name="mileage" id="mileage" class="form-control" placeholder="เลขไมล์">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label>สีของรถ</label><span class="error">*</span>
                                                <input type="text" name="colorCar" id="color" class="form-control" placeholder="สีของรถ">
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-4">
                                                <label>รูปด้านหน้ารถ </label>
                                                <input type="file" class="form-control-file" name="pictureFront" id="frontPicture">
                                                <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>รูปด้านหลังรถ </label>
                                                <input type="file" class="form-control-file" name="pictureBack" id="backPicture">
                                                <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>รูปป้ายวงกลม </label>
                                                <input type="file" class="form-control-file" name="circlePlate" id="circlesignPicture">
                                                <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                        
                                        <div id="role-3" style="display:none">
                                          <h5>ข้อมูลอู่</h5>
                                          <form id="form-role-3">  
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
                                                  <input class="form-check-input" type="checkbox" id="box1">
                                                  <label class="form-check-label">Wifi</label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="box2">
                                                  <label class="form-check-label">ห้องพัก-เเอร์</label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="box3">
                                                  <label class="form-check-label">ห้องพักพัดลม</label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="box4">
                                                  <label class="form-check-label">ที่นั่งรอ-พัดลม</label>
                                                </div>
                                              </div>
                                              <div class="form-group col-md-12">
                                                <input type="text" class="form-control" name="other" id="other" placeholder="อื่นๆ">
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-4">
                                                <label>รูปภาพของอู่ </label>
                                                <input type="file" class="form-control-file" name="garagePicture" id="garagePicture">
                                                <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                              </div>
                                            </div>
                                          </form>
                                        </div>

                                        <div id="role-2" style="display:none">
                                          <h5>ข้อมูลร้านอะไหล่</h5>
                                          <form id="form-role-2">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label>ชื่อร้านค้าส่ง</label><span class="error">*</span>
                                                  <input type="text" class="form-control" name="car_accessoriesName" id="car_accessoriesName" placeholder="ชื่อร้านค้าส่ง">
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label>หมายเลขทะเบียนการค้า</label><span class="error">*</span>
                                                  <input type="text" class="form-control" name="businessRegistration" id="businessRegistrationAccessories" placeholder="หมายเลขทะเบียนการค้า">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label>ชื่อ</label><span class="error">*</span>
                                                  <input type="text" name="sparepart-firstname" id="sparepart-firstname" class="form-control" placeholder="ชื่อ">
                                                </div>
                                              <div class="form-group col-md-6">
                                                  <label>นามสกุล</label><span class="error">*</span>
                                                  <input type="text" name="sparepart-lastname" id="sparepart-lastname" class="form-control" placeholder="นามสกุล">
                                                </div>
                                            </div>
                                            <div class=form-row>
                                                <div class="form-group col-md-12">
                                                  <label>เลขบัตรประชาชน</label><span class="error">*</span>
                                                  <input type="text" name="sparepart-idcard" id="sparepart-idcard" class="form-control" placeholder="เลขบัตรประชาชน" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  <label>ที่อยู่</label><span class="error">*</span>
                                                  <textarea class="form-control" name="sparepart-address" id="sparepart-address" placeholder="ที่อยู่" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-4">
                                                <label>จังหวัด</label><span class="error">*</span>
                                                <select class="form-control" name="sparepart-provinceId" id="sparepart-provinceId"></select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>อำเภอ</label><span class="error">*</span>
                                                <select class="form-control" name="sparepart-districtId" id="sparepart-districtId"></select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>ตำบล</label><span class="error">*</span>
                                                <select class="form-control" name="sparepart-subdistrictId" id="sparepart-subdistrictId"></select>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-4">
                                                <label>รหัสไปรษณีย์</label><span class="error">*</span>
                                                <input type="text" class="form-control" name="sparepart-zipCode" id="sparepart-postCode" placeholder="รหัสไปรษณีย์">
                                              </div>
                                            </div>
                                          </form>
                                        </div>

                                        <div id="role-1" style="display:none">
                                          <h5>ยืนยันการสร้าง</h5>
                                          <form id="form-role-1">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" name="verified" id="verified">
                                              <label class="form-check-label" for="exampleCheck1">ยืนยันการสร้างผู้ดูแลระบบ <label id="verified-error" class="error" for="verified"></label></label>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                      </div>
                    

                  </div>
                </div>
            </div>
          </div>
       </section>

