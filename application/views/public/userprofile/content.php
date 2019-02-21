<div class="shop">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัว</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">	
					<ul class="nav flex-column nav-control">
						<li class="nav-item">
							<a class="nav-link " href="#">รายการสั่งซื้อ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="#">ข้อมูลรถ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">ข้อมูลส่วนตัว</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ออกจากระบบ</a>
						</li>
					</ul>
				</div>
            </div>
            <div class="row col-md-9">
                <div class="col-lg-12">
                    <form id="submit">
                        <input type="hidden" id="user_profile" name="user_profile" value="<?=$user_profile ?>">
                        <div class="card-body black bg-light ">
                        <h4>ข้อมูลส่วนตัว</h4>
                        <div class="form-group row ">
                            <div class="form-group col-md-2">
                                <label>คำนำหน้า</label> 
                                <select class="form-control" name="titleName" id="titleName" >
                                    <option value=""> </option >
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
                            <div class="form-group col-md-12">
                                <label>ที่อยู่</label><span class="error">*</span>
                                <textarea class="form-control" name="address" id="address" rows="3"></textarea>            
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
                            <div class="form-group col-md-6">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" name="phone1" id="phone1" class="form-control" placeholder="เบอร์โทรศัพท์">
                            </div>
                            <div class="form-group col-md-6">
                                <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                                <input type="text" name="phone2" id="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a  href="<?=base_url("public/userprofile/update") ?>"><button type="button" class="btn btn-warning col-md-2 offset-md-10" ><i class="fa fa-edit" aria-hidden="true"></i>แก้ไข</button></a>
                                </div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>			
		</div>
	</div>
</div>
