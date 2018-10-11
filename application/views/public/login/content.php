<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-center">
				<!-- <img src="<?=base_url('public/image/icon/car2.png'); ?>" style="width: 60%;"> -->
				<div>
					<h3 class="text-center text-underline"> Have a fix have a CarJaidee</h3>
				</div>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
					<img class="d-block w-100" src="./public/image/a.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
					<img class="d-block w-100" src="./public/image/b.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
					<img class="d-block w-100" src="./public/image/a.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				</div>

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
						<div class="g-signin2" data-onsuccess="onSignin" data-theme="dark"></div>
					</div>
					<div class="col border-left">
						<button id="faceebook-login" class="loginBtn loginBtn-facebook">
							ลงชื่อเข้าใช้
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
