<style>
    .headtb{
        background-color: #ff6600;
        padding:22px 40px;
    }
    #order-table_wrapper{
        padding-right: 0px;
        padding-left: 0px;
    }
    ul.pagination li a {
        font-size: 13px;
    }
    table > thead {
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
                                        <div class="col-md-2 text-white text-center">วันที่สั่ง</div>
                                        <div class="col-md-2 text-white text-center">จำนวนเงินรวม</div>
                                        <div class="col-md-2 text-white text-center">สถานะ</div>
                                        <div class="col-md-2 text-white text-center">รายละเอียด</div>
                                        <div class="col-md-2 text-white text-center">รายการ</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Schedule Details -->
                            <table id="order-table" width="100%" cellspacing="0"></table>

                            <!-- <div class="row border-bottom  pb-2 pt-2">
                                <div class="col-md-2 text-center detail">
                                    #10016
                                </div>
                                <div class="col-md-2 text-center detail">
                                    06/07/2019 10:15:46
                                </div>
                                <div class="col-md-2 text-center detail">
                                    58,400 บาท
                                </div>
                                <div class="col-md-2 text-center detail">
                                    รอชำระเงิน
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-transparent-md"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-main-sm bg-orange btn-block">ชำระเงิน</a>
                                </div>
                            </div>
                            <div class="row border-bottom  pb-2 pt-2">
                                <div class="col-md-2 text-center detail">
                                    #10011
                                </div>
                                <div class="col-md-2 text-center detail">
                                    08/06/2019 21:16:10
                                </div>
                                <div class="col-md-2 text-center detail">
                                    16,974 บาท
                                </div>
                                <div class="col-md-2 text-center detail">
                                    ขอบคุณที่ใช้บริการ
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-transparent-md"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="col-md-2 text-center detail">
                                    
                                </div>
                            </div>
                            <div class="row border-bottom  pb-2 pt-2">
                                <div class="col-md-2 text-center detail">
                                    #10010
                                </div>
                                <div class="col-md-2 text-center detail">
                                    30/05/2019 10:58:35
                                </div>
                                <div class="col-md-2 text-center detail">
                                    2,550 บาท
                                </div>
                                <div class="col-md-2 text-center detail">
                                    ให้คะแนนและรีวิว
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-transparent-md"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-main-sm bg-orange btn-block">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="row border-bottom  pb-2 pt-2">
                                <div class="col-md-2 text-center detail">
                                    #10009
                                </div>
                                <div class="col-md-2 text-center detail">
                                    29/05/2019 23:20:54
                                </div>
                                <div class="col-md-2 text-center detail">
                                    3,243 บาท
                                </div>
                                <div class="col-md-2 text-center detail">
                                    ชำระเงินเสร็จสิ้น
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-transparent-md"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-main-sm bg-orange btn-block">รับบริการ</a>
                                </div>
                            </div>
                            <div class="row border-bottom  pb-2 pt-2">
                                <div class="col-md-2 text-center detail">
                                    #10008
                                </div>
                                <div class="col-md-2 text-center detail">
                                    29/05/2019 23:16:48
                                </div>
                                <div class="col-md-2 text-center detail">
                                    2,858 บาท
                                </div>
                                <div class="col-md-2 text-center detail">
                                    เข้าใช้บริการ
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <a href="#" class="btn btn-transparent-md"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="col-md-2 text-center detail">
                                    <!-- <a href="#" class="btn btn-main-sm bg-orange btn-block">รับบริการ</a> -->
                                </div>
                            <!-- </div> 
                            
                        </div> -->
                        
                                <!-- Schedule Details -->
                    
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

