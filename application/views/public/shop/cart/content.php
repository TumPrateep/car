<div class="shop">
	<div class="container container-mobile">
		<!-- <h3>จองซ่อมอู่</h3> -->
		<div class="row">
			
            <!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
            <div class="col-md-12">
            <form  id="rigister" class="signup-form">
				<!-- Step 1 -->
                <h3>
                    <span class="icon"><i class="fa fa-car"></i></span>
                    <span class="title_text">รถยนต์</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">เลือกรถยนต์ที่ต้องการ: </span>
						<span class="step-number">Step 1 / 4</span>
					</legend>
					<div class="alert alert-danger hide" role="alert">
						<strong>คำเตือน!</strong> เลือกรถยนต์ที่ต้องการ
					</div>
                    <!-- <div class="row justify-content-between"> -->
                    <div class="row ">
						<div class="col-lg-6">
							<div class="row ">
								<div class="col-lg-4">
									<div class="form-group">
										<button type="button" class="btn btn-create btn-block" onclick="createCarConfirm()"><i class="fa fa-plus"></i>  สร้าง</button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="ค้นหารถ" id="searchCar">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<button type="button" class="btn btn-info btn-block" id="search-car"><i class="fa fa-search"></i>  ค้นหา</i></button>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<br>
					<div class="row">
						
						<div class="col-md-12">
							<input type="hidden" name="carProfileId" id="image-picker-car">
							<div class="table-responsive" >
								<table class="table table-bordered" id="order-table" width="100%" cellspacing="0"></table>
							</div>
							<!-- <select class="image-picker show-html" id="image-picker-car" name="carProfileId"></select> -->
						</div>
					</div>
                </fieldset>				

				<!-- Step 2 -->
				<h3>
                    <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                    <span class="title_text">สินค้า</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">เลือกสินค้าที่ต้องการ:	 </span>
                        <span class="step-number">Step 2 / 4</span>
					</legend>
					<div class="alert alert-danger hide" role="alert">
						<strong>คำเตือน!</strong> เลือกสินค้าที่ต้องการ
					</div>
                    <div class="row">
						<div class="col-12">
							<div class="">
	                        	<table class="table table-hover" id="cart-table">
								  	<thead class="orange-table">
								    	<tr >
								      		<th width="5%" scope="col"></th>
									      	<th scope="col"></th>
								    	</tr>
								  	</thead>
								  	<tbody id="cart_list"></tbody>
									<tfoot>
										<tr>
											<th colspan="2" class="text-right"><div class="row"><div class="col-7"><span class="amount">ราคาสินค้า : </span></div><div class="col"><span class="amount" id="order_total_cost"></span></div></div></th>
										</tr>
										<tr>
											<th colspan="2" class="text-right"><div class="row"><div class="col-7"><span class="amount">ราคาค่าขนส่ง : </span></div><div class="col"><span class="amount" id="order_total_delivery"></span></div></div></th>
										</tr>
										<tr>
											<th colspan="2" class="text-right"><div class="row"><div class="col-7"><span class="amount">ราคารวม : </span></div><div class="col"><span class="amount" id="order_total_amount"></span></div></div></th>
										</tr>
									</tfoot>
								</table>
							</div>
                        </div>
                        
					</div>
                </fieldset>
                
				<!-- Step 3  -->
                <h3>
                    <span class="icon"><i class="fa fa-cog"></i></span>
                    <span class="title_text">อู่ซ่อมรถ</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">เลือกอู่ที่จะเข้าใช้บริการ: </span>
                        <span class="step-number">Step 3 / 4</span>
					</legend>
					<div class="alert alert-danger hide" role="alert">
						<strong>คำเตือน!</strong> เลือกอู่ที่ต้องการ
					</div>
                    <div class="row justify-content-between">
						<!-- <div class="col col-lg-2"></div> -->
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="ค้นหาอู่" id="garagename">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<button type="button" class="btn btn-info btn-block" id="btn-search-garage"><i class="fa fa-search"></i>  ค้นหา</i></button>
									</div>
								</div>
							</div>
						</div>

                    </div>
					<br>
                    <div class="row">
						<div class="col-md-12">
							<input type="hidden" id="image-picker" name="garageId">
							<table class="table table-bordered" id="search-table" width="100%" cellspacing="0"></table>
						</div>
					</div>
					<br>
					<div id="showReserve" class="hidden">
						<h4 class="underline text-center">เลือกเวลาที่ต้องการใช้บริการ</h4>
						<div class="row justify-content-md-center">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-label required">เลือกวันเวลาที่จอง</label>
									<input type="text" class="form-control" id="reserve" name="reserve" placeholder="เลือกวันทำการ">
								</div>
							</div>
						</div>
					</div>
                </fieldset>

				<h3>
					<span class="icon"><i class="fa fa-credit-card"></i></span>
					<span class="title_text">การจ่ายเงิน</span>
				</h3>
				<fieldset>
					<legend>
						<span class="step-heading">เลือกรูปแบบการจ่ายเงินที่ต้องการ: </span>
						<span class="step-number">Step 4 / 4</span>
					</legend>
					<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-md-2">
									<div class="row p-t-20">
										<div class="col-md-12">
											<div class="form-group">
												<div class="" id="garage">
													<img src="http://localhost/car//public/image/carprofile/5cef545b621a3.png" width="100%">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-10">
									<div class="card">
										<div class="card-body"> 
										<h4><label><u>อู่ที่เข้าใช้บริการ</u></label></h4>
											<div class="row ">
												<div class="col-md-3 "><label class="txt-S-s">ชื่ออู่</label></div>
												<div class="col-md-8">
													<label class="txt-S-s" id="o-garageName"></label>
												</div>
											</div>
											<div class="row ">
												<div class="col-md-3 "><label class="txt-S-s">วันที่จอง</label></div>
												<div class="col-md-8">
													<label class="txt-S-s text-red" id="o-reserveday"></label>
												</div>
											</div>
										</div>
									</div>
								</div>  
							</div>
							<div class="row">
								<div class="col-md-2">
									<div class="row p-t-20">
										<div class="col-md-12">
											<div class="form-group">
												<img id="carpicture" src="" width="100%">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-10">
									<div class="card">
										<div class="card-body">
											<div class="row "> 
												<div class="col-md-3">
													<h4><label><u>รถที่เข้าใช้บริการ</u></label></h4>
												</div>
												<div class="col-md-4 txt-cen-order cen-card">
													<div class="card card-border text-center">
														<div class="card-body-plate ">
															<label class="txt-S-m" name="plate" id="plate">กด 123</label>
															<label class="txt-S-s" name="provinceplate" id="provinceplate">กรุงเทพมหานคร</label>
														</div>
													</div>   
												</div>
											</div>  
										</div>
									</div>
								</div> 
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<table class="table">
										<tfoot>
											<tr>
												<th colspan="4" class="text-right"><div class="row"><div class="col-7"><span class="amount">ราคารวม : </span></div><div class="col"><span class="amount" id="o_total_amount"></span></div></div></th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</fieldset>

                    
            </form>
            </div>
        
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" id="selectcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลรถยนต์ที่ต้องการใช้บริการ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" id="selectGarage">
						<!-- add new car -->
							<!-- <h4 class="underline">เพิ่มข้อมูลรถยนต์ที่ต้องการใช้บริการ</h4> -->
							<form id="submit-create-car-profile">
							<div class="row">
                                <div class="col-md-6">
									<div class="row p-t-20">
					                	<div class="col-md-12">
					             			<div class="form-group">
					                            <label class="control-label">รูปรถยน์</label>
					                         	<div class="image-editor ">
					                            	<input type="file" class="cropit-image-input" name="tempImage">
					                            	<div class="cropit-preview picture-center"></div>
					                          		<div class="image-size-label">ปรับขนาด</div>
					                    			<input type="range" class="cropit-image-zoom-input">
					                 				<input type="hidden" name="picture" id="picture" class="hidden-image-data" />
					                  			</div>
					             			</div>
					           			</div>
					                </div>
				                </div>
                                
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label " for="car-profile">ตัวอักษร</label>
										<input type="text" class="form-control" id="character_plate" name="character_plate" placeholder="ตัวอักษร">
									</div>
									<div class="form-group">
										<label class="form-label required" for="car-profile">หมายเลข</label>
										<input type="number" class="form-control" id="number_plate" name="number_plate" placeholder="หมายเลข">
									</div>
									<div class="form-group">
										<label class="form-label required" for="car-profile">จังหวัด</label>
										<select class="form-control input-default" name="province_plate" id="province_plate">
											
										</select>
									</div>
									<div class="card border-black-plate from-padding">
										<div class="form-group text-center">
											<span class="txt-S-m" id="characterofcar" name="characterofcar"></span>
											<span class="txt-S-m" id="numberofcar" name="numberofcar"></span>
										</div>
										<div class="form-group text-center">
											<h4><span id="provincecar" name="provincecar"></span></h4>
										</div>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required">ยี่ห้อรถ</label>
										<select class="form-control input-default" name="brandId" id="brandId">
											<option value="">เลือกยี่ห้อรถ</option>
											<!-- <option value="toyota">toyota</option> -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required">รุ่นรถ</label>
										<select class="form-control input-default" name="modelId" id="modelId">
											<option value="">เลือกรุ่นรถ</option>
											<!-- <option value="มังกรไฟ">มังกรไฟ</option> -->
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required">โฉมรถยนต์</label>
										<select class="form-control input-default" name="detail" id="detail">
											<option value="">เลือกปีที่ผลิต</option>
											<!-- <option value="2012">2012</option> -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required">รายละเอียดรุ่น</label>
										<select class="form-control input-default" name="modelofcarId" id="modelofcarId">
											<option value="">เลือกโฉมรถ</option>
											<!-- <option value="95">95</option> -->
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required" for="garage">สีรถ</label>
										<input type="text" class="form-control" id="color" name="color" placeholder="สีรถ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label" for="garage">เลขไมล์</label>
										<input type="text" class="form-control" id="mileage" name="mileage" placeholder="เลขไมล์">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a href="#">วิธีการดูข้อมูลรถ</a>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-orange"><span class="fas fa-save"></span> บันทึก</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-times"></span> ปิด</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>