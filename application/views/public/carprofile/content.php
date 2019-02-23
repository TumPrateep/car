<div class="shop">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page">รายการสั่งซื้อ</li>
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
							<a class="nav-link active" href="#">ข้อมูลรถ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ข้อมูลส่วนตัว</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ออกจากระบบ</a>
						</li>
					</ul>
				</div>
            </div>
			
			<div class="col-lg-9">
				<div class="table-responsive" >
      				<table class="table table-bordered" id="order-table" width="100%" cellspacing="0">
					    <div class="col-lg-2">
							<a  href="<?=base_url("public/carprofile/create") ?>"><button type="button" class="btn btn-info btn-block" ><i class="fa fa-plus"></i>  สร้าง</button></a>  
						</div>
						<!-- <thead>
							<tr>
								<th>คำสั่งซื้อ</th>
								<th>วันที่สั่ง</th>
								<th>จำนวนเงินรวม</th>
								<th>จำนวนเงินมัดจำ</th>
								<th>จำนวนเงินคงเหลือ</th>
								<th>สถานะ</th>
								<th>รายการ</th>
							</tr>									
						</thead> -->
					</table>
				</div>
			</div>					
		</div>
		
	</div>
</div>
