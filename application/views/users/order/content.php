<style>
.headtb {
    background-color: #ff6600;
    padding: 22px 40px;
}

#order-table_wrapper {
    padding-right: 0px;
    padding-left: 0px;
}

ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
}
</style>
<section class="section pricing">
    <div class="container">
        <div class="row flex-row flex-wrap">
            <div class="col-md-12">
                <section class="schedule">
                    <div class="section-title">
                        <h3>รายการ<span class="alternate" id="title">สั่งซื้อ</span></h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p> -->
                    </div>
                    <div class="schedule-contents">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active schedule-item" id="nov20">
                                <!-- Headings -->
                                <div class="row">
                                    <div class="col-md-12 headtb">
                                        <div class="row">
                                            <div class="col-md-2 text-white text-center">รายการสั่งซื้อ</div>
                                            <div class="col-md-2 text-white text-center">วันที่ทำรายการ</div>
                                            <div class="col-md-2 text-white text-center">จำนวนเงินรวม</div>
                                            <div class="col-md-2 text-white text-center">สถานะ</div>
                                            <div class="col-md-2 text-white text-center">รายละเอียด</div>
                                            <div class="col-md-2 text-white text-center">รายการ</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Schedule Details -->
                                <table id="order-table" width="100%" cellspacing="0"></table>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="comment-rating" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><b>คะแนนและรีวิว</b></h3>
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
                                                <input type="hidden" id="selected_rating" name="selected_rating"
                                                    value="" required="required">
                                            </label>
                                            <h2 class="bold rating-header" style="">
                                                <span class="selected-rating">0</span><small> / 5</small>
                                            </h2>
                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1"
                                                id="rating-star-1">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2"
                                                id="rating-star-2">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3"
                                                id="rating-star-3">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4"
                                                id="rating-star-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5"
                                                id="rating-star-5">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label required">
                                                <h4><b>รายละเอียดเพิ่มเติม</b></h4>
                                            </label>
                                            <textarea class="form-control" id="commentUser" name="commentUser"
                                                rows="3"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-orange"><span class="fas fa-save"></span>
                                        บันทึก</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                            class="fas fa-times"></span> ปิด</button>
                                </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>