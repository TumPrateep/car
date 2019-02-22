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
							<a class="nav-link active" href="public/userprofile/">ข้อมูลส่วนตัว</a>
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
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <label>ชื่อ-นามสกุล</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อ" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" name="phone1" id="phone1" class="form-control" placeholder="เบอร์โทรศัพท์" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label>
                                <input type="text" name="phone2" id="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้" readonly>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-12">
                                <label>ที่อยู่</label>
                                <textarea class="form-control" name="address" id="address" rows="3" readonly></textarea>            
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a  href="<?=base_url("public/userprofile/update") ?>"><button type="button" class="btn btn-warning col-md-2  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไข</button></a>
                                </div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>			
		</div>
	</div>
</div>
