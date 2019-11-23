<div class="container">
    <div class="section-title">
        <h3>ลงทะเบียน<span class="alternate">ศูนย์บริการคาร์ใจดี</span></h3>
    </div>
    <form  id="rigister" class="signup-form">
        <h4> ข้อมูลผู้ใช้งาน </h4>
        <br>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>คำนำหน้า</label><span class="error">*</span>
                    <select class="form-control main" name="titleName_user" id="titleName_user">
                        <option value="">คำนำหน้า</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">ชื่อ</label><span class="error">*</span>
                    <input type="text" class="form-control main-md btn-ga" name="firstname_user" id="firstname_user" maxlength="35" placeholder="ชื่อ">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">นามสกุล</label><span class="error">*</span>
                    <input type="text" class="form-control main-md btn-ga" name="lastname_user" id="lastname_user" maxlength="35" placeholder="นามสกุล">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required" for="mechanic">เลขรหัสบัตรประชาชน</label><span class="error">*</span>
                    <input type="number" class="form-control main-md btn-ga" name="personalid" id="personalid"  placeholder="เลขรหัสบัตรประชาชน">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                    <input type="number" class="form-control main-md btn-ga" name="phone1" id="phone1" minlength="9" placeholder="เบอร์โทรศัพท์">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="user_profile">เบอร์โทรศัพท์</label>
                    <input type="number" class="form-control main-md btn-ga" name="phone2" id="phone2" minlength="9" placeholder="เบอร์โทรศัพท์">
                </div>
            </div>
        </div>
        <p class="form-show-0 btn-show"></p>
        <br>
        
        <div class="hidden form-active-1">
        <h4> ที่อยู่ผู้ใช้งาน </h4>
        <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">บ้านเลขที่</label><span class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="hno_user" id="hno_user"  maxlength="20" placeholder="บ้านเลขที่">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user_profile">ซอย</label>
                        <input type="text" class="form-control main-md btn-ga" name="alley_user" id="alley_user" maxlength="20" placeholder="ซอย">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user_profile">ถนน</label>
                        <input type="text" class="form-control main-md btn-ga" name="road_user" id="road_user" maxlength="20" placeholder="ถนน">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user_profile">หมู่ที่</label>
                        <input type="text" class="form-control main-md btn-ga" name="village_user" id="village_user" maxlength="20" placeholder="หมู่ที่">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">จังหวัด</label><span class="error">*</span>
                        <select class="form-control main" name="provinceId_user" id="provinceId_user">
                            <!-- <option>จังหวัด</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">อำเภอ</label><span class="error">*</span>
                        <select class="form-control main" name="districtId_user" id="districtId_user">
                            <!-- <option>อำเภอ</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">ตำบล</label><span class="error">*</span>
                        <select class="form-control main" name="subdistrictId_user" id="subdistrictId_user">
                            <!-- <option>ตำบล</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">รหัสไปรษณีย์</label><span class="error">*</span>
                        <input type="number" class="form-control main-md btn-ga" name="postCode_user" id="postCode_user" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-1 btn-show"></p>
        <br>

        <div class="hidden form-active-2">
        <h4> รายละเอียดของศูนย์บริการคาร์ใจดี </h4>
        <br>
        <div class="row p-t-20">
            <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">รูปหน้ารถ</label>
                    <div class="image-editor border-image">
                        <input type="file" class="cropit-image-input border-input" name="tempImage">
                        <div class="cropit-preview"></div>
                        <div class="image-size-label"><span class="pad-right"></span>ปรับขนาด</div>
                        <input type="range" class="cropit-image-zoom-input border-input">
                        <input type="hidden" name="garagePicture" id="garagePicture" class="hidden-image-data" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label required">ชื่ออู่ซ่อมรถ</label><span class="error">*</span>
                    <input type="text" class="form-control main-md btn-ga" name="garagename" id="garagename"  placeholder="ชื่ออู่ซ่อมรถ">
                </div>
                <div class="form-group">
                    <label class="form-label required">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
                    <input type="text" class="form-control main-md btn-ga" name="businessRegistration" id="businessRegistration"  placeholder="หมายเลขทะเบียนการค้า">
                </div>
                <div class="form-group">
                    <label class="form-label required">เบอร์โทรศัพท์</label><span class="error">*</span>
                    <input type="text" class="form-control main-md btn-ga" name="phone_garage" id="phone_garage" minlength="9" placeholder="เบอร์โทรศัพท์">
                </div>
                <div class="form-group">
                    <label>ความเชี่ยวชาญรถ</label><span class="error">*</span>
                    <select class="form-control main" name="brandId" id="brandId"></select>
                </div>
            </div>
        </div> 
        </div>
        <p class="form-show-2 btn-show"></p>
        <br>

        <div class="hidden form-active-3">
        <h4> การบริการของศูนย์บริการคาร์ใจดี </h4>
        <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="check[]" id="change_spare"  type="checkbox" value="11">เปลี่ยนอะไหล่</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="check[]" id="change_tire"  type="checkbox" value="12">เปลี่ยนยางรถ</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="check[]" id="change_lubricator"  type="checkbox" value="13">เปลี่ยนน้ำมันเครื่อง</label>
                    </div>
                </div> 
            </div>
        </div><br>
        <p class="form-show-3 btn-show"></p>
        <br>

        <div class="hidden form-active-4">
        <h4> ช่วงเวลาของศูนย์บริการคาร์ใจดี </h4>
        <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label required">ช่วงเวลาเปิด</label><span class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="timestart" id="timestart" placeholder="06:00" value="06:00">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="garage">ช่วงเวลาปิด</label>
                        <input type="text" class="form-control main-md btn-ga" name="timeend" id="timeend" placeholder="22:00" value="22:00">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="monday" id="monday" type="checkbox" value="1">จันทร์</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label"  for="garage">
                        <input class="form-check-input" name="tuesday" id="tuesday" type="checkbox" value="2">อังคาร</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="wednesday" id="wednesday" type="checkbox" value="3">พุธ</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="thursday" id="thursday" type="checkbox" value="4">พฤหัสบดี</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="friday" id="friday" type="checkbox" value="5">ศุกร์</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="saturday" id="saturday" type="checkbox" value="6">เสาร์</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="sunday" id="sunday" type="checkbox" value="7">อาทิตย์</label>
                    </div>
                </div>
            </div>
        </div><br>
        <p class="form-show-4 btn-show"></p>
        <br>

        <div class="hidden form-active-5">
        <h4> ที่อยู่ศูนย์บริการคาร์ใจดี </h4>
        <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required">บ้านเลขที่</label><span class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="hno_garage" id="hno_garage" placeholder="บ้านเลขที่">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="garage">ซอย</label>
                        <input type="text" class="form-control main-md btn-ga" name="alley_garage" id="alley_garage" placeholder="ซอย">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="garage">ถนน</label>
                        <input type="text" class="form-control main-md btn-ga" name="road_garage" id="road_garage" placeholder="ถนน">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="garage">หมู่ที่</label>
                        <input type="text" class="form-control main-md btn-ga" name="village_garage" id="village_garage" placeholder="หมู่ที่">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label required">จังหวัด</label><span class="error">*</span>
                        <select class="form-control main" name="provinceId_garage" id="provinceId_garage">
                            <!-- <option>จังหวัด</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label required">อำเภอ</label><span class="error">*</span>
                        <select class="form-control main" name="districtId_garage" id="districtId_garage">
                            <!-- <option>อำเภอ</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label required">ตำบล</label><span class="error">*</span>
                        <select class="form-control main" name="subdistrictId_garage" id="subdistrictId_garage">
                            <!-- <option>ตำบล</option> -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="garage">รหัสไปรษณีย์</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" type="number" name="postCode_garage" id="postCode_garage" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="garage">ละติจูด</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="garage">ลองติจูด</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <br>
                        <button type="button" class="btn btn-main-md width-100p active" id="coordinates" name="coordinates" onclick="getLocation()" >ดึงพิกัด</button>
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-5 btn-show"></p>
        <br>

        <div class="hidden form-active-6">
        <h4> สิ่งอำนวยความสะดวกของศูนย์บริการคาร์ใจดี </h4>
        <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="Wifi" id="Wifi" value="1" type="checkbox">Wifi</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label"  for="garage">
                        <input class="form-check-input" name="roomfan" id="roomfan" value="2" type="checkbox">ห้องพักพัดลม</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="roomAir" id="roomAir" value="3" type="checkbox">ห้องพักเเอร์</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label" for="garage">
                        <input class="form-check-input" name="snack" id="snack" value="4" type="checkbox">ห้องน้ำ</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control main-md btn-ga" name="Otherfacilities" id="Otherfacilities" placeholder="สิ่งอำนวยความสะดวกอื่นๆ">
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-6 btn-show"></p>
        <br>

        <div class="hidden form-active-7">
        <h4> สมัครใช้งานระบบ </h4>
        <br>
            <form id="login">
                <div class="row">
                    <div class="col-md-4">    
                        <div class="form-group">
                            <label class="form-label required" for="users">ชื่อผู้ใช้งาน</label><span class="error">*</span>
                            <input type="text" class="form-control main-md btn-ga" name="username" id="username" placeholder="ชื่อผู้ใช้งาน">
                        </div>
                    </div>
                    <div class="col-md-4">    
                        <div class="form-group">
                            <label class="form-label required" for="users">เบอร์โทรศัพท์</label><span class="error">*</span>
                            <input type="number" class="form-control main-md btn-ga" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
                        </div>
                    </div>
                    <div class="col-md-4">    
                        <div class="form-group">
                            <label class="form-label required" for="users">อีเมล์</label>
                            <input type="email" class="form-control main-md btn-ga" name="email" id="email" placeholder="อีเมล์">
                        </div>
                    </div>
                    <div class="col-md-6">    
                        <div class="form-group">
                            <label class="form-label required" for="users">รหัสผ่าน</label><span class="error">*</span>
                            <input type="password" class="form-control main-md btn-ga" name="password" id="password" placeholder="รหัสผ่าน">
                        </div>
                    </div>
                    <div class="col-md-6">    
                        <div class="form-group">
                            <label class="form-label required" for="users">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control main-md btn-ga" name="checkpassword" id="checkpassword" placeholder="ยืนยันรหัสผ่าน">
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>

    </form>
</div>



