<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">
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
				
					<div class="form-group">
                        <label class="control-label">ยี่ห้อรถ</label>
                        <select class="form-control input-default" name="brandId" id="brandId">
                            <option value="">เลือกยี่ห้อรถ</option>
                        </select>
					</div>
				
				
					<div class="form-group">
                        <label class="control-label">รุ่นรถ</label>
                        <select class="form-control input-default" name="modelId" id="modelId">
                            <option value="">เลือกรุ่นรถ</option>
                        </select>
					</div>
				
					<div class="form-group">
                    <label class="control-label">การรับประกัน-ปี</label>
                        <select class="form-control input-default" name="warranty_year" id="warranty_year">
                            <option value="">เลือกปี</option>
                            <option value="1">1ปี</option>
                            <option value="2">2ปี</option>
                            <option value="3">3ปี</option>
                            <option value="4">4ปี</option>
                            <option value="5">5ปี</option>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label class="control-label">การรับประกัน-ระยะทาง</label>
                        <div class="input-group input-group-default">
                            <input type="number" class="form-control" id="warranty_distance" name="warranty_distance" placeholder="ระยะทาง">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
                        <select class="form-control input-default" name="can_change" id="can_change">
                            <option value="">สั่งจองหรือเปลี่ยนทันที</option>
                            <option value="1">เปลี่ยนทันที</option>
                            <option value="2">สั่งจอง</option>
                        </select>
                    </div>

					<div class="sidebar_section filter_by_section">
						<div class="sidebar_title">ราคายาง</div>
						<div class="filter_price">
							<div id="slider-range" class="slider_range" ></div>
							<p>ช่วงราคา: </p>
							<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
						</div>
                    </div>
                    
                    <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="button" id="btn-search" class="btn-create btn btn-warning ">
                            <i class="ti-search"> ค้นหา</i>
                        </button>
                    </div>
                </div>

				</div>
			</div>
			<div class="col-lg-9">
				<div class="shop_content">
					
					<div class="shop_bar clearfix">
						<div class="shop_product_count"></div>
						<div class="shop_sorting">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-4 col-form-label">จัดเรียง:</label>
								<div class="col-sm-8">
									<select class="form-control input-default" name="sort" id="sort">
										<option value="1" selected>เรียงลำดับจาก ก-ฮ</option>
										<option value="2">เรียงลำดับจาก ฮ-ก</option>
										<option value="3">เรียงลำดับจาก สถานะ</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="product_grid">
						<div class="row">
							<table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
										<div class="row">
											<div class="col-md-3">
												<div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">
													<div>
														<div class="" style="width: 100%; display: inline-block;">
															<div class="border_active active"></div>
															<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
																<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/tirebranddata/5b93d10477365.png'); ?>"/></div>
																<div class="product_content">
																	<div class="product_price">680 .-</div>
																	<div class="product_name">
                                                                    <div><a href="product.html" tabindex="0"><strong>MICHELIN </strong></a></div>
                                                                    <ul>175/70R13</ul>
                                                                    <ul>Primacy2 ST</ul>
																	</div>
																	<div class="product_extras">
																		<button class="product_cart_button" tabindex="0"><i class="fas fa-shopping-bag"></i> หยิบใส่ตะกร้า</button>
																	</div>
																</div>
																
															</div>
														</div>
													</div>
												</div>
											</div>
											
										</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						

					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
