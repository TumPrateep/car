<div class="shop">
	<div class="container">
    
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item "><a href="<?=base_url() ?>">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เเจ้งชำระเงิน</li>
					</ol>
				</nav>
			</div>
        </div>
        <form id="submit">
            <p class="centerheadpayment">ใบเเจ้งชำระเงิน  #<?=$orderId ?></p>
            <input type="hidden" id="orderId" name="orderId" value="<?=$orderId ?>">
            <div class="row">
                <div class="col-lg-5">
                    <img src="<?=base_url("public/themes/user/images/bank.jpg") ?>" class="img-fluid">
                </div>
                <div class="card col-lg-6"><br>
                    <div class="form-group row">
                        <label class="col-lg-3" >จำนวนเงินรวม</label>
                         <div class="col-sm-8">
                            <input type="text" class="form-control" name="summoney" id="summoney" disabled>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-lg-3" >จำนวนเงินมัดจำ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="depositmoney" id="depositmoney" disabled>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-lg-3">วันที่</label>
                        <div class="col-sm-8" >
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-lg-3">เวลา</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="time" id="time">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ธนาคาร</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="bank" id="bank" placeholder="ชื่อธนาคารที่โอน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ชื่อผู้โอน</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="transfer" id="transfer" placeholder="ชื่อผู้โอน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">จำนวนเงิน</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="money" id="money" placeholder="จำนวนเงิน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">เเนบสลิป</label>
                        <div class="col-sm-9">
                            <div class="image-editor">
                                <input type="file" class="cropit-image-input" id="slip" name="slip">
                                <div class="cropit-preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row ">
                    <div class="col-sm-12">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary " style="float:right" >บันทึก</button>
                    </div>
                </div>				
            </div>
        </form>
	</div>
</div>
