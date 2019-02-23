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
							<a class="nav-link active" href="<?=base_url("public/userprofile") ?>">ข้อมูลส่วนตัว</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ออกจากระบบ</a>
						</li>
					</ul>
				</div>
            </div>
            <div class="row col-md-9">
                <div class="card col-lg-12">
                    <form id="submit">
                        <input type="hidden" id="user_profile" name="user_profile" value="<?=$user_profile ?>">
                        <div class="card-body ">
                        <h4>ข้อมูลส่วนตัว</h4><hr>
                        <div class="row ">
                            <div class="form-group col-md-4 ">
                                <label>ชื่อ-นามสกุล :</label>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="size-text-user" name="titleName" id="titleName"> </label>
                                <label class="size-text-user" name="firstname" id="firstname"> </label>
                                <label class="size-text-user" name="lastname" id="lastname"> </label>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-group col-md-4">
                                <label>เบอร์โทรศัพท์ :</label>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="size-text-user" name="phone1" id="phone1" ></label>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-group col-md-4">
                                <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้ :</label>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="size-text-user" name="phone2" id="phone2"></label>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-group col-md-4">
                                <label>รายละเอียดที่อยู่ :</label>
                            </div>
                            <div class="form-group col-md-8">
                                <span class="size-text-user" name="hno" id="hno"></span>
                                <span class="size-text-user" name="village" id="village"></span>
                                <span class="size-text-user" name="road" id="road"></span>
                                <span class="size-text-user" name="alley" id="alley"></span> 
                                <span class="size-text-user" name="subdistrictName" id="subdistrictName"></span>
                                <span class="size-text-user" name="districtName" id="districtName"></span>
                                <span class="size-text-user" name="provinceName" id="provinceName"></span>
                                <span class="size-text-user" name="postCodes" id="postCodes"></span>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a  href="<?=base_url("public/userprofile/update") ?>"><button type="button" class="btn btn-warning col-md-2  ><i class="fas fa-edit></i>แก้ไข</button></a>
                                </div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>			
		</div>
	</div>
</div>
