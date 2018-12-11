<form id="registergarage">
<div class="shop">
	<div class="container">
		<h3>ลงทะเบียนอู่ซ่อมรถ</h3>
		<div class="row">
			<div class="col-md-8">
				<h4 class="underline orange">ข้อมูลส่วนตัวของเจ้าของอู่</h4>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="user_profile">คำนำหน้า</label><span class="error">*</span>
							<select class="form-control" name="titleName_user" id="titleName_user">
								<option value="">คำนำหน้า</option>
								<option value="1">นาย</option>
								<option value="2">นาง</option>
								<option value="3">นางสาว</option>
							</select>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="user_profile">ชื่อ</label><span class="error">*</span>
							<input type="text" class="form-control" name="firstname_user" id="firstname_user" placeholder="ชื่อ">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="user_profile">นามสกุล</label><span class="error">*</span>
							<input type="text" class="form-control" name="lastname_user" id="lastname_user" placeholder="นามสกุล">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="mechanic">เลขรหัสบัตรประชาชน</label><span class="error">*</span>
							<input type="number" class="form-control" name="personalid" id="personalid" placeholder="เลขรหัสบัตรประชาชน">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="mechanic">ประสบการณ์</label><span class="error">*</span>
							<input type="number" class="form-control" name="exp" id="exp" placeholder="ประสบการณ์(ปี)">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="mechanic">ความชำนาญ</label><span class="error">*</span>
							<input type="text" class="form-control" name="skill" id="skill" placeholder="ความชำนาญ">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="user_profile">บ้านเลขที่</label><span class="error">*</span>
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
							<label for="user_profile">จังหวัด</label><span class="error">*</span>
							<select class="form-control" name="provinceId_user" id="provinceId_user">
								<option>จังหวัด</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="user_profile">อำเภอ</label><span class="error">*</span>
							<select class="form-control" name="districtId_user" id="districtId_user">
								<option>อำเภอ</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="user_profile">ตำบล</label><span class="error">*</span>
							<select class="form-control" name="subdistrictId_user" id="subdistrictId_user">
								<option>ตำบล</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="user_profile">รหัสไปรษณีย์</label><span class="error">*</span>
							<input type="number" class="form-control" name="postCode_user" id="postCode_user" placeholder="รหัสไปรษณีย์">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="user_profile">เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
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
				<!-- <h4 class="underline">ข้อมูลเจ้าของอู่</h4>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="mechanic">คำนำหน้า</label><span class="error">*</span>
							<select class="form-control" name="titleName_mechanic" id="titleName_mechanic">
								<option>คำนำหน้า</option>
								<option>นาย</option>
								<option>นาง</option>
								<option>นางสาว</option>
							</select>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="mechanic">ชื่อ</label><span class="error">*</span>
							<input type="text" class="form-control" name="firstname_mechanic" id="firstname_mechanic" placeholder="ชื่อ">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="mechanic">นามสกุล</label><span class="error">*</span>
							<input type="text" class="form-control" name="lastname_mechanic" id="lastname_mechanic" placeholder="นามสกุล">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="mechanic">เลขรหัสบัตรประชาชน</label><span class="error">*</span>
							<input type="text" class="form-control" name="personalid_mechanic" id="personalid_mechanic" placeholder="เลขรหัสบัตรประชาชน">
							</div>
						</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mechanic">เบอร์โทรศัพท์</label><span class="error">*</span>
							<input type="text" class="form-control" name="phone_mechanic" id="phone_mechanic" placeholder="เบอร์โทรศัพท์">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mechanic">ประสบการณ์</label><span class="error">*</span>
							<input type="text" class="form-control" name="exp" id="exp" placeholder="ประสบการณ์(ปี)">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mechanic">ความชำนาญ</label><span class="error">*</span>
							<input type="text" class="form-control" name="skill" id="skill" placeholder="ความชำนาญ">
						</div>
					</div>
				</div> -->
				<h4 class="underline orange">ข้อมูลอู่ซ่อมรถ</h4>
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
							<label for="garage">ชื่ออู่ซ่อมรถ</label><span class="error">*</span>
							<input type="text" class="form-control" name="garagename" id="garagename" placeholder="ชื่ออู่ซ่อมรถ">
						</div>
						<div class="form-group">
							<label for="garage">เบอร์โทรศัพท์</label><span class="error">*</span>
							<input type="number" class="form-control" name="phone_garage" id="phone_garage" placeholder="เบอร์โทรศัพท์">
						</div>
						<div class="form-group">
							<label for="garage">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
							<input type="number" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="garage"><h4>ช่วงเวลาเปิดทำการ</h4></label><span class="error">*</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
			                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
			                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
			                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
			                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
			                    </div>
			                </div>
			            </div>
					</div>
					<script type="text/javascript">
			            $(function () {
			                $('#datetimepicker3').datetimepicker({
			                    format: 'LT'
			                });
			            });
			        </script>
					<div class="col-md-4">
						<div class="form-group">
							<!-- <label for="exampleFormControlInput1">เวลาปิด</label> -->
							<input type="text" class="form-control" name="timeend" id="timeend" placeholder="00 : 00">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="monday" id="monday" type="checkbox">จันทร์</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label"  for="garage">
							<input class="form-check-input" name="tuesday" id="tuesday" type="checkbox">อังคาร</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="wednesday" id="wednesday" type="checkbox">พุธ</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="thursday" id="thursday" type="checkbox">พฤหัสบดี</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="friday" id="friday" type="checkbox">ศุกร์</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="saturday" id="saturday" type="checkbox">เสาร์</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="sunday" id="sunday" type="checkbox">อาทิตย์</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label class="form-check-label" for="garage">
							<input class="form-check-input" name="allday" id="allday" type="checkbox">ทุกวัน</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<button type="button" name="copyaddress" id="copyaddress" class="btn btn-orange-garage">ข้อมูลที่อยู่</button><span> ใช้ข้อมูลเดี่ยวกันกับข้อมูลส่วนตัว</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="garage">บ้านเลขที่</label><span class="error">*</span>
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
							<label for="garage">จังหวัด</label><span class="error">*</span>
							<select class="form-control" name="provinceId_garage" id="provinceId_garage">
								<option>จังหวัด</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="garage">อำเภอ</label><span class="error">*</span>
							<select class="form-control" name="districtId_garage" id="districtId_garage">
								<option>อำเภอ</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="garage">ตำบล</label><span class="error">*</span>
							<select class="form-control" name="subdistrictId_garage" id="subdistrictId_garage">
								<option>ตำบล</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="garage">รหัสไปรษณีย์</label><span class="error">*</span>
							<input class="form-control" type="number" name="postCode_garage" id="postCode_garage" placeholder="รหัสไปรษณีย์">
						</div>
					</div>
					<div class="col-md-8">
						<div class="input-group">
							<label for="garage"> เก็บตำเเหน่งที่ตั้ง</label><span class="error">*</span>
						</div>
						<div class="input-group">
							<input class="form-control" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
							<input class="form-control" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
							<button type="submit" class="btn btn-primary">เก็บพิกัด</button>
						</div>
					</div>
					<!-- <div class="col-md-3">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">ละติจูด</label><span class="error">*</span>
							<input class="form-control" type="text" placeholder="ละติจูด">
						</div>
					</div> -->
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="garage">สิ่งอำนวยความสะดวก</label>
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
			</div>
			<div class="col-md-4 leftline">
				<h4 class="underline">สมัครลงชื่อเข้าใช้งาน</h4>
				<form id="login">
					<div class="form-group">
						<label for="users">ชื่อผู้ใช้งาน</label><span class="error">*</span>
						<input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน">
					</div>
					<div class="form-group">
						<label for="users">เบอร์โทรศัพท์</label><span class="error">*</span>
						<input type="number" class="form-control" name="phone_user" id="phone_user" placeholder="เบอร์โทรศัพท์">
					</div>
					<div class="form-group">
						<label for="users">อีเมล์</label><span class="error">*</span>
						<input type="email" class="form-control" name="email" id="email" placeholder="อีเมล์">
					</div>
					<div class="form-group">
						<label for="users">รหัสผ่าน</label><span class="error">*</span>
						<input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน">
					</div>
					<div class="form-group">
						<label  for="users">ยืนยันรหัสผ่าน</label><span class="error">*</span>
						<input type="password" class="form-control" name="checkpassword" id="checkpassword" placeholder="ยืนยันรหัสผ่าน">
					</div>
					<button type="submit" class="btn btn-success btn-block">บันทึก</button>
				</form>
			</div>
		</div>
	</div>
</div>
</form>