<div class="shop">
	<div class="container">
		<h3>ลงทะเบียนอู่ซ่อมรถ</h3>
		<div class="row">
			
            <!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
            <div class="col-md-12">
            <form  id="rigister" class="signup-form">
                <h3>
                    <span class="icon"><i class="ti-id-badge"></i></span>
                    <span class="title_text">เจ้าของอู่</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">กรอกข้อมูล เจ้าของอู่: </span>
                        <span class="step-number">Step 1 / 3</span>
                    </legend>
                    <div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label class="form-label required" for="user_profile">คำนำหน้า</label>
								<select class="form-control" name="titleName_user" id="titleName_user">
									<option value=""></option>
									<option value="1">นาย</option>
									<option value="2">นาง</option>
									<option value="3">นางสาว</option>
								</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label required" for="user_profile">ชื่อ</label>
								<input type="text" class="form-control" name="firstname_user" id="firstname_user" placeholder="ชื่อ">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label required" for="user_profile">นามสกุล</label>
								<input type="text" class="form-control" name="lastname_user" id="lastname_user" placeholder="นามสกุล">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="mechanic">เลขรหัสบัตรประชาชน</label>
								<input type="number" class="form-control" name="personalid" id="personalid" placeholder="เลขรหัสบัตรประชาชน">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="mechanic">ประสบการณ์</label>
								<input type="number" class="form-control" name="exp" id="exp" placeholder="ประสบการณ์(ปี)">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="mechanic">ความเชี่ยวชาญด้านรถ</label>
								<input type="text" class="form-control" name="skill" id="skill" placeholder="ความชำนาญ">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="user_profile">บ้านเลขที่</label>
								<input type="text" class="form-control" name="hno_user" id="hno_user" placeholder="บ้านเลขที่">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="user_profile">ซอย</label>
								<input type="text" class="form-control" name="alley_user" id="alley_user" placeholder="หมู่ที่">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="user_profile">ถนน</label>
								<input type="text" class="form-control" name="road_user" id="road_user" placeholder="ถนน">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="user_profile">หมู่ที่</label>
								<input type="text" class="form-control" name="village_user" id="village_user" placeholder="หมู่ที่">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="user_profile">จังหวัด</label>
								<select class="form-control" name="provinceId_user" id="provinceId_user">
									<option>จังหวัด</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="user_profile">อำเภอ</label>
								<select class="form-control" name="districtId_user" id="districtId_user">
									<option>อำเภอ</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="user_profile">ตำบล</label>
								<select class="form-control" name="subdistrictId_user" id="subdistrictId_user">
									<option>ตำบล</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="user_profile">รหัสไปรษณีย์</label>
								<input type="number" class="form-control" name="postCode_user" id="postCode_user" placeholder="รหัสไปรษณีย์">
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
                </fieldset>


                <h3>
                    <span class="icon"><i class="ti-car"></i></span>
                    <span class="title_text">อู่ซ่อมรถ</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">กรอกข้อมูล อู่ซ่อมรถ: </span>
                        <span class="step-number">Step 2 / 3</span>
                    </legend>
                    <div class="row">
						<div class="col-md-6">
							<div class="row p-t-20">
			                	<div class="col-md-12">
			             			<div class="form-group">
			                            <label class="control-label">รูปร้านอู่ซ่อมรถ</label>
			                         	<div class="image-editor">
			                            	<input type="file" class="cropit-image-input" name="tempImage">
			                            	<div class="cropit-preview"></div>
			                          		<div class="image-size-label">ปรับขนาด</div>
			                    			<input type="range" class="cropit-image-zoom-input">
			                 				<input type="hidden" name="garagePicture" id="garagePicture" class="hidden-image-data" />
			                  			</div>
			             			</div>
			           			</div>
			                </div>
		                </div>
		                <div class="col-md-6 ">
							<div class="form-group">
								<label class="form-label required" for="garage">ชื่ออู่ซ่อมรถ</label>
								<input type="text" class="form-control" name="garagename" id="garagename" placeholder="ชื่ออู่ซ่อมรถ">
							</div>
							<div class="form-group">
								<label class="form-label required" for="garage">เบอร์โทรศัพท์</label>
								<input type="number" class="form-control" name="phone_garage" id="phone_garage" placeholder="เบอร์โทรศัพท์">
							</div>
							<div class="form-group">
								<label class="form-label required" for="garage">หมายเลขทะเบียนการค้า</label>
								<input type="number" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="for-time-date" for="garage"><h4>ช่วงเวลาเปิดทำการ</h4></label>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="garage"> </label>
								<input type="time" class="form-control" name="timestart" id="timestart" placeholder="00 : 00">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="garage"> </label>
								<input type="time" class="form-control" name="timeend" id="timeend" placeholder="00 : 00">
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
						<div class="col-md-3">
							<div class="form-check">
								<label class="form-check-label" for="garage">
								<input class="form-check-input" name="allday" id="allday" type="checkbox" value="8" onclick="checkboxall()">ทุกวัน</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="for-time-date" for="garage"><h4>ข้อมูลที่อยู่</h4></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="garage">บ้านเลขที่</label>
								<input type="text" class="form-control" name="hno_garage" id="hno_garage" placeholder="บ้านเลขที่">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="garage">ซอย</label>
								<input type="text" class="form-control" name="alley_garage" id="alley_garage" placeholder="หมู่ที่">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="garage">ถนน</label>
								<input type="text" class="form-control" name="road_garage" id="road_garage" placeholder="ถนน">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="garage">หมู่ที่</label>
								<input type="text" class="form-control" name="village_garage" id="village_garage" placeholder="หมู่ที่">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="garage">จังหวัด</label>
								<select class="form-control" name="provinceId_garage" id="provinceId_garage">
									<option>จังหวัด</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="garage">อำเภอ</label>
								<select class="form-control" name="districtId_garage" id="districtId_garage">
									<option>อำเภอ</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="garage">ตำบล</label>
								<select class="form-control" name="subdistrictId_garage" id="subdistrictId_garage">
									<option>ตำบล</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="form-label required" for="garage">รหัสไปรษณีย์</label>
								<input class="form-control" type="number" name="postCode_garage" id="postCode_garage" placeholder="รหัสไปรษณีย์">
							</div>
						</div>
						<div class="col-md-8">
							<div class="input-group">
								<label class="form-label required" for="garage"> เก็บตำเเหน่งที่ตั้ง</label>
							</div>
							<div class="input-group">
								<input class="form-control" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
								<input class="form-control" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
								<button type="button" class="btn btn-primary" id="coordinates" name="coordinates" onclick="getLocation()">เก็บพิกัด</button>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="for-time-date" for="garage"><h4>สิ่งอำนวยความสะดวก</h4></label>
							</div>
						</div>
					</div>
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
								<input class="form-check-input" name="snack" id="snack" value="4" type="checkbox">ของว่าง</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" name="Otherfacilities" id="Otherfacilities" rows="3" placeholder="สิ่งอำนวยความสะดวกอื่นๆ"></textarea>
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
						<button type="submit" class="btn btn-success btn-block">บันทึก</button>
						</form>
					</div>
                </fieldset>

                    
            </form>
            </div>
        
		</div>
	</div>
</div>
