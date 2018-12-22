<div class="shop">
	<div class="container">
		<!-- Trigger the modal with a button -->
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalselectgarage">เลือกอู่ซ่อมรถ</button>
		<!-- Modal -->
		<div class="modal fade" id="Modalselectgarage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
									<select class="form-control" id="selectgarage" name="selectgarage">
										<option>ชื่ออู่ซ่อมรถ</option>
									</select>
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
									<select class="form-control" id="selectgarage" name="selectgarage">
										<option>เลือกป้ายทะเบียน</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<button type="button" id="addNewCar" class="btn btn-primary">เพิ่มข้อมูลรถ</button>
								</div>
							</div>
						</div>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        				<button type="button" class="btn btn-primary">บันทึก</button>
      				</div>
    			</div>
  			</div>
		</div>

		<!-- insert new garage -->
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddNewCat">เพิ่มข้อมูลรถยนต์</button>
		<!-- Modal -->
		<div class="modal fade" id="ModalAddNewCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
       					<h4 class="underline">เพิ่มข้อมูลรถยนต์ที่ต้องการใช้บริการ</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="garage">อักษรนำหน้า</label>
									<input type="text" class="form-control" id="character" name="character" placeholder="อักษร">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="garage">หมายเลข</label>
									<input type="text" class="form-control" id="labelCarNumber" name="labelCarNumber" placeholder="หมายเลข">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="garage">จังหวัด</label>
									<input type="text" class="form-control" id="provinceforcar" name="provinceforcar" placeholder="จังหวัด">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">ยี่ห้อรถ</label>
			                        <select class="form-control input-default" name="brandId" id="brandId">
			                            <option value="">เลือกยี่ห้อรถ</option>
			                            <option value="">CHEVROLET</option>
			                            <option value="">HONDA</option>
			                            <option value="">ISUZU</option>
			                            <option value="">FORD</option>
			                            <option value="">MAZDA</option>
			                            <option value="">TOYOTA</option>
			                        </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="garage">สีรถ</label>
									<input type="text" class="form-control" id="colorCar" name="colorCar" placeholder="สีรถ">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="garage">เลขไมล์</label>
									<input type="text" class="form-control" id="mileage" name="mileage" placeholder="เลขไมล์">
								</div>
							</div>
						</div>
						
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        				<button type="button" class="btn btn-primary">บันทึก</button>
      				</div>
    			</div>
  			</div>
		</div>
	</div>
</div>
