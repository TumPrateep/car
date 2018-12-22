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

	<div class="modal fade" id="selectgarage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">การใช้บริการ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
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
								<label for="garage">เลือกป้ายทะเบียนรถ</label>
								<select class="form-control" id="plate" name="plate"></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<button type="button" id="addNewCar" class="btn btn-orange"><span class="fas fa-plus"></span> เพิ่มข้อมูลรถ</button>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-orange"><span class="fas fa-save"></span> บันทึก</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-times"></span> ปิด</button>
				</div>
			</div>
		</div>
	</div>


