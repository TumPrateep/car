

<div class="single_product">
		<div class="container">
			<input type="hidden" name="group" id="group" value="<?=$group ?>">
			<input type="hidden" name="productId" id="productId" value="<?=$productId ?>">
			<div class="row">

				<!-- Selected Image -->
				<div class="col-lg-4 order-1">
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
									<button type="button" class="button cart_button" onclick="setCartItem(<?=$productId ?>,'<?=$group ?>')">หยิบใส่ตะกร้า</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-3 order-3">
					<div class="right-select">
						<h4><Strong><font color="orange"><i class="fas fa-check"></i></font> การรับประกัน</Strong></h4>
						<span id="warranty_year"></span> ปี
						<span id="warranty"></span>
						<span id="warranty_distance"></span> กิโลเมตร <br><br>
						<div class="col text-center"><img class="star" src="<?=base_url("public/image/verify.png") ?>" style="width:100%;"></div>
						<hr>
						<h4><strong><font color="orange"><i class="fa fa-star" aria-hidden="true"></i></font> คะแนนสินค้า</strong></h4>
						<div class="summary">
						<div class="score"><div class="col"><span class="score-average">4</span><span class="score-max">/5</span> คะแนน</div></div>
							<div class="average">
								<div class="container-star " style="width:166.25px;height:33.25px">
									<img class="star" src="<?=base_url("public/image/StarIconGold.png") ?>" style="width:33.25px;height:33.25px">
									<img class="star" src="<?=base_url("public/image/StarIconGold.png") ?>" style="width:33.25px;height:33.25px">
									<img class="star" src="<?=base_url("public/image/StarIconGold.png") ?>" style="width:33.25px;height:33.25px">
									<img class="star" src="<?=base_url("public/image/StarIconGold.png") ?>" style="width:33.25px;height:33.25px">
								</div>
							</div>
							<br>
							<div class="col text-center"><img class="star" src="<?=base_url("public/image/guarantee.png") ?>" style="width:100%;"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
    </div>
</div>