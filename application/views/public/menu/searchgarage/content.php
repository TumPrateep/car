<div class="shop">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page">ค้นหาอูที่ให้บริการ</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">
                    <div class="form-group">
                        <label for="garageSearch">จังหวัด</label>
						<select class="form-control" name="provinceIdSearch" id="provinceIdSearch">
							<option>จังหวัด</option>
						</select>
                    </div>

                    <div class="form-group">
                        <label for="user_profile">อำเภอ</label>
						<select class="form-control" name="districtIdSearch" id="districtIdSearch">
							<option>อำเภอ</option>
						</select>
                    </div>

                    <div class="form-group">
                        <label for="user_profile">ตำบล</label>
						<select class="form-control" name="subdistrictIdSearch" id="subdistrictIdSearch">
							<option>ตำบล</option>
						</select>
                    </div>

					<div class="form-group">
                        <label class="control-label">ยี่ห้อรถ</label>
                        <select class="form-control input-default" name="brandId" id="brandId">
                            <option value="">เลือกยี่ห้อรถ</option>
                        </select>
					</div>
                    <div class="form-group">
                        <label class="control-label">การบริการ</label>
	                    <select class="form-control input-default" name="Service" id="Service">
	                        <option value="">เลือกการบริการ</option>
	                        <option value="">เปลี่ยนน้ำมันเครื่อง</option>
	                        <option value="">เปลี่ยนอะไหล่ช่วงล่าง</option>
	                        <option value="">เปลี่ยนยาง</option>
	                    </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">ชื่ออู่ซ่อมรถ</label>
                     	<div class="input-group input-group-default">
                        	<input type="text" class="form-control" id="garagename" name="garagename" placeholder="ชื่ออู่ซ่อมรถ">
                    	</div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">สั่งจองหรือเปลี่ยนทันที</label>
                        <select class="form-control valid" id="can_change" name="can_change" aria-required="true" aria-invalid="false">
							<option value="1">เปลี่ยนทันที</option>
							<option value="2">สั่งจอง</option>
						</select>
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
