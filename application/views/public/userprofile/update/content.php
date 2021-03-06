
            <div class="row col-md-9">
                <div class="card col-lg-12">
                    <form id="submit">
                        <input type="hidden" id="user_profile" name="user_profile" value="<?=$user_profile ?>">
                        <div class="card-body ">
                        <h4>แก้ไขข้อมูลส่วนตัว</h4><hr>
                        <div class="form-group row ">
                            <div class="form-group col-md-2">
                                <label>คำนำหน้า</label> 
                                <select class="form-control" name="titleName" id="titleName" >
                                    <option value="">คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label>ชื่อ</label><span class="error">*</span>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="ชื่อ"  >
                            </div>
                            <div class="form-group col-md-5">
                                <label>นามสกุล</label><span class="error">*</span>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="นามสกุล">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-3">
                                <label>บ้านเลขที่</label><span class="error">*</span>
                                <input type="text" name="hno" id="hno" class="form-control" placeholder="บ้านเลขที่">
                            </div>
                            <div class="form-group col-md-3">
                                <label>หมู่ที่</label><span class="error">*</span>
                                <input type="text" name="village" id="village" class="form-control" placeholder="หมู่ที่">
                            </div>
                            <div class="form-group col-md-3">
                                <label>ถนน</label>
                                <input type="text" name="road" id="road" class="form-control" placeholder="ถนน">
                            </div>
                            <div class="form-group col-md-3">
                                <label>ซอย</label>
                                <input type="text" name="Alley" id="Alley" class="form-control" placeholder="ซอย">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <label>จังหวัด</label><span class="error">*</span>
                                <select class="form-control" name="provinceId" id="provinceId"></select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>อำเภอ</label><span class="error">*</span>
                                <select class="form-control" name="districtId" id="districtId"></select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>ตำบล</label><span class="error">*</span>
                                <select class="form-control" name="subdistrictId" id="subdistrictId"></select>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <label>รหัสไปรษณีย์</label><span class="error">*</span>
                                <input type="text" name="postCodes" id="postCodes" class="form-control" placeholder="รหัสไปรษณีย์" min=0>
                            </div>
                            <div class="form-group col-md-4">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" name="phone1" id="phone1" class="form-control" placeholder="เบอร์โทรศัพท์" min=0>
                            </div>
                            <div class="form-group col-md-4">
                                <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                                <input type="text" name="phone2" id="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้" min=0>
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
