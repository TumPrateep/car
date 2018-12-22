<div class="payment">
	<div class="container">
        <div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url() ?>">หน้าหลัก</a></li>
						<li class="breadcrumb-item active" aria-current="page">แจ้งชำระเงิน</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="card col-lg-12">
                <div class="form-group">
                    <label class="control-label">เเจ้งชำระเงิน</label>
                    <output>#</output>
                </div>
                <div class="card">
                    <div class="form-group row">
                        <label class="col-lg-2">วันที่</label>
                            <div class="col-sm-9">
                            <output>#</output>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-lg-3">เวลา</label>
                            <div class="col-sm-9">
                            <output>#</output>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">โอนโดยธนาคาร</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="bank" id="bank" placeholder="ชื่อธนาคารที่โอน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ชื่อผู้โอน</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nameSend" id="bank" placeholder="ชื่อผู้โอน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">เเนบสลิป</label>
                        <div class="image-editor">
                            <input type="file" class="cropit-image-input" name="slip">
                            <div class="cropit-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
		</div>	
	</div>
</div>
