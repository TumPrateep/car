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
</section>