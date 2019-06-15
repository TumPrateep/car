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

	</style>
	<div class="brands">
		<div class="container">
		
			<?php if($isUser){ ?>
			<div class="container-fluid">
				<h2 class="text-center mb-3">เลือกรถหรือค้นหาจากข้อมูลรถ</h2>
				<div id="myCarousel" class="carousel slide main-search" data-ride="carousel">
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
				</div>
			</div>
			<br><br>
			<h3 class="text-center">
				<span class="round-circle">หรือ</span>
			</h3>
			<br>
			<?php } ?>
			<div class="form-row main-search">
				<div class="form-group col-md-2">
					<label class="control-label">ยี่ห้อรถ</label>
					<select class="form-control input-default" name="brandId" id="brandId"><option value="">เลือกยี่ห้อรถ</option><option data-thumbnail="images/icon-chrome.png" value="11">AUDI</option><option data-thumbnail="images/icon-chrome.png" value="1">CHEVROLET</option><option data-thumbnail="images/icon-chrome.png" value="4">FORD</option><option data-thumbnail="images/icon-chrome.png" value="2">HONDA</option><option data-thumbnail="images/icon-chrome.png" value="3">ISUZU</option><option data-thumbnail="images/icon-chrome.png" value="9">KIA</option><option data-thumbnail="images/icon-chrome.png" value="5">MAZDA</option><option data-thumbnail="images/icon-chrome.png" value="12">MERCEDEZ BENZ</option><option data-thumbnail="images/icon-chrome.png" value="7">MISHUBISHI</option><option data-thumbnail="images/icon-chrome.png" value="8">NISSAN</option><option data-thumbnail="images/icon-chrome.png" value="6">TOYOTA</option><option data-thumbnail="images/icon-chrome.png" value="10">VOLKSWAGEN</option></select>
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
					<button type="button" class="btn btn-orange btn-block">ค้นหา</button>
				</div>
			</div>
		</div>
	</div>