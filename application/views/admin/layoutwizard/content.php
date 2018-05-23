
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="pusher">
        <div class="ui stackable one column grid container">
          <div class="column ui stacked segment container register step">
            <!-- SmartWizard html -->
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Step 1<br /><small>Email Address</small></a></li>
                    <li><a href="#step-2">Step 2<br /><small>Name</small></a></li>
                    <li><a href="#step-3">Step 3<br /><small>Address</small></a></li>
                </ul>

                <div>
                      <div id="step-1">
                          <h4>ข้อมูลส่วนตัว</h4>
                          <div id="form-step-0" role="form" data-toggle="validator">
                              <form id="form-1">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>ชื่อ</label><span class="error">*</span>
                                    <input type="text" name="firstname" class="form-control" placeholder="ชื่อ">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>นามสกุล</label><span class="error">*</span>
                                    <input type="text" name="lastname" class="form-control" placeholder="นามสกุล">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>ที่อยู่:</label><span class="error">*</span>
                                  <textarea class="form-control" name="address" rows="3"></textarea>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>จังหวัด</label><span class="error">*</span>
                                    <select class="form-control" name="provinceId">
                                      <option>เลือกจังหวัด</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>อำเภอ</label><span class="error">*</span>
                                    <select class="form-control" name="districtId">
                                      <option>เลือกอำเภอ</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>ตำบล</label><span class="error">*</span>
                                    <select class="form-control" name="subdistrictId">
                                      <option>เลือกตำบล</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" name="phone1" class="form-control" placeholder="เบอร์โทรศัพท์">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                                    <input type="text" name="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้">
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                    
                      <div id="step-2">
                          <h4>ข้อมูลส่วนตัว</h4>
                          <div id="form-step-1" role="form" data-toggle="validator">
                            <form id="form-2">
                              <div class="form-group text-center">
                                <select id="role" class="image-picker show-html" name="role">
                                  <option value=""></option>
                                  <option data-img-src="<?=base_url("public/image/role/4.jpg");?>" value="4" selected>ผู้ใช้งาน</option>
                                  <option data-img-src="<?=base_url("public/image/role/3.jpg");?>" value="3">อู่</option>
                                  <option data-img-src="<?=base_url("public/image/role/2.jpg");?>" value="2">ร้านอะไหล่</option>
                                </select>
                              </div>
                            </form>
                          </div>
                      </div>

                      <div id="step-3">
                        <div id="form-step-2" role="form" data-toggle="validator">
                          <div id="role-4">
                          <h5>ข้อมูลรถ</h5>
                            <form id="form-role-4">  
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>ทะเบียนรถ</label><span class="error">*</span>
                                    <input type="text" name="licensePlate" class="form-control" placeholder="ทะเบียนรถ">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>เลขไมล์</label><span class="error">*</span>
                                    <input type="text" name="mileage" class="form-control" placeholder="เลขไมล์">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>สี</label><span class="error">*</span>
                                    <input type="text" name="colorCar" class="form-control" placeholder="สีรถ">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>รูปด้านหน้ารถ </label>
                                    <input type="file" class="form-control-file" name="frontPicture" id="frontPicture">
                                    <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>รูปด้านหลังรถ </label>
                                    <input type="file" class="form-control-file" name="backPicture" id="backPicture">
                                    <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>รูปป้ายวงกลม </label>
                                    <input type="file" class="form-control-file" name="circlesignPicture" id="circlesignPicture">
                                    <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                  </div>
                                </div>
                                
                            </form>
                          </div>

                            <hr>
                          <div id="role-3">
                          <h5>ข้อมูลอู่</h5>
                            <form id="form-role-3"> 
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label>ชื่ออู่</label><span class="error">*</span>
                                      <input type="text" class="form-control" name="garageName" placeholder="ชื่ออู่" >
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>ใบทะเบียนการค้า</label>
                                      <input type="text" class="form-control" name="carTradeRegistration" placeholder="ใบทะเบียนการค้า">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label>ที่อยู่</label><span class="error">*</span>
                                      <input type="text" class="form-control" name="addressGarage" placeholder="ที่อยู่">
                                    </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>จังหวัด</label><span class="error">*</span>
                                    <select class="form-control" name="provinceId">
                                      <option>เลือกจังหวัด</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>อำเภอ</label><span class="error">*</span>
                                    <select class="form-control" name="districtId">
                                      <option>เลือกอำเภอ</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>ตำบล</label><span class="error">*</span>
                                    <select class="form-control" name="subdistrictId">
                                      <option>เลือกตำบล</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>รหัสไปรษณีย์</label><span class="error">*</span>
                                    <input type="text" class="form-control" name="zipCode" placeholder="รหัสไปรษณีย์">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>ละติจูด</label>
                                    <input type="text" class="form-control" name="latitude" placeholder="ละติจูด">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>ลองจิจูด</label>
                                    <input type="text" class="form-control" name="longtitude" placeholder="ลองจิจูด">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>คำอธิบาย</label><span class="error">*</span>
                                  <textarea class="form-control" name="comment" rows="3"></textarea>
                                </div>
                                <label>สิ่งอำนวยความสะดวก</label>
                                <div class="form-row"> 
                                  <div class="form-group">
                                    <div class="form-check panding">
                                      <input class="form-check-input" type="checkbox" id="box1" value="1">
                                      <label class="form-check-label">Wifi</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="box2" value="2">
                                      <label class="form-check-label">ห้องพัก-เเอร์</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="box3" value="3">
                                      <label class="form-check-label">ห้องพักพัดลม</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="box4" value="4">
                                      <label class="form-check-label">ที่นั่งรอ-พัดลม</label>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="other" placeholder="อื่นๆ">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label>รูปภาพของอู่ </label>
                                    <input type="file" class="form-control-file" name="circlesignPicture" id="circlesignPicture">
                                    <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                                  </div>
                                </div>
                              
                            </form>
                          </div>

                            <hr>
                          <div id="role-2">
                          <h5>ข้อมูลร้านอะไหล่</h5>
                            <form id="form-role-2"> 
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label>ชื่อร้านค้าส่ง</label><span class="error">*</span>
                                      <input type="text" name="nameAccessory" class="form-control" placeholder="ชื่ออู">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>ใบทะเบียนการค้า</label><span class="error">*</span>
                                      <input type="text" name="accessoryTradeRegistration" class="form-control" placeholder="ใบทะเบียนการค้">
                                    </div>
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
          