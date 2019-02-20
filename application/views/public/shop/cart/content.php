<div class="shop">
	<div class="container">
		<!-- <h3>จองซ่อมอู่</h3> -->
		<div class="row">
			
            <!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
            <div class="col-md-12">
            <form  id="rigister" class="signup-form">
                <h3>
                    <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                    <span class="title_text">สินค้า</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">เลือกสินค้าที่ต้องการ: </span>
                        <span class="step-number">Step 1 / 3</span>
                    </legend>
                    <div class="row">
						<div class="col-12">
                        	<table class="table table-hover ">
							  	<thead class="orange-table">
							    	<tr >
							      		<th width="10%" scope="col"></th>
								      	<th width="20%" scope="col">รูปสินค้า</th>
								      	<th width="25%" scope="col">ชื่อสินค้า</th>
								      	<th width="20%" scope="col">จำนวน</th>
								      	<th width="15%" scope="col">ราคา</th>
								      	<th width="10%" scope="col"></th>
							    	</tr>
							  	</thead>
							  	<tbody id="cart_list">
							    	<tr>
								      	<td>
								      		<div class="form-check top">
											  	<input class="form-check-input size-check" type="checkbox" id="blankCheckbox" value="option1" >
											</div>
										</td>
								      	<td><img src="<?=base_url()?>public/image/icon/car.png"  class="cart_item_image"></td>
								      	<td><span class="produst-name">ยาง TRW HONDA 2014 </span></td>
								      	<td>
								      		<div class="col-md-12">
									      		<div class="input-group form-group-width ">
									      			<div class="input-group-prepend">
									      				<button type="button" class="btn btn-danger"><i class="fa fa-plus"></i></button>
									      			</div>
													<input type="number" class="form-control" min="1" placeholder="1">
													<div class="input-group-prepend">
														<button type="button" class="btn btn-warning"><i class="fa fa-minus"></i></button>
													</div>
												</div>
								      		</div>
								      	</td>
								      	<td><span class="buy-price">1600 บ.</span></td>
								      	<td><button type="button" class="btn btn-orange"><i class="fa fa-trash"></i></button></td>
								    </tr>
								    <tr>
								    
								    </tr>
							  	</tbody>
							</table>
                        </div>
                        <!-- <div class="underline-line "></div> -->
                        <div class="col-12">
                        	<div class="content text-md-right">
								<span class="text-title"> ราคารวม :</span>
								<span class="amount" id="order_total_amount"></span>
							</div>
                        </div>
                        
					</div>
                </fieldset>


                <h3>
                    <span class="icon"><i class="fa fa-car"></i></span>
                    <span class="title_text">รถยนต์</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">เลือกรถยนต์ที่ต้องการ: </span>
                        <span class="step-number">Step 2 / 3</span>
                    </legend>
                    <div class="row ">
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-create" onclick="createCarConfirm()" ><i class="fa fa-plus"></i>  สร้าง</button>  
                        </div>
                        
                        <div class="col-lg-3 offset-lg-2 mt-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="ยี่ห้อรถ" id="namemechanic">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-light-orange" ><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="" id="skillmechanic">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-light-orange" ><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-orange" id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                        </div>
                    </div>

					<div class="row">	
						<div class="col-md-3">
						  	<div class="card">
						    	<img src="<?=base_url()?>public/image/icon/741407.png"  class="cart_car_image">
						    	<div class="card-body">
						      		<div class="card border-black mb-3" >
									    <div class=" text-center"><h4>นก 5555</h4></div>
									    <div class=" text-center">เลย</div>
									</div>
						    	</div>
						    	<div class="card-footer">
						      		<a href="#"><small class="text-muted underline-text">รายละเอียด</small></a>
						    	</div>
						  	</div>
						</div>
					</div>
                </fieldset>


                <h3>
                    <span class="icon"><i class="fa fa-cog"></i></span>
                    <span class="title_text">อู่ซ่อมรถ</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">เลือกอู่ที่จะเข้าใช้บริการ: </span>
                        <span class="step-number">Step 3 / 3</span>
                    </legend>
                    <div class="row ">
                        <div class="col-lg-4 offset-lg-5 mt-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="ขื่ออู่ซ่อมรถ" id="skillmechanic">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-orange" id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 mt-8">
                            <button type="button" class="btn btn-orang-y" id="search"><i class="fa fa-search"></i>  ค้นหาอู่ใกล้เคียง</i></button>
                        </div>
                    </div>

                    <div class="row">
						<div class="col-md-4">
						  	<div class="card">
						    	<img src="<?=base_url()?>public/image/garage/5c572eaa6c02d.png"  class="cart_car_image">
						    	<div class="card-body">
						      		<div class="title-head text-center">อู่หน้ากอ.</div>
						      		<div class=" text-center">จ.อ.พ.พฤ.ศ.ส.อา.</div>
						      		<div class=" text-center">08:00 - 16:00 น.</div>
						      		
						    	</div>
						    	<div class="card-footer">
						      		<a href="#"><small class="text-muted underline-text">รายละเอียด</small></a>
						    	</div>
						  	</div>
						</div>
						<div class="col-md-4">
						  	<div class="card">
						    	<img src="<?=base_url()?>public/image/garage/5c56f3c8b3fbf.png"  class="cart_car_image">
						    	<div class="card-body">
						      		<div class="title-head text-center">อู่หน้ากอ.</div>
						      		<div class=" text-center">จ.พ.พฤ.ส.อา.</div>
						      		<div class=" text-center">11:00 - 22:00 น.</div>
						    	</div>
						    	<div class="card-footer">
						      		<a href="#"><small class="text-muted underline-text">รายละเอียด</small></a>
						    	</div>
						  	</div>
						</div>
						<div class="col-md-4">
						  	<div class="card">
						    	<img src="<?=base_url()?>public/image/garage/5c572f463ba43.png"  class="cart_car_image">
						    	<div class="card-body">
						      		<div class="title-head text-center">อู่หน้ากอ.</div>
						      		<div class=" text-center">จ.อ.พ.พฤ.ศ.</div>
						      		<div class=" text-center">10:00 - 20:00 น.</div>
						    	</div>
						    	<div class="card-footer">
						      		<a href="#"><small class="text-muted underline-text">รายละเอียด</small></a>
						    	</div>
						  	</div>
						</div>
						
					</div>
					<div class="row"><br></div>
					<h4 class="underline text-center">เลือกเวลาที่ต้องการใช้บริการ</h4>
					<div class="row">
						<div class="col-md-3 offset-lg-3">
							<div class="form-group">
								<label class="form-label required" for="garage">เลือกวันทำการ</label>
								<input type="text" class="form-control" id="reserve_day" name="reserve_day" placeholder="เลือกวันทำการ">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="form-label required" for="garage">เลือกเวลาทำการ</label>
								<input type="text" class="form-control" id="reserve_time" name="reserve_time" placeholder="เลือกเวลาทำการ">
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
					<form id="confirm">
					<div class="row">
						<div class="col-md-12" id="selectGarage">
						<!-- add new car -->
							<!-- <h4 class="underline">เพิ่มข้อมูลรถยนต์ที่ต้องการใช้บริการ</h4> -->
							<form id="submit-create-garage">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="form-label required" for="garage">อักษรนำหน้า</label>
										<input type="text" class="form-control" id="character_plate" name="character_plate" placeholder="อักษร">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="form-label required" for="garage">หมายเลข</label>
										<input type="number" class="form-control" id="number_plate" name="number_plate" placeholder="หมายเลข">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="form-label required" for="garage">จังหวัด</label>
										<select class="form-control input-default" name="province_plate" id="province_plate">
											<option value="">เลือกจังหวัด</option>
											<option value="1">ตรัง</option>
											<option value="2">นครศรีธรรมราช</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="form-label required">ยี่ห้อรถ</label>
										<select class="form-control input-default" name="" id="">
											<option value="">เลือกยี่ห้อรถ</option>
											<option value="toyota">toyota</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="form-label required">รุ่นรถ</label>
										<select class="form-control input-default" name"" id="">
											<option value="">เลือกรุ่นรถ</option>
											<option value="มังกรไฟ">มังกรไฟ</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="form-label required">รายละเอียด</label>
										<select class="form-control input-default" name="" id="">
											<option value="">เลือกรายละเอียด</option>
											<option value="ม่วงงาม">ม่วงงาม</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required">ปีที่ผลิต</label>
										<select class="form-control input-default" name="" id="">
											<option value="">เลือกปีที่ผลิต</option>
											<option value="2012">2012</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label required">โฉมรถ</label>
										<select class="form-control input-default" name="" id="">
											<option value="">เลือกโฉมรถ</option>
											<option value="95">95</option>
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
										<label class="form-label required" for="garage">เลขไมล์</label>
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
