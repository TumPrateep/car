<div class="shop">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page"></li><a href="<?=base_url("/shop/order/") ?>">รายการสั่งซื้อ</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="shop_sidebar">	
					<ul class="nav flex-column nav-control">
						<li class="nav-item">
							<a class="nav-link active" href="#">รายการสั่งซื้อ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">ข้อมูลรถ</a>
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
				<h4 class="orange">หมายเลขสั่งซื้อ: <?=$orderId ?></h4>
				<input type="hidden" id="orderId" name="orderId" value="<?=$orderId ?>">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">รูป</th>
							<th scope="col">ชื่อสินค้า</th>
							<th scope="col">จำนวน</th>
							<th scope="col">ราคา</th>
						</tr>
					</thead>
					<tbody id="showOrder"></tbody>
				</table>
			</div>				
        </div>
	</div>
</div>

