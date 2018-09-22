<form id="submit">
 <div class="shop">
 	<div class="container">
	  <h3>ลงทะเบียนร้านค้าอะไหล่</h3>
	 <div class="row">
		 <div class="col-md-8">
			 <h4 class="underline">ข้อมูลส่วนตัว</h4>
			 <div class="row">
				 <div class="col-md-2">
					 <div class="form-group">
						 <label for="user_profile">คำนำหน้า</label><span class="error">*</span>
						 <select class="form-control" name="titleName" id="titleName">
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
						 <input type="text" class="form-control" name="firstname1" id="firstname1" placeholder="ชื่อ">
					 </div>
				 </div>
				 <div class="col-md-5">
					 <div class="form-group">
						 <label for="user_profile">นามสกุล</label><span class="error">*</span>
						 <input type="text" class="form-control" name="lastname" id="lastname" placeholder="นามสกุล">
					 </div>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-md-12">
					 <div class="form-group">
						 <label for="user_profile">ที่อยู่</label><span class="error">*</span>
						 <textarea class="form-control" name="address" id="address" rows="3" placeholder="ที่อยู่"></textarea>
					 </div>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="user_profile">จังหวัด</label><span class="error">*</span>
						 <select class="form-control" name="provinceId" id="provinceId">
							 <option>จังหวัด</option>
						 </select>
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="user_profile">อำเภอ</label><span class="error">*</span>
						 <select class="form-control" name="districtId" id="districtId">
							 <option>อำเภอ</option>
						 </select>
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="user_profile">ตำบล</label><span class="error">*</span>
						 <select class="form-control" name="subdistrictId" id="subdistrictId">
							 <option>ตำบล</option>
						 </select>
					 </div>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-md-4">
						 <div class="form-group">
							 <label for="user_profile">รหัสไปรษณีย์</label><span class="error">*</span>
							 <input type="number" class="form-control" name="postCode" id="postCode" placeholder="รหัสไปรษณีย์">
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
							 <label for="user_profile">เบอร์โทรศัพท์</label><span class="error">*</span>
							 <input type="number" class="form-control" name="phone2" id="phone2" placeholder="เบอร์โทรศัพท์">
						 </div>
					 </div>
				 </div>
			 <h4 class="underline">ข้อมูลร้านอะไหล่</h4>
			 <div class="row">
				 <div class="col-md-6">
					 <div class="form-group">
						 <label for="car_accessories">ชื่อร้านค้าส่ง</label><span class="error">*</span>
						 <input type="text" class="form-control" name="car_accessoriesName" id="car_accessoriesName" placeholder="ชื่อร้านค้าส่ง">
					 </div>
				 </div>
				 <div class="col-md-6">
					 <div class="form-group">
						 <label for="car_accessories">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
						 <input type="text" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
					 </div>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-md-6">
					 <div class="form-group">
						 <label for="car_accessories">ชื่อ</label><span class="error">*</span>
						 <input type="text" class="form-control" name="firstname" id="firstname" placeholder="ชื่อ">
					 </div>
				 </div>
				 <div class="col-md-6">
					 <div class="form-group">
						 <label for="car_accessories">เลขรหัสบัตรประชาชน</label><span class="error">*</span>
						 <input type="number" class="form-control" name="idcard" id="idcard" placeholder="เลขรหัสบัตรประชาชน">
					 </div>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-md-12">
					 <div class="form-group">
						 <label for="car_accessories">ที่อยู่</label><span class="error">*</span>
						 <textarea class="form-control" name="address1" id="address1" rows="3" placeholder="ที่อยู่"></textarea>
					 </div>
				 </div>
			 </div>
			  <div class="row">
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="car_accessories">จังหวัด</label><span class="error">*</span>
						 <select class="form-control" name="sparepart_provinceId" id="sparepart_provinceId">
							 <option>จังหวัด</option>
						 </select>
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="car_accessories">อำเภอ</label><span class="error">*</span>
						 <select class="form-control" name="sparepart_districtId" id="sparepart_districtId">
							 <option>อำเภอ</option>
						 </select>
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="car_accessories">ตำบล</label><span class="error">*</span>
						 <select class="form-control" name="sparepart_subdistrictId" id="sparepart_subdistrictId">
							 <option>ตำบล</option>
						 </select>
					 </div>
				 </div>
			 </div> 
			 <div class="row">
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="car_accessories">รหัสไปรษณีย์</label><span class="error">*</span>
						 <input class="form-control" name="postCode1" id="postCode1" type="text" placeholder="รหัสไปรษณีย์">
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="car_accessories">ละติจูด</label><span class="error">*</span>
						 <input class="form-control" name="latitude" id="latitude" type="text" placeholder="ละติจูด">
					 </div>
				 </div>
				 <div class="col-md-4">
					 <div class="form-group">
						 <label for="car_accessories">ลองติจูด</label><span class="error">*</span>
						 <input class="form-control" name="longitude" id="longitude" type="text" placeholder="ลองติจูด">
					 </div>
				 </div>
			 </div>
		 </div>  
		 <div class="col-md-4 leftline">
			 <h4 class="users">สมัครลงชื่อเข้าใช้งาน</h4>
				 <div class="form-group">
					 <label for="users">ชื่อผู้ใช้งาน</label><span class="error">*</span>
					 <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน">
				 </div>
				 <div class="form-group">
					 <label>เบอร์โทรศัพท์</label><span class="error">*</span>
					 <input type="number" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
				 </div>
				 <div class="form-group">
					 <label for="users">อีเมล์</label>
					 <input type="email" class="form-control" name="email" id="email" placeholder="อีเมล์">
				 </div>
				 <div class="form-group">
					 <label for="users">รหัสผ่าน</label><span class="error">*</span>
					 <input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน">
				 </div>
				 <div class="form-group">
					 <label for="users">ยืนยันรหัสผ่าน</label><span class="error">*</span>
					 <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="ยืนยันรหัสผ่าน">
				 </div>
				 
				 <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
		 </div>
	 </div>
 </div>
</div> 
</form>


