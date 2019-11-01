<div class="container">
    <div class="section-title">
        <h3>ลงทะเบียน<span class="alternate">ร้านค้าส่งคาร์ใจดี</span></h3>
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
                    <input type="text" class="form-control main" name="firstname_user" id="firstname_user" maxlength="35" placeholder="ชื่อ">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">นามสกุล</label><span class="error">*</span>
                    <input type="text" class="form-control main" name="lastname_user" id="lastname_user" maxlength="35" placeholder="นามสกุล">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required" for="mechanic">เลขรหัสบัตรประชาชน</label><span class="error">*</span>
                    <input type="number" class="form-control main" name="personalid" id="personalid"  placeholder="เลขรหัสบัตรประชาชน">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                    <input type="number" class="form-control main" name="phone1" id="phone1" placeholder="เบอร์โทรศัพท์">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="user_profile">เบอร์โทรศัพท์</label>
                    <input type="number" class="form-control main" name="phone2" id="phone2" placeholder="เบอร์โทรศัพท์">
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-2">
                <button class="btn btn-main-md width-100p bg-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> ก่อนหน้า </button>
            </div>
            <div class="col-2">
                <button class="btn btn-main-md width-100p active"><i class="fa fa-chevron-right" aria-hidden="true"></i> ถัดไป </button>
            </div>
        </div>
        <br>
        

        <h4> ที่อยู่ผู้ใช้งาน </h4>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">บ้านเลขที่</label><span class="error">*</span>
                    <input type="text" class="form-control main" name="hno_user" id="hno_user" maxlength="20" placeholder="บ้านเลขที่">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="user_profile">ซอย</label>
                    <input type="text" class="form-control main" name="alley_user" id="alley_user" maxlength="20" placeholder="ซอย">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="user_profile">ถนน</label>
                    <input type="text" class="form-control main" name="road_user" id="road_user" maxlength="20" placeholder="ถนน">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="user_profile">หมู่ที่</label>
                    <input type="text" class="form-control main" name="village_user" id="village_user" maxlength="20" placeholder="หมู่ที่">
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
                    <input type="number" class="form-control main" name="postCode_user" id="postCode_user" placeholder="รหัสไปรษณีย์">
                </div>
            </div>
        </div>
        <br>

        <h4> รายละเอียดเจ้าของร้านค้าส่งคาร์ใจดี </h4>
        <br>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">คำนำหน้า</label><span class="error">*</span>
                    <select class="form-control main" name="titleName_sparepart" id="titleName_sparepart">
                        <option value="">คำนำหน้า</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-label required">ชื่อ</label><span class="error">*</span>
                    <input type="text" class="form-control main" name="firstname_sparepart" id="firstname_sparepart" maxlength="35" placeholder="ชื่อ">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-label required">นามสกุล</label><span class="error">*</span>
                    <input type="text" class="form-control main" name="lastname_sparepart" id="lastname_sparepart" maxlength="35" placeholder="นามสกุล">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ">
                <div class="form-group">
                    <label class="form-label required">ชื่อร้านอะไหล่</label><span class="error">*</span>   
                    <input type="text" class="form-control main" name="sparepartname" id="sparepartname" placeholder="ชื่ออู่ซ่อมรถ">
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                    <label class="form-label required">เบอร์โทรศัพท์</label><span class="error">*</span>
                    <input type="number" class="form-control main" name="phone_sparepart" id="phone_sparepart" placeholder="เบอร์โทรศัพท์">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
                    <input type="number" class="form-control main" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
                </div>
            </div>
        </div>
        <br>

        <h4> ที่อยู่ร้านค้าคาร์ใจดี </h4>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label required">บ้านเลขที่</label><span class="error">*</span>
                    <input type="text" class="form-control main" name="hno_sparepart" id="hno_sparepart" placeholder="บ้านเลขที่">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="garage">ซอย</label>
                    <input type="text" class="form-control main" name="alley_sparepart" id="alley_sparepart" placeholder="ซอย">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="garage">ถนน</label>
                    <input type="text" class="form-control main" name="road_sparepart" id="road_sparepart" placeholder="ถนน">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="garage">หมู่ที่</label>
                    <input type="text" class="form-control main" name="village_sparepart" id="village_sparepart" placeholder="หมู่ที่">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required">จังหวัด</label><span class="error">*</span>
                    <select class="form-control main" name="sparepart_provinceId" id="sparepart_provinceId">
                        <!-- <option>จังหวัด</option> -->
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required">อำเภอ</label><span class="error">*</span>
                    <select class="form-control main" name="sparepart_districtId" id="sparepart_districtId">
                        <!-- <option>อำเภอ</option> -->
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required">ตำบล</label><span class="error">*</span>
                    <select class="form-control main" name="sparepart_subdistrictId" id="sparepart_subdistrictId">
                        <!-- <option>ตำบล</option> -->
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label required" for="garage">รหัสไปรษณีย์</label><span class="error">*</span>
                    <input class="form-control main" type="number" name="postCode_sparepart" id="postCode_sparepart" placeholder="รหัสไปรษณีย์">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label required" for="garage">ละติจูด</label><span class="error">*</span>
                    <input class="form-control main" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label required" for="garage">ลองติจูด</label><span class="error">*</span>
                    <input class="form-control main" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <br>
                    <button type="button" class="btn btn-main-md width-100p active" id="coordinates" name="coordinates" onclick="getLocation()" >ดึงพิกัด</button>
                </div>
            </div>
        </div>
        <br>

        <h4> สมัครใช้งานระบบ </h4>
        <br>
        <form id="login">
            <div class="row">
                <div class="col-md-4">    
                    <div class="form-group">
                        <label class="form-label required" for="users">ชื่อผู้ใช้งาน</label><span class="error">*</span>
                        <input type="text" class="form-control main" name="username" id="username" placeholder="ชื่อผู้ใช้งาน">
                    </div>
                </div>
                <div class="col-md-4">    
                    <div class="form-group">
                        <label class="form-label required" for="users">เบอร์โทรศัพท์</label><span class="error">*</span>
                        <input type="number" class="form-control main" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
                    </div>
                </div>
                <div class="col-md-4">    
                    <div class="form-group">
                        <label class="form-label required" for="users">อีเมล์</label>
                        <input type="email" class="form-control main" name="email" id="email" placeholder="อีเมล์">
                    </div>
                </div>
                <div class="col-md-6">    
                    <div class="form-group">
                        <label class="form-label required" for="users">รหัสผ่าน</label><span class="error">*</span>
                        <input type="password" class="form-control main" name="password" id="password" placeholder="รหัสผ่าน">
                    </div>
                </div>
                <div class="col-md-6">    
                    <div class="form-group">
                        <label class="form-label required" for="users">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control main" name="checkpassword" id="checkpassword" placeholder="ยืนยันรหัสผ่าน">
                    </div>
                </div>
            </div>
        </form>
        <br>

    </form>
</div>


