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
				<div class="table-responsive">
      				<table class="table table-bordered" id="order-table" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>คำสั่งซื้อ</th>
								<th>วันที่สั่ง</th>
								<th>จำนวนเงินมัดจำ</th>
								<th>จำนวนเงินคงเหลือ</th>
								<th>จำนวนเงินรวม</th>
								<th>สถานะ</th>
								<th>รายละเอียด</th>
								<th>รายการ</th>
							</tr>									
						</thead>
					</table>
				</div>
			</div>					
		</div>
		
	</div>

	<div class="modal fade bd-example-modal-lg" id="comment-rating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
		<div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">รีวิวเเละคอมเมนต์</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" id="selectGarage">
						<!-- add comment -->
						<form id="submit">
							<div class="row">
								<input type="hidden" id="orderId" name="orderId" value="">
								<div class="col-md-12">
									<div class="form-group" id="rating-ability-wrapper">
									    <label class="control-label" for="rating">
									    <span class="field-label-info"></span>
									    <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
									    </label>
									    <h2 class="bold rating-header" style="">
									    <span class="selected-rating">0</span><small> / 5</small>
									    </h2>
									    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1" >
									        <i class="fa fa-star" aria-hidden="true"></i>
									    </button>
									    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2" >
									        <i class="fa fa-star" aria-hidden="true"></i>
									    </button>
									    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3" >
									        <i class="fa fa-star" aria-hidden="true"></i>
									    </button>
									    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4" >
									        <i class="fa fa-star" aria-hidden="true"></i>
									    </button>
									    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5" >
									        <i class="fa fa-star" aria-hidden="true"></i>
									    </button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label required">คอมเมนต์</label>
										<textarea class="form-control" id="commentUser" name="commentUser" rows="3"></textarea>
									</div>
								</div>
								
							</div>
							
							<div class="modal-footer">
								<button type="submit" class="btn btn-orange"><span class="fas fa-save"></span> บันทึก</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-times"></span> ปิด</button>
							</div>
						</div>
						</form>
					
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
