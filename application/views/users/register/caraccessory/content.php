<div class="container">
    <div class="section-title">
        <h3>ลงทะเบียน<span class="alternate">ร้านค้าส่งคาร์ใจดี</span></h3>
    </div>
    <form id="rigister" class="signup-form">
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
                    <input type="text" class="form-control main-md btn-ga" name="firstname_user" id="firstname_user"
                        maxlength="35" placeholder="ชื่อ">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">นามสกุล</label><span class="error">*</span>
                    <input type="text" class="form-control main-md btn-ga" name="lastname_user" id="lastname_user"
                        maxlength="35" placeholder="นามสกุล">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required" for="mechanic">เลขรหัสบัตรประชาชน</label><span
                        class="error">*</span>
                    <input type="number" class="form-control main-md btn-ga" name="personalid" id="personalid"
                        placeholder="เลขรหัสบัตรประชาชน">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label required" for="user_profile">เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span
                        class="error">*</span>
                    <input type="number" class="form-control main-md btn-ga" name="phone1" id="phone1"
                        placeholder="เบอร์โทรศัพท์">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="user_profile">เบอร์โทรศัพท์</label>
                    <input type="number" class="form-control main-md btn-ga" name="phone2" id="phone2"
                        placeholder="เบอร์โทรศัพท์">
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
                        <label class="form-label required" for="user_profile">บ้านเลขที่</label><span
                            class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="hno_user" id="hno_user"
                            maxlength="20" placeholder="บ้านเลขที่">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user_profile">ซอย</label>
                        <input type="text" class="form-control main-md btn-ga" name="alley_user" id="alley_user"
                            maxlength="20" placeholder="ซอย">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user_profile">ถนน</label>
                        <input type="text" class="form-control main-md btn-ga" name="road_user" id="road_user"
                            maxlength="20" placeholder="ถนน">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user_profile">หมู่ที่</label>
                        <input type="text" class="form-control main-md btn-ga" name="village_user" id="village_user"
                            maxlength="20" placeholder="หมู่ที่">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">จังหวัด</label><span
                            class="error">*</span>
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
                        <label class="form-label required" for="user_profile">รหัสไปรษณีย์</label><span
                            class="error">*</span>
                        <input type="number" class="form-control main-md btn-ga" name="postCode_user" id="postCode_user"
                            placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-1 btn-show"></p>
        <br>

        <div class="hidden form-active-2">
            <h4> รายละเอียดเจ้าของร้านค้าส่งคาร์ใจดี </h4>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label required" for="user_profile">คำนำหน้า</label><span
                            class="error">*</span>
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
                        <input type="text" class="form-control main-md btn-ga" name="firstname_sparepart"
                            id="firstname_sparepart" maxlength="35" placeholder="ชื่อ">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="form-label required">นามสกุล</label><span class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="lastname_sparepart"
                            id="lastname_sparepart" maxlength="35" placeholder="นามสกุล">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="form-group">
                        <label class="form-label required">ชื่อร้านอะไหล่</label><span class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="sparepartname" id="sparepartname"
                            placeholder="ชื่ออู่ซ่อมรถ">
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group">
                        <label class="form-label required">เบอร์โทรศัพท์</label><span class="error">*</span>
                        <input type="number" class="form-control main-md btn-ga" name="phone_sparepart"
                            id="phone_sparepart" placeholder="เบอร์โทรศัพท์">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label required">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
                        <input type="number" class="form-control main-md btn-ga" name="businessRegistration"
                            id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-2 btn-show"></p>
        <br>

        <div class="hidden form-active-3">
            <h4> ที่อยู่ร้านค้าคาร์ใจดี </h4>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required">บ้านเลขที่</label><span class="error">*</span>
                        <input type="text" class="form-control main-md btn-ga" name="hno_sparepart" id="hno_sparepart"
                            placeholder="บ้านเลขที่">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="garage">ซอย</label>
                        <input type="text" class="form-control main-md btn-ga" name="alley_sparepart"
                            id="alley_sparepart" placeholder="ซอย">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="garage">ถนน</label>
                        <input type="text" class="form-control main-md btn-ga" name="road_sparepart" id="road_sparepart"
                            placeholder="ถนน">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="garage">หมู่ที่</label>
                        <input type="text" class="form-control main-md btn-ga" name="village_sparepart"
                            id="village_sparepart" placeholder="หมู่ที่">
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
                        <input class="form-control main-md btn-ga" type="number" name="postCode_sparepart"
                            id="postCode_sparepart" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="garage">ละติจูด</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" type="text" name="latitude" id="latitude"
                            placeholder="ละติจูด">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label required" for="garage">ลองติจูด</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" type="text" name="longtitude" id="longtitude"
                            placeholder="ลองติจูด">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <br>
                        <button type="button" class="btn btn-main-md width-100p active" id="coordinates"
                            name="coordinates" onclick="getLocation()">ดึงพิกัด</button>
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-3 btn-show"></p>
        <br>

        <div class="hidden form-active-4">
            <h4> บัญชีที่ใช้ในการโอนเงิน </h4>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="garage">ชื่อธนาคาร</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" name="bank_name" id="bank_name" type="text"
                            placeholder="ชื่อธนาคาร">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="garage">เลขบัญชี</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" name="bank_id" id="bank_id" type="text"
                            placeholder="เลขที่บัญชี">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="garage">ชื่อเจ้าของบัญชี</label><span class="error">*</span>
                        <input class="form-control main-md btn-ga" name="bank_owner" id="bank_owner" type="text"
                            placeholder="ชื่อเจ้าของบัญชี">
                    </div>
                </div>
            </div>
        </div>
        <p class="form-show-4 btn-show"></p>
        <br>

        <div class="hidden form-active-5">
            <h4> สมัครใช้งานระบบ </h4>
            <br>
            <form id="login">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label required" for="users">ชื่อผู้ใช้งาน</label><span
                                class="error">*</span>
                            <input type="text" class="form-control main-md btn-ga" name="username" id="username"
                                placeholder="ชื่อผู้ใช้งาน">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label required" for="users">เบอร์โทรศัพท์</label><span
                                class="error">*</span>
                            <input type="number" class="form-control main-md btn-ga" name="phone" id="phone"
                                placeholder="เบอร์โทรศัพท์">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label required" for="users">อีเมล์</label>
                            <input type="email" class="form-control main-md btn-ga" name="email" id="email"
                                placeholder="อีเมล์">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label required" for="users">รหัสผ่าน</label><span class="error">*</span>
                            <input type="password" class="form-control main-md btn-ga" name="password" id="password"
                                placeholder="รหัสผ่าน">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label required" for="users">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control main-md btn-ga" name="checkpassword"
                                id="checkpassword" placeholder="ยืนยันรหัสผ่าน">
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