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

							<div class="row">
								<input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>">

								<div class="col-md-6">
									<h3>ข้อมูลผู้ส่ง</h3>
									<div class="form-group">
										<label class="form-label" for="car_accessory">ชื่อร้านอะไหล่ :</label>
										<label class="form-label" for="car_accessory" name="car_accessoriesName" id="car_accessoriesName">กขจ ยานยนต์จำกััด</label>
										<div></div>
										<label class="form-label" for="car_accessory">หมายเลขโทรศัพท์ติดต่อ :</label>
										<label class="form-label" for="car_accessory" name="phone_car" id="phone_car">0819791605</label>
										<div></div>
										<label class="form-label" for="car_accessory">ที่อยู่ :</label>
										<label class="form-label" for="car_accessory">269/65 หมู่ 4 ซอย.เบจมะ</label><div></div>
										<label class="form-label" for="car_accessory">ต.เวียงสระ  อ.เวียงสระ </label><div></div>
										<label class="form-label" for="car_accessory">จ. สุราษฎ์ธานี 80160</label><div></div>
										
									</div>
									<!-- <div class="form-group">
										<label class="form-label" for="car_accessory">หมายเลขโทรศัพท์ติดต่อ :</label>
										<label class="form-label" for="car_accessory" name="phone_car" id="phone_car">0819791605</label>
									</div> -->
									<!-- <div class="form-group">
										<label class="form-label" for="car_accessory">ที่อยู่ :</label>
										<label class="form-label" for="car_accessory">ที่อยู่ :</label><br>
										<label class="form-label" for="car_accessory">ที่อยู่ :</label><br>
										<label class="form-label" for="car_accessory">ที่อยู่ :</label><br>
										<textarea class="form-control sm-text-a" name="address_car" id="address_car" rows="3" readonly></textarea>
									</div> -->
								</div>
								<div class="col-md-6">
									<h3>ข้อมูลผู้รับ</h3>
									<div class="form-group">
										<label class="form-label" for="garage">ชื่ออู่ :</label>
										<label class="form-label" for="garage" name="garageName" id="garageName">ช่างยนต์ มีเดีย</label>
										<div></div>
										<label class="form-label" for="garage">หมายเลขโทรศัพท์ติดต่อ :</label>
										<label class="form-label" for="garage" name="phone_garage" id="phone_garage">0833969552</label>
										<div></div>
										<label class="form-label" for="garage">ที่อยู่ :</label>
										<label class="form-label" for="garage">248/31 หมู่ 1</label><div></div>
										<label class="form-label" for="garage">ต.ท่าศาลา  อ.ท่าศาลา</label><div></div>
										<label class="form-label" for="garage">จ.นครศรีธรรมราช 84190</label><div></div>
									</div>
									<!-- <div class="form-group">
										<label class="form-label" for="garage">หมายเลขโทรศัพท์ติดต่อ :</label>
										<label class="form-label" for="garage" name="phone_garage" id="phone_garage">0833969552</label>
									</div>
									<div class="form-group">
										<label class="form-label" for="garage">ที่อยู่ :</label>
										<label class="form-label" for="garage">ที่อยู่ :</label><br>
										<label class="form-label" for="garage">ที่อยู่ :</label><br>
										<label class="form-label" for="garage">ที่อยู่ :</label><br>
										<textarea class="form-control sm-text-a" name="address_garage" id="address_garage" rows="3" readonly></textarea>
									</div> -->

								</div>
								<div class="col-md-12">
									<h4 class="underline">รายะเอียดสินค้า</h4>
									<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th  scope="col"><i class="fa fa-sort"></i> ลำดับ</th>
                                                <th  scope="col"><i class="fa fa-picture-o"\></i> รูป</th>
                                                <th  scope="col"> ชื่อสินค้า</th>
                                                <th  scope="col"> จำนวน</th>
                                                <th  scope="col"><i class="fa fa-usd" ></i> ราคา</th>
                                                <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="showOrder">
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="col"><img src="/public/image/brand/5bc1709a5cc29.png"  class="brand-image"></th>
                                                <th scope="col">โชคอัพหน้า trw</th>
                                                <th scope="col">2</th>
                                                <th scope="col">4200</th>
                                                <th></th>
                                               
                                            </tr>
                                        </tbody>
                                    </table>
										
									<div class="form-group">
										<button type="submit" class="btn btn-info m-b-10 m-l-5">พิมพ์</button>
									</div>	
								</div>
							</div>

							<!-- <h3>ผู้ส่ง</h3>
							<div class="row ">
							<div class="col-md-6">
								<div class="container">
									<input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>">
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="container">
									<input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>">
									</div>
								</div>
							</div>
							</div>

							<div class="row ">
							<div class="col-lg-6">
								<div class="container">
									<input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>">
										<h4 class="underline">รายะเอียดสินค้า</h4>
										<input type="hidden" name="orderId" id="orderId" value="<?=$orderId ?>">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label" for="mechanic">ชื่ออู่</label><span class="error">*</span>
													<input type="text" class="form-control" name="garageName" id="garageName" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label" for="mechanic">ชื่ออู่</label><span class="error">*</span>
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
							</div> -->
                            
						</form>
						</div>
                    <!-- </div> -->
                </div>
            </div>
        <div>       
    </div>

    