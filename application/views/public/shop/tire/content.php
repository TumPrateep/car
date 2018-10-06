    <div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Computers & Laptops</a></li>
								<li><a href="#">Cameras & Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones & Tablets</a></li>
								<li><a href="#">TV & Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games & Consoles</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
						
							
								<div class="form-group">
									<label class="control-label">ยี่ห้อยาง</label>
									<select class="form-control input-default" name="tire_brandId" id="tire_brandId">
										<option value="">เลือกยี่ห้อยาง</option>
									</select>
								</div>
							
							
								<div class="form-group">
									<label class="control-label">รุ่นยาง</label>
									<select class="form-control input-default" name="tire_modelId" id="tire_modelId">
										<option value="">เลือกรุ่นยาง</option>
									</select>
								</div>
							
							
								<div class="form-group">
									<label class="control-label">ขอบยาง</label>
									<select class="form-control input-default" name="rimId" id="rimId">
										<option value="">เลือกขอบยาง</option>
									</select>
								</div>
							
							
								<div class="form-group">
									<label class="control-label">ขนาดยาง</label>
									<select class="form-control input-default" name="tire_sizeId" id="tire_sizeId">
										<option value="">เลือกขนาดยาง</option>
									</select>
								</div>
							
						
						
								<!-- <div class="sidebar_section filter_by_section">
							        <div class="sidebar_subtitle">ราคา</div>
							        <div class="filter_price">
								        <div id="slider-range" class="slider_range"></div>
								        <p>Range: </p>
								        <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							        </div>
						        </div> -->
							
							
								<div class="form-group">
									<label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
									<select class="form-control input-default" name="can_change" id="can_change">
										<option value="">สั่งจองหรือเปลี่ยนทันที</option>
										<option value="1">ปลี่ยนทันที</option>
										<option value="2">สั่งจอง</option>
									</select>
								</div>  
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> products found</div>
							<div class="shop_sorting">
								<div class="form-group">
									<label class="control-label">จัดเรียง: </label>
									<select class="form-control input-default" name="sort" id="sort">
										<option value="1" selected>เรียงลำดับจาก ก-ฮ</option>
										<option value="2">เรียงลำดับจาก ฮ-ก</option>
										<option value="3">เรียงลำดับจาก สถานะ</option>
									</select>
								</div>
							</div>
						</div>

						<div class="product_grid">
                        
                            <div class="col-lg-3" >
                                <!-- <div class="row pt-3"> -->
                                    <div class="product_item is_new">
                                        <div class="product_border"></div>
                                            <div class="d-flex flex-column align-items-center "><img src="<?=base_url('public/image/tire_brand/5b93d03c7f4cf.png'); ?>" style="width: 70%;"></div>
                                            <div class="d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/tirebranddata/5b93d10477365.png'); ?>" style="width: 100%;"></div> 
                                        
                                        <div class="card-body float-left">
                                                <div class=" text-danger h3 w-25 p-3">฿5,000-</div>
                                                <div class="text-left"><a>ยี่ห้อ MICHELIN </a></div>
                                                <div class="text-left"><a>ขนาด 175/70R13</a></div>
                                                <div class="text-left">รุ่น Primacy2 ST</div>
                                            
                                        </div> 
                                        <div class="card-body float-right">
                                            <span class="text-success h5 ">สั่งจอง</span>
                                        </div>
                                    </div>
                                <!-- </div>      -->
                            </div>
                            <div class="col-lg-3" >
                                <!-- <div class="row pt-3"> -->
                                    <div class="product_item is_new">
                                        <div class="product_border"></div>
                                            <div class="d-flex flex-column align-items-center "><img src="<?=base_url('public/image/tire_brand/5b93d03c7f4cf.png'); ?>" style="width: 70%;"></div>
                                            <div class="d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/tirebranddata/5b93d10477365.png'); ?>" style="width: 100%;"></div> 
                                        
                                        <div class="card-body float-left">
                                                <div class=" text-danger h3 w-25 p-3">฿5,000-</div>
                                                <div class="text-left"><a>ยี่ห้อ MICHELIN </a></div>
                                                <div class="text-left"><a>ขนาด 175/70R13</a></div>
                                                <div class="text-left">รุ่น Primacy2 ST</div>
                                            
                                        </div> 
                                        <div class="card-body float-right">
                                            <span class="text-success h5 ">สั่งจอง</span>
                                        </div>
                                    </div>
                                <!-- </div>      -->
                            </div>    


                            
                        
                        </div>
                            
                            

		</div>
    </div>
</div>