<div class="shop">
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            <!-- Shop Sidebar -->
            <div class="shop_sidebar">
               <div class="sidebar_section">
                  <div class="sidebar_title">Garage</div>
                  <div class="form-group">
                     <label class="control-label">ชื่ออู่ซ่อมรถ</label>
                     <div class="input-group input-group-default">
                        <input type="text" class="form-control" id="garagename" name="garagename" placeholder="ชื่ออู่ซ่อมรถ">
                    </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">ความชำนาญ</label>
                     <select class="form-control input-default" name="garage-skill" id="garage-skill">
                        <option value="">เลือกความชำนาญ</option>
                        <option value="">Toyota</option>
                        <option value="">Honda</option>
                        <option value="">Mazda</option>
                        <option value="">Nissan</option>
                        <option value="">Mitsubishi</option>
                        <option value="">Suzuki</option>
                        <option value="">BMW</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label">การบริการ</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกการบริการ</option>
                        <option value="">เปลี่ยนน้ำมันเครื่อง</option>
                        <option value="">เปลี่ยนอะไหล่ช่วงล่าง</option>
                        <option value="">เปลี่ยนยาง</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label">รุ่นรถ</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกรุ่นรถ</option>
                     </select>
                  </div>
                  <div class="form-group">
						<label for="user_profile">จังหวัด</label>
						<select class="form-control" name="provinceIdSearch" id="provinceIdSearch">
							<option>จังหวัด</option>
						</select>
					</div>

                  <div class="form-group">
                     <label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
                     <select class="form-control input-default" name="can_change" id="can_change">
                        <option value="">สั่งจองหรือเปลี่ยนทันที</option>
                        <option value="1">ปลี่ยนทันที</option>
                        <option value="2">สั่งจอง</option>
                     </select>
                  </div>

                  <!-- <div class="form-group">
                     <button type="button" id="btn-search" class="btn-create btn btn-orange btn-block">
                        <i class="ti-search"> ค้นหา</i>
                     </button>
                  </div> -->
					<br>
					<div class="form-group">
                        <button type="button" id="btn-search" class="btn-create btn btn-orange btn-block">
                            <i class="ti-search"> ค้นหา</i>
                        </button>
                    </div>
                    <h4 class="underline"></h4>
                    <div class="form-group">
                        <button type="button" id="btn-search-all" class="btn-create btn btn-primary btn-block">
                            <i class="ti-search"> ค้นหาอู่ใกล้เคียง</i>
                        </button>
                    </div>

               </div>
            </div>
         </div>

         <div class="col-lg-9">
            <!-- Shop Content -->
            <div class="shop_content">
               <div class="shop_bar clearfix">
                  <!-- <div class="shop_product_count"><span>186</span> products found</div> -->
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">
                                <div>
                                    <div class="" style="width: 100%; display: inline-block;">
                                        <div class="border_active active"></div>
                                        <div class="product_item d-flex flex-column ">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/themes/garage/images/garage.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">ร้านนายกอ.</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>โช้คอัพหน้า TRW</strong></a></div>
                                                    <ul>Chevrolet AVEO</ul>
                                                    <ul><small>2006-2014</small></ul>
                                                    <div class="card-tools one">
	                                                    <div class="input-group-append">
										            		<button class="btn btn-info inactive"><i class="fa fa-user-circle"></i></button>
										          		</div>
										          		<div class="input-group-append">
										            		<button class="btn btn-info inactive"><i class="fa fa-user-circle"></i></button>
										          		</div>
									          		</div>
                                                </div>
                                                <!-- <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">
                                <div>
                                    <div class="" style="width: 100%; display: inline-block;">
                                        <div class="border_active active"></div>
                                        <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/themes/garage/images/garage.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">2400 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>ลูกปืนล้อหน้า TRW</strong></a></div>
                                                    <ul>Honda CIVIC</ul>
                                                    <ul><small>1992-1995</small></ul>
                                                </div>
                                                <!-- <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">
                                <div>
                                    <div class="" style="width: 100%; display: inline-block;">
                                        <div class="border_active active"></div>
                                        <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/themes/garage/images/garage.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">3200 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>ลูกปืนล้อหน้า NTN</strong></a></div>
                                                    <ul>Honda CIVIC</ul>
                                                    <ul><small>1992-1995</small></ul>
                                                </div>
                                                <!-- <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">
                                <div>
                                    <div class="" style="width: 100%; display: inline-block;">
                                        <div class="border_active active"></div>
                                        <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/themes/garage/images/garage.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">2400 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>ผ้าเบรคหน้า TRW</strong></a></div>
                                                    <ul>Honda CITY</ul>
                                                    <ul><small>1992-1995</small></ul>
                                                </div>
                                                <!-- <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
               <!-- Shop Page Navigation -->
               <div class="shop_page_nav d-flex flex-row">
                  <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                  <ul class="page_nav d-flex flex-row">
                     <li><a href="#">1</a></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">3</a></li>
                     <li><a href="#">...</a></li>
                     <li><a href="#">21</a></li>
                  </ul>
                  <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>