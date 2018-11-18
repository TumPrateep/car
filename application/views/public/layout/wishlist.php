
		<div class="header_main">
			<div class="container">
				<div class="row mg-tb-30">

					<!-- Logo -->
					<div class="col-lg-3 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?=base_url();?>"><img src="<?=base_url("public/image/logo/logo-003.PNG");?>" alt=""></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-7 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="ค้นหาสินค้า...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">ทุกหมวดหมู่</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">อะไหล่ช่วงล่าง</a></li>
													<li><a class="clc" href="#">น้ำมันเครื่อง</a></li>
													<li><a class="clc" href="#">ยางรถยนต์</a></li>
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="<?=base_url("public/themes/user/");?>images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-2 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<a href="<?=base_url("shop/cart");?>">
											<img src="<?=base_url("public/themes/user/");?>images/cart.png" alt="">
											<div class="cart_count"><span id="cart_count">0</span></div>
										</a>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="<?=base_url("shop/cart");?>">ตะกร้า</a></div>
										<!-- <div class="cart_price">$85</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>