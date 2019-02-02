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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <!-- <table class="table table-nobordered no-head" id="Mechanic-table"> -->
                                    <thead>
                                        <tr><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
												<div class="card">
												<form id="registergarage">
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
																										<input type="hidden" name="garagePicture" id="garagePicture" class="hidden-image-data" />
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
																							<input type="number" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
																						</div>
																						<div class="form-group">
																							<label for="garage">หมายเลขทะเบียนการค้า</label><span class="error">*</span>
																							<input type="number" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="หมายเลขทะเบียนการค้า">
																						</div>
																						<div class="form-group">
																							<label for="garage">ข้อมูลเพิ่มเติม</label><span class="error">*</span>
																							<input type="text" class="form-control" name="comment" style="height: 100px id="comment" placeholder="ข้อมูลเพิ่มเติม">
																						</div>
																						<!-- <div class="form-group" >
																							<label for="exampleTextarea">ข้อมูลเพิ่มเติม</label>
																							<textarea class="form-control" id="exampleTextarea" ></textarea>
																						</div> -->
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
																							<input type="time" class="form-control" name="timestart" id="timestart" placeholder="00 : 00">
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-group">
																							<!-- <label for="exampleFormControlInput1">เวลาปิด</label> -->
																							<input type="time" class="form-control" name="timeend" id="timeend" placeholder="00 : 00">
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
																					<div class="col-md-3">
																						<div class="form-check">
																							<label class="form-check-label" for="garage">
																							<input class="form-check-input" name="allday" id="allday" type="checkbox" value="8">ทุกวัน</label>
																						</div>
																					</div>
																				</div>
																				
																				<div class="row">
																					<div class="col-md-3">
																						<div class="form-group">
																							<label for="garage">บ้านเลขที่</label><span class="error">*</span>
																							<input type="text" class="form-control" name="hno" id="hno" placeholder="บ้านเลขที่">
																						</div>
																					</div>
																					<div class="col-md-3">
																						<div class="form-group">
																							<label for="garage">ซอย</label>
																							<input type="text" class="form-control" name="alley" id="alley" placeholder="หมู่ที่">
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
																							<input type="text" class="form-control" name="village" id="village" placeholder="หมู่ที่">
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
																							<input class="form-control" type="number" name="postCode" id="postCode" placeholder="รหัสไปรษณีย์">
																						</div>
																					</div>
																					<div class="col-md-8">
																						<div class="input-group">
																							<label for="garage"> เก็บตำเเหน่งที่ตั้ง</label><span class="error">*</span>
																						</div>
																						<div class="input-group">
																							<input class="form-control" type="text" name="latitude" id="latitude" placeholder="ละติจูด">
																							<input class="form-control" type="text" name="longtitude" id="longtitude" placeholder="ลองติจูด">
																							<button type="button" class="btn btn-primary" id="coordinates" name="coordinates">เก็บพิกัด</button>
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
																							<input class="form-check-input" name="snack" id="snack" value="4" type="checkbox">ของว่าง</label>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<div class="col-md-12">
																						<div class="form-group">
																							<textarea class="form-control" name="Otherfacilities" id="Otherfacilities" rows="3" placeholder="สิ่งอำนวยความสะดวกอื่นๆ"></textarea>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<!-- <div class="col-md-2">
																						<div class="form-group">
																							<button type="submit" class="btn btn-success btn-block">ก่อนหน้า</button>
																						</div>
																					</div> -->
																					<div class="col-md-2">
																						<div class="form-group">
																							<a  href="<?=base_url("garage/managegarage/update") ?>"><button type="button" class="btn btn-info btn-block" ><i class="fa fa-plus"></i>แก้ไข</button></a>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>       
    </div>

    