	<style>
		@media (min-width: 768px) {
			/* show 4 items */
			.main-carousel .active,
			.main-carousel .active + .carousel-item,
			.main-carousel .active + .carousel-item + .carousel-item,
			.main-carousel .active + .carousel-item + .carousel-item + .carousel-item {
				display: block;
			}

			.main-carousel .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
			.main-carousel .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
			.main-carousel .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
			.main-carousel .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
				transition: none;
			}

			.main-carousel .carousel-item-next,
			.main-carousel .carousel-item-prev {
				/* position: relative; */
				transform: translate3d(0, 0, 0);
			}

			.main-carousel .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
				position: absolute;
				top: 0;
				right: 0;
				z-index: -1;
				display: block;
				visibility: visible;
			}

			/* left or forward direction */
			.main-carousel .active.carousel-item-left + .carousel-item-next.carousel-item-left,
			.main-carousel .carousel-item-next.carousel-item-left + .carousel-item,
			.main-carousel .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
			.main-carousel .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
			.main-carousel .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
				position: relative;
				transform: translate3d(-100%, 0, 0);
				visibility: visible;
			}

			/* farthest right hidden item must be absolue position for animations */
			.main-carousel .carousel-item-prev.carousel-item-right {
				position: absolute;
				top: 0;
				left: 0;
				z-index: -1;
				display: block;
				visibility: visible;
			}

			/* right or prev direction */
			.active.carousel-item-right + .carousel-item-prev.carousel-item-right,
			.carousel-item-prev.carousel-item-right + .carousel-item,
			.carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
			.carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
			.carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
				/* position: relative; */
				transform: translate3d(100%, 0, 0);
				/* visibility: visible; */
				/* display: block; */
				/* visibility: visible; */
			}
		}
		.mg-lb-15{
			margin-left: 15px;
    		margin-bottom: 10px;
		}
	</style>
	<div class="brands">
		<div class="container">
		
			<?php if($isUser){ ?>
			<!-- <div class="container-fluid"> -->
				<h2 class="text-center mb-3">เลือกรถหรือค้นหาจากข้อมูลรถ</h2>
				<div id="myCarousel" class="carousel slide main-search" data-ride="carousel">
					<div class="mg-lb-15">
						<a href="http://localhost/car/public/carprofile/create">
							<button type="button" class="btn btn-orange"><i class="fa fa-plus"></i>  สร้าง</button>
						</a>
					</div>
					<div class="carousel-inner row w-100 mx-auto main-carousel" id="carprofile">
					
					</div>
					<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
					<br>
					<div class="text-center">
						<a class="btn btn-outline-secondary prev" href="#myCarousel" data-slide="prev"><i class="fa fa-lg fa-chevron-left"></i></a>
						<a class="btn btn-outline-secondary next" href="#myCarousel" data-slide="next"><i class="fa fa-lg fa-chevron-right"></i></a>
					</div>
					<br>
				</div>
			<!-- </div> -->
			<br><br>
			<h3 class="text-center">
				<span class="round-circle">หรือ</span>
			</h3>
			<br>
			<?php } ?>
			<form id="cardata">
				<div class="form-row main-search">
					<div class="form-group col-md-2">
						<label class="control-label">ยี่ห้อรถ</label>
						<select class="form-control input-default" name="brandId" id="brandId"><option value="">เลือกยี่ห้อรถ</option></select>
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label">รุ่นรถ</label>
						<select class="form-control input-default" name="modelId" id="modelId"><option value="">เลือกรุ่นรถ</option></select>
					</div>
					
					<div class="form-group col-md-3">
						<label class="control-label">โฉมรถยนต์</label>
						<select class="form-control input-default" name="detail" id="detail"><option value="">เลือกโฉมรถยนต์</option></select>
					</div>

					<div class="form-group col-md-3">
						<label class="control-label">รายละเอียดรุ่น</label>
						<select class="form-control input-default" name="modelofcarId" id="modelofcarId"><option value="">เลือกรายละเอียดรุ่น</option></select>
					</div>

					<div class="form-group col-md-2">
						<label class="control-label v-hide">.</label>
						<button type="submit" class="btn btn-orange btn-block">ค้นหา</button>
					</div>

					<div class="form-group col-md-2">
						<label class="control-label orange"><strong>วิธีการดูข้อมูลรถ</strong></label>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="how-to bg-orange">
		<div class="container">
			<h2 class="center text-shadow">ขั้นตอนการสั่งซื้อสินค้า</h2>
			<div class="row justify-content-md-center text-center">
				<div class="col-6 col-md-2"> 
					<img src="<?=base_url("public/image/how_to/1.gif")?>" width="80%"> 
					<h4 class="text-shadow">เลือกสินค้า</h4>
					<span>อะไหล่ช่วงล่าง, ยาง,<br> น้ำมันเครื่อง</span>
				</div>
				<div class="col-6 col-md-2"> 
					<img src="<?=base_url("public/image/how_to/2.gif")?>" width="80%">  
					<h4 class="text-shadow">เลือกสถานที่ติดตั้ง</h4>
					<span>และยัดหมายวันที่ต้องการเข้าใช้บริการ</span>
				</div>
				<div class="col-6 col-md-2">
					<img src="<?=base_url("public/image/how_to/3.gif")?>" width="80%">  
					<h4 class="text-shadow">ประเมินค่าใช้จ่าย</h4>
					<span></span>
				</div>
				<div class="col-6 col-md-2">
					<img src="<?=base_url("public/image/how_to/4.gif")?>" width="80%">  
					<h4 class="text-shadow">ชำระเงิน</h4>
					<span>ไม่มีค่าใช้จ่ายเพิ่มเติม</span>
				</div>
				<div class="col-6 col-md-2"> 
					<img src="<?=base_url("public/image/how_to/5.gif")?>" width="80%">  
					<h4 class="text-shadow">อะไหล่ถูกจัดส่ง</h4>
					<span>ไปยังสถานที่ติดตั้งตามที่นัดหมาย</span>
				</div>
			</div>
		</div>
	</div>