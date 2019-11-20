<section class="section pricing">
    <div class="container">
        <div class="row flex-row flex-wrap">
            <div class="col-md-12">
                <section class="schedule">
                    <div class="section-title">
                        <h3>ชำระ<span class="alternate" id="title">เงิน</span></h3>
                    </div>
                    <div class="schedule-contents">
                        <div class="row justify-content-md-center">
                            <div class="col-lg-6 card">
                                <form id="submit">
                                    <input type="hidden" id="orderId" name="orderId" value="<?=$orderId?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">รายการสั่งซื้อ</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="<?=$orderId?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">ชื่อผู้โอน</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="transfer" id="transfer"
                                                    placeholder="ชื่อผู้โอน">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">รูปหลักฐานการจ่ายเงิน</label>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="image-editor">
                                                        <input type="file" class="cropit-image-input" name="tempImage"
                                                            required>
                                                        <div class="cropit-preview"></div>
                                                        <div class="image-size-label">ปรับขนาด</div>
                                                        <input type="range" class="cropit-image-zoom-input">
                                                        <input type="hidden" name="slip" class="hidden-image-data" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <button type="submit" name="submit"
                                                    class="btn btn-main-md bg-orange btn-block">บันทึก</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>