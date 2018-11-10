

<div class="single_product">
		<div class="container">
			<input type="hidden" name="group" id="group" value="<?=$group ?>">
			<input type="hidden" name="productId" id="productId" value="<?=$productId ?>">
			<div class="row">

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected">
						<img id="brandImage" class="image-brand-detail" />
						<img id="productImage" class="productImage">
					</div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-2">
					<div class="product_description">
						<div class="product_category" id="brand"></div>
						<div class="product_name" id="productName"></div>
						<div class="rating_r rating_r_4 product_rating"></div>
						<div class="product_text">
							<p>รายละเอียด</p>
							<p>
								<div class="row">
									<div class="col">ยี่ห้อ : <span id="showBrand"></span></div>
									<div class="col">รุ่น : <span id="showModel"></span></div>
								</div>
								<div class="row">
									<div class="col">ขนาด : <span id="showNumber"></span></div>
									<!-- <div class="col">ประเภท : <span id="showType"></span></div> -->
								</div>
								<div class="row">
									<!-- <div class="col">ระยะทาง : <span id="showDistance"></span></div> -->
									<div class="col">รับประกัน : <span id="showWarranty"></span></div>
								</div>
							</p>
							<p>ข้อมูลเพิ่มเติม</p>
						</div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>จำนวน: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

								</div>

								<div class="product_price" id="product_price"></div>
								<div class="button_container">
									<button type="button" class="button cart_button">หยิบใส่ตะกร้า</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
    </div>
</div>