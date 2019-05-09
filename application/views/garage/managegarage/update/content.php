<div class="page-wrapper bg-container">

    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">จัดการข้อมูลอู่</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">จัดการข้อมูลอู่</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">    
					<div class="card">
					<form id="submit">
						<div class="shop">
							<div class="container">
								<h3>ข้อมูลอู่ซ่อมรถ</h3>
								<div class="row m-y-2">
									<div class="tab-pane" id="garage"><br>
										<div class="container">
											<!-- <h4 class="underline orange">ข้อมูลอู่ซ่อมรถ</h4> -->
											<div class="row">
												<div class="col-md-6">
													<div class="row p-t-20">
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">รูปร้านอู่ซ่อมรถ</label>
																<div class="image-editor">
																	<input type="file" class="cropit-image-input" name="tempImage">
																	<div class="cropit-preview"></div>
																	<div class="image-size-label">ปรับขนาด</div>
																	<input type="range" class="cropit-image-zoom-input">
																	<input type="hidden" name="picture" id="picture" class="hidden-image-data" />
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6 ">
													<div class="form-group">
														<label for="garage">ชื่ออู่ซ่อมรถ</label><span class="error">*</span>
														<input type="text" class="form-control" name="garageName" id="garageName" placeholder="ชื่ออู่ซ่อมรถ">
													</div>
													<div class="form-group">
														<label for="garage">เบอร์โทรศัพท์</label><span class="error">*</span>
														<input type="number" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" min=0 >
													</div>
													<div class="form-group">
														<label for="garage">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
														<input type="number" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า" min=0 >
													</div>
													<div class="form-group">
														<label class="control-label">ความชำนาญยี่ห้อรถ</label><span class="error">*</span> <label id="brandId-error" class="error" for="brandId"></label>
														<div class="input-group input-group-default">
															<select class="form-control" id="brandId" name="brandId">
																<option>เลือกยี่ห้อรถ</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label for="garage"><h4>การบริการ</h4></label><span class="error">*</span>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="change_spare" id="change_spare" type="checkbox" value="11">บริการเปลี่ยนอะไหล่</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="change_tire" id="change_tire" type="checkbox" value="12">บริการเปลี่ยนยางรถ</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="change_lubricator" id="change_lubricator" type="checkbox" value="13">บริการเปลี่ยนน้ำมันเครื่อง</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="garage"><h4>ช่วงเวลาเปิดทำการ</h4></label><span class="error">*</span>
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="form-group">
														<!-- <label for="exampleFormControlInput1">เวลาปิด</label> -->
														<input type="time" class="form-control" name="openingtime" id="openingtime" placeholder="00 : 00">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<!-- <label for="exampleFormControlInput1">เวลาปิด</label> -->
														<input type="time" class="form-control" name="closingtime" id="closingtime" placeholder="00 : 00">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="monday" id="monday" type="checkbox" value="1">จันทร์</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label"  for="garage">
														<input class="form-check-input" name="tuesday" id="tuesday" type="checkbox" value="2">อังคาร</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="wednesday" id="wednesday" type="checkbox" value="3">พุธ</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="thursday" id="thursday" type="checkbox" value="4">พฤหัสบดี</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="friday" id="friday" type="checkbox" value="5">ศุกร์</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="saturday" id="saturday" type="checkbox" value="6">เสาร์</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="sunday" id="sunday" type="checkbox" value="7">อาทิตย์</label>
													</div>
												</div>
												<!-- <div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="allday" id="allday" type="checkbox" value="8">ทุกวัน</label>
													</div>
												</div> -->
											</div>
											
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label for="garage">บ้านเลขที่</label><span class="error">*</span>
														<input type="text" class="form-control" name="hno" id="hno" placeholder="บ้านเลขที่" min=0 >
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="garage">ซอย</label>
														<input type="text" class="form-control" name="alley" id="alley" placeholder="หมู่ที่" min=0 >
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="garage">ถนน</label>
														<input type="text" class="form-control" name="road" id="road" placeholder="ถนน">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="garage">หมู่ที่</label>
														<input type="text" class="form-control" name="village" id="village" placeholder="หมู่ที่" min=0 >
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="garage">จังหวัด</label><span class="error">*</span>
														<select class="form-control" name="provinceId" id="provinceId">
															<option>จังหวัด</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="garage">อำเภอ</label><span class="error">*</span>
														<select class="form-control" name="districtId" id="districtId">
															<option>อำเภอ</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="garage">ตำบล</label><span class="error">*</span>
														<select class="form-control" name="subdistrictId" id="subdistrictId">
															<option>ตำบล</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="garage">รหัสไปรษณีย์</label><span class="error">*</span>
														<input class="form-control" type="number" name="postCode" id="postCode" placeholder="รหัสไปรษณีย์" min=0 >
													</div>
												</div>
												<div class="col-md-8">
													<div class="input-group">
														<label for="garage"> เก็บตำเเหน่งที่ตั้ง</label><span class="error">*</span>
													</div>
													<div class="input-group">
														<input class="form-control" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
														<input class="form-control" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
														<button type="button" class="btn btn-primary" id="coordinates" name="coordinates" onclick="getLocation()">เก็บพิกัด</button>
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="garage">สิ่งอำนวยความสะดวก</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="Wifi" id="Wifi" value="1" type="checkbox">Wifi</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label"  for="garage">
														<input class="form-check-input" name="roomfan" id="roomfan" value="2" type="checkbox">ห้องพักพัดลม</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="roomAir" id="roomAir" value="3" type="checkbox">ห้องพักเเอร์</label>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-check">
														<label class="form-check-label" for="garage">
														<input class="form-check-input" name="snack" id="snack" value="4" type="checkbox">ห้องน้ำ</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea class="form-control" name="option_outher" id="option_outher" rows="3" placeholder="สิ่งอำนวยความสะดวกอื่นๆ"></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<!-- <div class="col-md-2">
													<div class="form-group">
														<button type="submit" class="btn btn-success btn-block">ก่อนหน้า</button>
													</div>
												</div> -->
												<div class="col-md-1">
													<div class="form-group">
														<button type="submit" class="btn btn-info m-b-10 m-l-5">บันทึก</button>
													</div>
												</div>
												<div class="col-md-2">
													<!-- <div class="form-group">
														<button type="button" class="btn btn-Secondary" data-toggle="modal" data-target="#exampleModal1">กรอกรายละเอียดข้อมูลอู่เพิ่มเติม</button>
													</div> -->
													<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">รายละเอียดข้อมูลอู่เพิ่มเติม</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<textarea class="form-control" rows="5" cols="50" id="comment" style="height: auto"></textarea>
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
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					</div>             
                    
                </div>
            </div>
        </div>
   
    </div>

    