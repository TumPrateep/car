<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header" style="background-image: url('<?=base_url("public/themes/user/");?>images/top_background.jpg');">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?=base_url("public/themes/user/");?>images/phone.png" alt=""></div>+66 000 000 000</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?=base_url("public/themes/user/");?>images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">carjaidee@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">
											<div><span class="fas fa-user-circle"></span> <?=now_user()?> | <span class=" fas fa-chevron-down"></span></div>
										</a>
										<ul>
											<li><a href="<?=base_url("shop/order"); ?>"><span class="fas fa-bars"></span>  รายการสั่งซื้อ</a></li>
											<li><a href="<?=base_url("public/userprofile"); ?>"><span class="fa fa-user"></span>  ข้อมูลผู้ใช้งาน</a></li>
											<li><a href="<?=base_url("public/carprofile"); ?>"><span class="fa fa-car"></span>  ข้อมูลรถ</a></li>
											<li><a href="#" onclick="logout()"><span class="fas fa-sign-out-alt"></span> ออกจากระบบ</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->