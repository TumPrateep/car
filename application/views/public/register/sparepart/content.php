<div class="shop">
	<div class="container">
		<h3>ลงทะเบียนร้านอะไห่</h3>
		<div class="row">
			
            <!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
            <div class="col-md-12">
            <form  id="rigister" class="signup-form">
                <h3>
                    <span class="icon"><i class="ti-id-badge"></i></span>
                    <span class="title_text">ผู้ใช้งาน</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">กรอกข้อมูล ผู้ใช้งาน: </span>
                        <span class="step-number">Step 1 / 3</span>
                    </legend>
                    <div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label class="form-label required" for="user_profile">คำนำหน้า</label>
								<select class="form-control" name="titleName_user" id="titleName_user">
									<option value="">คำนำหน้า</option>
									<option value="นาย">นาย</option>
									<option value="นาง">นาง</option>
									<option value="นางสาว">นางสาว</option>
								</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label required" for="user_profile">ชื่อ</label>
								<input type="text" class="form-control" name="firstname_user" id="firstname_user" maxlength="35" placeholder="ชื่อ">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label required" for="user_profile">นามสกุล</label>
								<input type="text" class="form-control" name="lastname_user" id="lastname_user" maxlength="35" placeholder="นามสกุล">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="mechanic">เลขรหัสบัตรประชาชน</label>
								<input type="number" class="form-control" name="personalid" id="personalid"  placeholder="เลขรหัสบัตรประชาชน">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="user_profile">เบอร์โทรศัพท์ที่สามารถติดต่อได้</label>
								<input type="number" class="form-control" name="phone1" id="phone1" placeholder="เบอร์โทรศัพท์">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="user_profile">เบอร์โทรศัพท์</label>
								<input type="number" class="form-control" name="phone2" id="phone2" placeholder="เบอร์โทรศัพท์">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="user_profile">บ้านเลขที่</label>
								<input type="text" class="form-control" name="hno_user" id="hno_user" maxlength="20" placeholder="บ้านเลขที่">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="user_profile">ซอย</label>
								<input type="text" class="form-control" name="alley_user" id="alley_user" maxlength="20" placeholder="ซอย">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="user_profile">ถนน</label>
								<input type="text" class="form-control" name="road_user" id="road_user" maxlength="20" placeholder="ถนน">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="user_profile">หมู่ที่</label>
								<input type="text" class="form-control" name="village_user" id="village_user" maxlength="20" placeholder="หมู่ที่">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="user_profile">จังหวัด</label>
								<select class="form-control" name="provinceId_user" id="provinceId_user">
									<!-- <option>จังหวัด</option> -->
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="user_profile">อำเภอ</label>
								<select class="form-control" name="districtId_user" id="districtId_user">
									<!-- <option>อำเภอ</option> -->
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="user_profile">ตำบล</label>
								<select class="form-control" name="subdistrictId_user" id="subdistrictId_user">
									<!-- <option>ตำบล</option> -->
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="user_profile">รหัสไปรษณีย์</label>
								<input type="number" class="form-control" name="postCode_user" id="postCode_user" placeholder="รหัสไปรษณีย์">
							</div>
						</div>
					</div>
                </fieldset>


                <h3>
                    <span class="icon"><i class="ti-car"></i></span>
                    <span class="title_text">ร้านอะไหล่</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">กรอกข้อมูล ร้านอะไหล่: </span>
                        <span class="step-number">Step 2 / 3</span>
                    </legend>
                    <div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label class="form-label required" for="user_profile">คำนำหน้า</label>
								<select class="form-control" name="titleName_sparepart" id="titleName_sparepart">
									<option value="">คำนำหน้า</option>
									<option value="นาย">นาย</option>
									<option value="นาง">นาง</option>
									<option value="นางสาว">นางสาว</option>
								</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label required">ชื่อ</label>
								<input type="text" class="form-control" name="firstname_sparepart" id="firstname_sparepart" maxlength="35" placeholder="ชื่อ">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label required">นามสกุล</label>
								<input type="text" class="form-control" name="lastname_sparepart" id="lastname_sparepart" maxlength="35" placeholder="นามสกุล">
							</div>
						</div>
					</div>
                    <div class="row">
		                <div class="col-md-4 ">
							<div class="form-group">
								<label class="form-label required">ชื่อร้านอะไหล่</label>
								<input type="text" class="form-control" name="sparepartname" id="sparepartname" placeholder="ชื่ออู่ซ่อมรถ">
							</div>
						</div>
						<div class="col-md-4 ">
							<div class="form-group">
								<label class="form-label required">เบอร์โทรศัพท์</label>
								<input type="number" class="form-control" name="phone_sparepart" id="phone_sparepart" placeholder="เบอร์โทรศัพท์">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required">หมายเลขทะเบียนการค้า</label>
								<input type="number" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="for-time-date"><h4>ข้อมูลที่อยู่</h4></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required">บ้านเลขที่</label>
								<input type="text" class="form-control" name="hno_sparepart" id="hno_sparepart" placeholder="บ้านเลขที่">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="garage">ซอย</label>
								<input type="text" class="form-control" name="alley_sparepart" id="alley_sparepart" placeholder="ซอย">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="garage">ถนน</label>
								<input type="text" class="form-control" name="road_sparepart" id="road_sparepart" placeholder="ถนน">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="garage">หมู่ที่</label>
								<input type="text" class="form-control" name="village_sparepart" id="village_sparepart" placeholder="หมู่ที่">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required">จังหวัด</label>
								<select class="form-control" name="sparepart_provinceId" id="sparepart_provinceId">
									<!-- <option>จังหวัด</option> -->
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required">อำเภอ</label>
								<select class="form-control" name="sparepart_districtId" id="sparepart_districtId">
									<!-- <option>อำเภอ</option> -->
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required">ตำบล</label>
								<select class="form-control" name="sparepart_subdistrictId" id="sparepart_subdistrictId">
									<!-- <option>ตำบล</option> -->
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="garage">รหัสไปรษณีย์</label>
								<input class="form-control" type="number" name="postCode_sparepart" id="postCode_sparepart" placeholder="รหัสไปรษณีย์">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="garage">ละติจูด</label>
								<input class="form-control" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="garage">ลองติจูด</label>
								<input class="form-control" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="garage">ดึงพิกัด</label>
								<button type="button" class="btn btn-primary" id="coordinates" name="coordinates" onclick="getLocation()">ดึงพิกัด</button>
							</div>
						</div>
					</div>
                </fieldset>


                <h3>
                    <span class="icon"><i class="ti-user"></i></span>
                    <span class="title_text">ผู้ใช้งาน</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">กรอกข้อมูล ผู้ใช้งาน: </span>
                        <span class="step-number">Step 3 / 3</span>
                    </legend>
                    <div class="container-form-user">
	                    <form id="login">
						<div class="form-group">
							<label class="form-label required" for="users">ชื่อผู้ใช้งาน</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน">
						</div>
						<div class="form-group">
							<label class="form-label required" for="users">เบอร์โทรศัพท์</label>
							<input type="number" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
						</div>
						<div class="form-group">
							<label class="form-label required" for="users">อีเมล์</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="อีเมล์">
						</div>
						<div class="form-group">
							<label class="form-label required" for="users">รหัสผ่าน</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน">
						</div>
						<div class="form-group">
							<label class="form-label required" for="users">ยืนยันรหัสผ่าน</label>
							<input type="password" class="form-control" name="checkpassword" id="checkpassword" placeholder="ยืนยันรหัสผ่าน">
						</div>
						<!-- <button type="submit" class="btn btn-success btn-block">บันทึก</button> -->
						</form>
					</div>
                </fieldset>

                    
            </form>
            </div>
        
		</div>
	</div>
</div>



