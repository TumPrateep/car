<div class="page-wrapper bg-container">

        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">จัดการข้อมูลอู่</h3> 
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">จัดการข้อมูลเจ้าของอู่</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
						<div class="card">
						<form id="submit">	
							<h3>ข้อมูลเจ้าของอู่</h3>
							<div class="row m-y-2">
									<div class="container">
										<!-- <h4 class="underline orange">ข้อมูลอู่ซ่อมรถ</h4> -->
										<div class="row">
											<div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label class="control-label">รูปเจ้าของอู่</label>
                                                    <div class="image-editor">
                                                        <input type="file" class="cropit-image-input" name="tempImage">
                                                        <div class="cropit-preview"></div>
                                                        <div class="image-size-label">ปรับขนาด</div>
                                                        <input type="range" class="cropit-image-zoom-input">
                                                        <input type="hidden" name="Picture" id="Picture" class="hidden-image-data" />
                                                    </div>
                                                </div>
											</div>
											
										</div>
										<div class="row">
											<div class="col-md-2">
												<div class="form-group">
													<label class="form-label" for="mechanic">คำนำหน้า</label><span class="error">*</span>
													<select class="form-control" name="titleName_user" id="titleName_user">
														<option value=""></option>
														<option value="1">นาย</option>
														<option value="2">นาง</option>
														<option value="3">นางสาว</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="form-label" for="mechanic">ชื่อ</label><span class="error">*</span>
													<input type="text" class="form-control" name="firstName" id="firstName" placeholder="ชื่อ">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="form-label" for="mechanic">นามสกุล</label><span class="error">*</span>
													<input type="text" class="form-control" name="lastName" id="lastName" placeholder="นามสกุล">
												</div>
											</div>
											<div class="col-md-2 ">
												<div class="form-group">
													<label class="form-label" for="mechanic">ประสบการณ์</label><span class="error">*</span>
													<input type="number" class="form-control" name="exp" id="exp" placeholder="ประสบการณ์(ปี)">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="garage">เลขรหัสบัตรประชาชน</label><span class="error">*</span>
													<input type="text" class="form-control" name="personalid" id="personalid" placeholder="เลขรหัสบัตรประชาชน">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="form-label" for="mechanic">ความชำนาญ</label><span class="error">*</span>
													<input type="text" class="form-control" name="skill" id="skill" placeholder="ความชำนาญ">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="form-label" for="mechanic">เบอร์โทรศัพท์</label><span class="error">*</span>
													<input type="number" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
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
                    </div>
                </div>
            </div>
        <div>       
    </div>

    