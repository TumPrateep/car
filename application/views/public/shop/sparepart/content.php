<div class="shop">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page">อะไหล่ช่วงล่าง</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">
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
                        <label class="control-label">รายละเอียดรถ</label>
                        <select class="form-control input-default" name="detail" id="detail">
                            <option value="">เลือกลายละเอียดรถ</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">ปีที่ผลิต</label>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <select class="form-control input-default" name="yearStart" id="yearStart">
                                    <option value="">เลือกปี</option>
                                </select>
                            </div>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="control-label">โฉมรถ</label>
                        <select class="form-control input-default" name="modelofcarId" id="modelofcarId">
                            <option value="">เลือกโฉมรถ</option>
                        </select>
					</div>
                    <div class="form-group">
                        <label class="control-label">อะไหล่ช่วงล่าง</label>
                        <select class="form-control input-default" name="spares_undercarriageId" id="spares_undercarriageId">
                            <option value="">เลือกอะไหล่ช่วงล่าง</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">ยี่ห้ออะไหล่ช่วงล่าง</label>
                        <select class="form-control input-default" name="spares_brandId" id="spares_brandId">
                            <option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
                        <select class="form-control valid" id="can_change" name="can_change" aria-required="true" aria-invalid="false">
							<option value="1">เปลี่ยนทันที</option>
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
					<br>
					<div class="col-lg-12 ">
                        <button type="button" id="btn-search" class="btn-create btn btn-orange btn-block">
                            <i class="ti-search"> ค้นหา</i>
                        </button>
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
							</table>
						</div>
						

					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
