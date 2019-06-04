
            <div class="row col-md-9">
                <div class="card col-lg-12">
                    <form id="submit">
                        <!-- <input type="hidden" id="user_profile" name="user_profile" value="<?=$user_profile ?>"> -->
                        <div class="card-body ">
                        <h3 class="text-primary">สร้างข้อมูลรถ</h3>
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <label>อักษรนำหน้า</label><span class="error">*</span>
                                <input type="text" class="form-control" name="character_plate" id="character_plate" placeholder="อักษรนำหน้า">
                            </div>
                            <div class="form-group col-md-4">
                                <label>หมายเลข</label><span class="error">*</span>
                                <input type="number" class="form-control" name="number_plate" id="number_plate" placeholder="หมายเลข" min=0 >
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label class="form-label required" for="garage">จังหวัด</label>
                                    <select class="form-control input-default" name="province_plate" id="province_plate"></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label class="form-label required" for="garage">ยี่ห้อ</label>
                                    <select class="form-control input-default" name="brandId" id="brandId">
                                        <option value="">เลือกยี่ห้อรถ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label class="form-label required" for="garage">รุ่นรถ</label>
                                    <select class="form-control input-default" name="modelId" id="modelId">
                                        <option value="">เลือกรุ่นรถ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label class="form-label required" for="garage">โฉมรถยนต์</label>
                                    <select class="form-control input-default" name="detail" id="detail">
                                        <option value="">เลือกโฉมรถยนต์</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label class="form-label required" for="garage">รายละเอียดรุ่น</label>
                                    <select class="form-control input-default" name="modelofcarId" id="modelofcarId">
                                        <option value="">เลือกรายละเอียดรุ่น</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">สี</label><span class="error">*</span>
                                <input type="text" class="form-control" name="color" id="color" placeholder=" สี" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="color">เลขไมค์</label><!-- <span class="error">*</span> -->
                                <input type="number" class="form-control" name="mileage" id="mileage" placeholder="เลขไมค์"  min=0>
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="control-label">รูปหน้ารถ</label>
                                    <div class="image-editor">
                                        <input type="file" class="cropit-image-input" name="tempImage" required>
                                        <div class="cropit-preview"></div>
                                        <div class="image-size-label">ปรับขนาด</div>
                                        <input type="range" class="cropit-image-zoom-input">
                                        <input type="hidden" name="picture" class="hidden-image-data" />
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                <button type="submit" class="btn btn-success ">บันทึก</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>			
		</div>
		
	</div>
</div>
