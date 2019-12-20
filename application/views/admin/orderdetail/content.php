<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url(" admin/ ")?>">หน้าหลัก</a>
        </li>
        <li class="breadcrumb-item active">รายละเอียดสินค้า</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 card">
                    <div class="card-body">
                        <input type="hidden" id="orderId" name="orderId" value="<?=$orderId?>">
                        <div class="row bg-light">
                            <div class="col-md-12 text-center ">
                                <h3 class="">หมายเลขสั่งซื้อ: <?=$orderId?></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="showCarprofile"></div>
                        <hr>
                        <div class="row" id="showReserve"></div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ชื่อสินค้า</th>
                                                <th scope="col">จำนวน</th>
                                                <th scope="col">ค่าสินค้า</th>
                                                <th scope="col">ค่าเปลี่ยนอะไหล่</th>
                                                <th scope="col">จำนวนเงินรวม</th>
                                                <th scope="col">ร้านค้าส่งคาร์ใจดี</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showOrder"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>