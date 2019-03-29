<div class="page-wrapper bg-container">

        <!-- Bread crumb -->
        <!-- <div class="row page-titles">
        </div> -->
        <div class="row page-titles">
	        <div class="col-md-5 align-self-center">
	            <h3 class="text-primary">ข้อมูลการส่งสินค้า</h3>  
	        </div>
	        <div class="col-md-7 align-self-center">
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/deliverorder"); ?>">ข้อมูลการจัดส่งสินค้า</a></li>
	                <li class="breadcrumb-item active">รายละเอียดการส่งสินค้า</li>
	            </ol>
	        </div>
	    </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="table-responsive"> -->
						<div class="card">
						<form id="submit">	
							<!-- <h3>ผู้ส่ง</h3> -->
							<div class="row ">
								<div class="container">
									<input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>">
										<div class="row">
											<div class="col-md-4">
												<h3>ข้อมูลผู้ส่ง</h3>
												<div class="form-group">
													<label class="form-label" for="mechanic">ชื่อร้านอะไหล่</label><span class="error">*</span>
													<input type="text" class="form-control" name="car_accessoriesName" id="car_accessoriesName" readonly>
												</div>
											</div>
											<div class="col-md-4 offset-lg-2">
												<h3>ข้อมูลผู้รับ</h3>
												<div class="form-group">
													<label class="form-label" for="mechanic">ชื่ออู่</label><span class="error">*</span>
													<input type="text" class="form-control" name="garageName" id="garageName" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 ">
												<div class="form-group">
													<label class="form-label" for="mechanic">หมายเลขโทรศัพท์</label><span class="error">*</span>
													<input type="number" class="form-control" name="phone_car" id="phone_car" readonly>
												</div>
											</div>
											<div class="col-md-4 offset-lg-2 ">
												<div class="form-group">
													<label class="form-label" for="mechanic">หมายเลขโทรศัพท์</label><span class="error">*</span>
													<input type="number" class="form-control" name="phone_garage" id="phone_garage" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="garage">ที่อยู่</label><span class="error">*</span>
													<!-- <input type="text" class="form-control" name="address_car" id="address_ca6" readonly> -->
													<textarea class="form-control sm-text-a" name="address_car" id="address_car" rows="3" readonly></textarea>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="garage">ที่อยู่</label><span class="error">*</span>
													<!-- <input type="text" class="form-control" name="address_garage" id="address_garage" readonly> -->
													<textarea class="form-control sm-text-a" name="address_garage" id="address_garage" rows="3" readonly></textarea>
												</div>
											</div>
										</div>

										<h4 class="underline">รายะเอียดสินค้า</h4>
										<!-- <input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>"> -->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<!-- <label class="form-label" for="mechanic">ชื่ออู่</label><span class="error">*</span> -->
													<input type="text" class="form-control" name="garageName" id="garageName" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<!-- <label class="form-label" for="mechanic">ชื่ออู่</label><span class="error">*</span> -->
													<input type="text" class="form-control" name="garageName" id="garageName" readonly>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<button type="submit" class="btn btn-info m-b-10 m-l-5">บันทึก</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            
						</form>
						</div>
                    <!-- </div> -->
                </div>
            </div>
        <div>       
    </div>

    