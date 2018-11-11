<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">

						 <div class="form-group">
                            <label class="control-label">ประเภทเครื่องยนตร์</label>
                            <div class="input-group input-group-default">
                                <select class="form-control" id="lubricatortypeFormachineId" name="lubricatortypeFormachineId">
                                <option value="">ประเภทเครื่องยนตร์</option>
                                </select>
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label">ชนิดน้ำมันเครื่อง</label>
                            <div class="input-group input-group-default">
                                <select class="form-control valid" name="lubricator_gear" id="lubricator_gear">
                                    <option value="">เลือกชนิดน้ำมันเครื่อง</option>
                                    <option value="1">น้ำมันเครื่อง</option>
                                    <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                    <option value="3">น้ำมันเกียร์ออโต</option>
                                </select>
                            </div>
                        </div>

						

						<div class="form-group">
                            <label class="control-label">ยี่ห้อน้ำมันเครื่อง</label>
                            <div class="input-group input-group-default">
                                <select class="form-control" id="lubricator_brandId" name="lubricator_brandId">
                                    <option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>
                                </select>
                            </div>
                        </div>

						 <div class="form-group">
                            <label class="control-label">รุ่นน้ำมันเครื่อง</label>
                            <div class="input-group input-group-default">
                                <select class="form-control" id="lubricatorId" name="lubricatorId">
                                <option value="">เลือกรุ่นน้ำมันเครื่อง</option>
                                </select>
                            </div>
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

					<div class="col-lg-12 ">
                        <button type="button" id="btn-search" class="btn-create btn btn-warning ">
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
