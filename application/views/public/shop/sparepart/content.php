<div class="shop">
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            <!-- Shop Sidebar -->
            <div class="shop_sidebar">
               <div class="sidebar_section">
                  <div class="sidebar_title">Categories</div>
                  <div class="form-group">
                     <label class="control-label">อะไหล่ช่วงล่าง</label>
                     <select class="form-control input-default" name="tire_brandId" id="tire_brandId">
                        <option value="">เลือกอะไหล่ช่วงล่าง</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label">ยี่ห้ออะไหล่ช่วงล่าง</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label">ยี่ห้อรถ</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกยี่ห้อรถ</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label">รุ่นรถ</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกรุ่นรถ</option>
                     </select>
                  </div>
        
                  <div class="form-group">
                     <label class="control-label">ปีที่ผลิต</label>
                     <div class="row p-t-20">
                        <div class="col-md-5">
                            <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                                <option value="">เลือกปี</option>
                            </select>
                        </div>
                           <div class="col-md-2"><label class="control-label">ถึง</label></div>
                        <div class="col-md-5">
                            <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                                <option value="">เลือกปี</option>
                            </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label">ขนาดเครื่องยนต์</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกขนาดเครื่องยนต์</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="control-label">การรับประกัน-ปี</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกปี</option>
                        <option value="">1ปี</option>
                        <option value="">2ปี</option>
                        <option value="">3ปี</option>
                        <option value="">4ปี</option>
                        <option value="">5ปี</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="control-label">เงื่อนไข</label>
                     <select class="form-control input-default" name="tire_modelId" id="tire_modelId">
                        <option value="">เลือกเงื่อนไข</option>
                        <option value="">และ</option>
                        <option value="">หรือ</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="control-label">การรับประกัน-ระยะทาง</label>
                     <div class="input-group input-group-default">
                        <input type="number" class="form-control" id="price" name="price" placeholder="ระยะทาง">
                    </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
                     <select class="form-control input-default" name="can_change" id="can_change">
                        <option value="">สั่งจองหรือเปลี่ยนทันที</option>
                        <option value="1">ปลี่ยนทันที</option>
                        <option value="2">สั่งจอง</option>
                     </select>
                  </div>
                  <div class="sidebar_section filter_by_section">
                     <div class="sidebar_subtitle">ราคา</div>
                     <div class="filter_price">
                        <div id="slider-range" class="slider_range"></div>
                        <p>ช่วงราคา: </p>
                        <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                     </div>
                  </div>
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">
                                <div>
                                    <div class="" style="width: 100%; display: inline-block;">
                                        <div class="border_active active"></div>
                                        <div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/spareundercarriage/5b93d1d596129.png'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">3790 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>โช้คอัพหน้า TRW</strong></a></div>
                                                    <ul>Chevrolet AVEO</ul>
                                                    <ul><small>2006-2014</small></ul>
                                                </div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div>
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
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/spareundercarriage/49926538.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">2400 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>ลูกปืนล้อหน้า TRW</strong></a></div>
                                                    <ul>Honda CIVIC</ul>
                                                    <ul><small>1992-1995</small></ul>
                                                </div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div>
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
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/spareundercarriage/jv.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">3200 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>ลูกปืนล้อหน้า NTN</strong></a></div>
                                                    <ul>Honda CIVIC</ul>
                                                    <ul><small>1992-1995</small></ul>
                                                </div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div>
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
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?=base_url('public/image/spareundercarriage/zzzz.jpg'); ?>"/></div>
                                            <div class="product_content">
                                                <div class="product_price">2400 .-</div>
                                                <div class="product_name">
                                                    <div><a href="product.html" tabindex="0"><strong>ผ้าเบรคหน้า TRW</strong></a></div>
                                                    <ul>Honda CITY</ul>
                                                    <ul><small>1992-1995</small></ul>
                                                </div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button" tabindex="0">หยิบใส่ตะกร้า</button>
                                                </div>
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