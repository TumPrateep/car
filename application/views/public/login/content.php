<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-center">
				<img src="<?=base_url('public/image/icon/car2.png'); ?>" style="width: 60%;">
			</div>
			<div class="col-md-4 leftline">
				<h1 class="text-center">CarJaidee</h1>
				<div id="error-message" class="alert alert-warning" role="alert"></div>
				<form id="login">
					<div class="form-group">
						<label>ชื่อผู้ใช้งาน</label>
						<input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="admin">
					</div>
					<div class="form-group">
						<label>รหัสผ่าน</label>
						<input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" value="password">
					</div>
					<button type="submit" class="btn btn-orange btn-block">เข้าสู่ระบบ</button>
				</form>
				<hr>

				<div class="row">
					<div class="col">
						<div class="g-signin2" data-onsuccess="onSignin"></div>
					</div>
					<div class="col">
						<button type="button" class="btn btn-primary btn-block"><i class="fab fa-facebook"></i> Facebook</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
