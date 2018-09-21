<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-center">
				<img src="<?=base_url('public/image/icon/car2.png'); ?>" style="width: 60%;">
			</div>
			<div class="col-md-4 leftline">
				<h4 class="underline">สมัครลงชื่อเข้าใช้งาน</h4>
				<div id="error-message" class="alert alert-warning" role="alert"></div>
				<form id="register">
					<div class="form-group">
						<label>ชื่อผู้ใช้งาน</label><span class="error">*</span>
						<input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน">
					</div>
					<div class="form-group">
						<label>เบอร์โทรศัพท์</label><span class="error">*</span>
						<input type="number" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์">
					</div>
					<div class="form-group">
						<label>อีเมล์</label>
						<input type="email" name="email" class="form-control" placeholder="อีเมล์">
					</div>
					<div class="form-group">
						<label>รหัสผ่าน</label><span class="error">*</span>
						<input type="password" id="password" name="password" class="form-control" placeholder="รหัสผ่าน">
					</div>
					<div class="form-group">
						<label>ยืนยันรหัสผ่าน</label><span class="error">*</span>
						<input type="password" name="password_again" class="form-control" placeholder="ยืนยันรหัสผ่าน">
					</div>
					<button type="submit" class="btn btn-primary btn-block">บันทึก</button>
				</form>
			</div>
		</div>
	</div>
</div>
