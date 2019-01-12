<div class="super_container">
		

	<!-- Cart -->
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">ตะกร้าสินค้า</div>
						<div class="cart_items">
							<ul id="cart_list" class="cart_list">
								
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">ราคารวม:</div>
								<div class="order_total_amount" id="order_total_amount"></div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_checkout" onclick="continueShop()">เลือกซื้อสินค้าต่อ</button>
							<button type="button" class="button cart_button_checkout" onclick="orderConfirm()">ยืนยันทำรายการ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" id="selectgarage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">การใช้บริการ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" id="selectGarage">
							<h4 class="underline">เลือกอู่ซ่อมรถที่ต้องการใช้บริการ</h4>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="garage">เลือกอู่ซอมรถ</label>
										<select class="form-control" id="garage" name="garageId"></select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="garage">เลือกวันทำการ</label>
										<input type="text" class="form-control" id="reserve_day" name="reserve_day" placeholder="เลือกวันทำการ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="garage">เลือกเวลาทำการ</label>
										<input type="text" class="form-control" id="reserve_time" name="reserve_time" placeholder="เลือกเวลาทำการ">
									</div>
								</div>
							</div>
							<h4 class="underline">เลือกรถยนต์ที่จะเข้าใช้บริการ</h4>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button type="button" id="addNewCar" class="btn btn-orange btn-sm"><span class="fas fa-plus"></span> เพิ่มข้อมูลรถ</button>
										<small>*หากต้องการเพิ่มข้อมูลรถ กดปุ่มเพิ่มข้อมูลรถ</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="garage">เลือกป้ายทะเบียนรถ</label>
										<select class="form-control" id="plate" name="plate"></select>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-orange" onclick="createOrderDetail()"><span class="fas fa-save"></span> บันทึก</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-times"></span> ปิด</button>
							</div>
						</div>
					<!-- add new car -->
						<div class="col-md-6 leftline" id="addNewCarprofile" style="display:none;">
							<h4 class="underline">เพิ่มข้อมูลรถยนต์ที่ต้องการใช้บริการ</h4>
							<form id="submit">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="garage">อักษรนำหน้า</label><span class="error">*</span>
										<input type="text" class="form-control" id="character_plate" name="character_plate" placeholder="อักษร">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="garage">หมายเลข</label><span class="error">*</span>
										<input type="text" class="form-control" id="number_plate" name="number_plate" placeholder="หมายเลข">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="garage">จังหวัด</label><span class="error">*</span>
										<select class="form-control input-default" name="province_plate" id="province_plate">
											<option value="">เลือกจังหวัด</option>
											<option value="ตรัง">ตรัง</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">ยี่ห้อรถ</label><span class="error">*</span>
										<select class="form-control input-default" name="" id="">
											<option value="">เลือกยี่ห้อรถ</option>
											<option value="toyota">toyota</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">รุ่นรถ</label><span class="error">*</span>
										<select class="form-control input-default" name"" id="">
											<option value="">เลือกรุ่นรถ</option>
											<option value="มังกรไฟ">มังกรไฟ</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">รายละเอียด</label><span class="error">*</span>
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
										<label class="control-label">ปีที่ผลิต</label><span class="error">*</span>
										<select class="form-control input-default" name"" id="">
											<option value="">เลือกปีที่ผลิต</option>
											<option value="2012">2012</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">โฉมรถ</label><span class="error">*</span>
										<select class="form-control input-default" name"" id="">
											<option value="">เลือกโฉมรถ</option>
											<option value="95">95</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="garage">สีรถ</label><span class="error">*</span>
										<input type="text" class="form-control" id="color" name="color" placeholder="สีรถ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="garage">เลขไมล์</label><span class="error">*</span>
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
								<button type="button" class="btn btn-secondary" id="newCarClose"><span class="fas fa-times"></span> ปิด</button>		
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


