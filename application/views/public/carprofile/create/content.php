<div class="shop">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page">รายการสั่งซื้อ</li>
					</ol>
				</nav>
			</div>
		</div>
        
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">	
					<ul class="nav flex-column nav-control">
						<li class="nav-item">
							<a class="nav-link " href="#">รายการสั่งซื้อ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">ข้อมูลรถ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ข้อมูลส่วนตัว</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ออกจากระบบ</a>
						</li>
					</ul>
				</div>
            </div>
			<div class="col-lg-9">
				<div class="table-responsive">
      				<table class="table table-bordered" id="order-table" width="100%" cellspacing="0">
                        <div class="row page-titles">
                            <div class="col-md-5 align-self-center">
                                <h3 class="text-primary">สร้างข้อมูลรถ</h3>
                            </div>
                        </div>
                        <thead>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="submit">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="first_name">อักษรนำหน้า</label><span class="error">*</span>
                                                    <input type="text" class="form-control" name="character_plate" id="character_plate" placeholder="อักษรนำหน้า">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="last_name">หมายเลข</label><span class="error">*</span>
                                                    <input type="number" class="form-control" name="number_plate" id="number_plate" placeholder="หมายเลข" min=0 >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label required" for="garage">จังหวัด</label>
                                                    <select class="form-control input-default" name="province_plate" id="province_plate">
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label required" for="garage">ยี่ห้อ</label>
                                                    <select class="form-control input-default" name="brandId" id="brandId">
                                                        <option value="">เลือกยี่ห้อรถ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label required" for="garage">รุ่นรถ</label>
                                                    <select class="form-control input-default" name="modelId" id="modelId">
                                                        <option value="">เลือกรุ่นรถ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label required" for="garage">โฉมรถยนต์</label>
                                                    <select class="form-control input-default" name="detail" id="detail">
                                                        <option value="">เลือกโฉมรถยนต์</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">     
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label required" for="garage">รายละเอียดรุ่น</label>
                                                    <select class="form-control input-default" name="modelofcarId" id="modelofcarId">
                                                        <option value="">เลือกรายละเอียดรุ่น</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="phone">สี</label><span class="error">*</span>
                                                    <input type="text" class="form-control" name="color" id="color" placeholder=" สี" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="color">เลขไมค์</label><!-- <span class="error">*</span> -->
                                                    <input type="number" class="form-control" name="mileage" id="mileage" placeholder="เลขไมค์"  min=0>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="control-label">รูปหน้ารถ</label>
                                                    <div class="image-editor">
                                                        <input type="file" class="cropit-image-input" name="tempImage" required>
                                                        <div class="cropit-preview"></div>
                                                        <div class="image-size-label">ปรับขนาด</div>
                                                        <input type="range" class="cropit-image-zoom-input">
                                                        <input type="hidden" name="picture" class="hidden-image-data" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-lg-4"> 
                                                <button type="submit" class="btn btn-info m-b-10 m-l-5">บันทึก</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>									
						</thead>
					</table>
				</div>
			</div>					
		</div>
	</div>
</div>
