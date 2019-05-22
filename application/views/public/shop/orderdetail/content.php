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

				<div class="row">
					<div class="col-md-4">
	                    <div class="row p-t-20">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <div class="image-editor" id="garage">
									<div class="cropit-preview"></div>
	                                    <input type="hidden" name="pictures" id="pictures" class="hidden-image-data" />
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-8">
	                	<div class="card" >
	                		<div class="card-body"> 
							<h4><label ><u>อู่ที่เข้าใช้บริการ</u></label></h4>
			                    <div class="row ">
		                            <div class="col-md-3 "><label class="txt-S-s">ชื่ออู่</label></div>
		                            <div class="col-md-8">
		                                <label class="txt-S-s"  name="garageName" id="garageName">: </label>
		                            </div>
		                        </div>
			                    <div class="row ">
		                            <div class=" col-md-3 "><label class="txt-S-s">วันที่เปิด</label></div>
		                            <div class="col-md-8">
		                                <label class="txt-S-s"  name="dayopen" id="dayopen">: </label>
		                            </div>
		                        </div>
		                        <div class="row ">
		                            <div class="col-md-3 "><label class="txt-S-s">เวลาที่เปิด</label></div>
		                            <div class="col-md-8">
		                                <label class="txt-S-s"  name="timeopen" id="timeopen">:</label>
		                            </div>
		                        </div>
		                        <div class="row ">
		                            <div class="col-md-3 "><label class="txt-S-s">วันที่จอง</label></div>
		                            <div class="col-md-8">
		                            	<label class="txt-S-s " >:</label>
		                                <label class="txt-S-s text-red" name="reserveday" id="reserveday"></label>
		                            </div>
		                        </div>
	                        </div>
                        </div>
	                </div>  
	            </div>
	            <div class="row">
					<div class="col-md-4">
	                    <div class="row p-t-20">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <div class="image-editor" id="caruser">
									<div class="cropit-preview"></div>
	                                    <input type="hidden" name="pictures" id="pictures" class="hidden-image-data" />
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-8">
	                	<div class="card" >
	                		<div class="card-body">
							<h4><label ><u>รถที่เข้าใช้บริการ</u></label></h4>
	                			<div class="row "> 
				                    <div class="col-md-4 txt-cen-order cen-card">
					                	<label class="txt-S-s">ป้ายทะเบียน</label>
				                        <div class="card card-border" >
										  	<div class="card-body-plate ">
										    	<label class="txt-S-m"  name="plate" id="plate"> </label><br>
										    	<label class="txt-S-s"  name="provinceplate" id="provinceplate"> </label>
										  	</div>
										</div>   
					                </div>
					                <div class="col-md-7 ">
					                	<div class="row ">
				                            <div class=" col-md-4 "><label class="txt-S-s">ยี่ห้อ</label></div>
				                            <div class="col-md-8">
				                                <label class="txt-S-s"  name="brand_car" id="brand_car">: </label>
				                            </div>
				                        </div>
				                        <div class="row ">
				                            <div class=" col-md-4 "><label class="txt-S-s">รุ่นรถ</label></div>
				                            <div class="col-md-8">
				                                <label class="txt-S-s"  name="model_car" id="model_car">: </label>
				                            </div>
				                        </div>
				                        <div class="row ">
				                            <div class=" col-md-4 "><label class="txt-S-ss">โฉมรถยนต์</label></div>
				                            <div class="col-md-8">
				                                <label class="txt-S-ss"  name="detail_car" id="detail_car">: </label>
				                            </div>
				                        </div> 
				                        <div class="row ">
				                            <div class=" col-md-4 "><label class="txt-S-ss">รายละเอียด<!-- รุ่น --></label></div>
				                            <div class="col-md-8">
				                                <label class="txt-S-ss"  name="model_of_car" id="model_of_car">: </label>
				                            </div>
				                        </div>    
					                </div>
				                </div>  
	                        </div>
                        </div>
	                </div>  
	                <!-- <div class="col-md-3 txt-cen-order cen-card">
	                	<label class="txt-S-s">ป้ายทะเบียน</label>
                        <div class="card card-border" >
						  	<div class="card-body-plate ">
						    	<label class="txt-S-m"  name="plate" id="plate"> </label><br>
						    	<label class="txt-S-s"  name="provinceplate" id="provinceplate"> </label>
						  	</div>
						</div>   
	                </div>  --> 
	            </div>
				
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
				<table class="table" id="orderdetail-table">
				<div class="row ">
                    <div class="col-md-3 "><label>ราคาสินค้ารวม :</label></div>
                    <div class="col-md-8">
                        <label name="cost" id="cost"> </label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3 "><label>ราคาค่าขนส่ง :</label></div>
                    <div class="col-md-8">
                        <label name="costDelivery" id="costDelivery"> </label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3 "><label>ราคาสินค้ารวมค่าขนส่ง :</label></div>
                    <div class="col-md-8">
                        <label name="summoney" id="summoney"> </label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3 "><label>เงินมัดจำ :</label></div>
                    <div class="col-md-8">
                        <label name="deposit" id="deposit"> </label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3 "><label>เงินคงเหลือ :</label></div>
                    <div class="col-md-8">
                        <label name="ttmoney" id="ttmoney"> </label>
                    </div>
                </div>  
				</table>
			</div>				
        </div>
	</div>
</div>

