<style>
*,
::after,
::before {
    box-sizing: border-box;
}

ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
}

.btn-result {
    padding: 7px 7px 7px 7px;
}

div.brand img {
    margin: 45px 0px 0px 0px;
    width: 100%;
    height: auto;
}

.card-body.order {
    background-color: #ff6600;
    color: aliceblue;
    padding: 0.5rem;
}

.card.pointer {
    cursor: pointer;
}

.order>h5 {
    color: white !important;
}

.footer.order {
    background-color: #343a40;
    color: white;
}

.detail {
    width: -webkit-fill-available !important;
}

input[type="checkbox"] {
    width: 30px;
    height: 30px;
}

</style>
<link href="<?=base_url('public/')?>css/mdb.css?<?php echo time(); ?>" rel="stylesheet">
<section class="section pricing" id="search">
    <div class="container">
        <div id="boby">
            <!-- Horizontal Steppers -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Stepers Wrapper -->
                    <ul class="stepper stepper-horizontal">

                    <!-- First Step -->
                    <li class="warning">
                        <a href="#!">
                        <span class="circle">1</span>
                        <span class="label">เลือกสินค้า</span>
                        </a>
                    </li>

                    <!-- Second Step -->
                    <li>
                        <a href="#!">
                        <span class="circle">2</span>
                        <span class="label">จองวันเข้าใช้บริการ</span>
                        </a>
                    </li>

                    <!-- Third Step -->
                    <li>
                        <a href="#!">
                        <span class="circle">3</span>
                        <span class="label">ชำระเงิน</span>
                        </a>
                    </li>

                    </ul>
                    <!-- /.Stepers Wrapper -->

                </div>
            </div>
            <!-- /.Horizontal Steppers -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>ตะกร้า<span class="alternate">สินค้า</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">  
                    <table class="table table-hover" id="cart-table">
                        <tbody id="cart_list"></tbody>
                        <tfoot>
                            <!-- <tr>
                                <th colspan="2" class="text-right"><div class="row"><div class="col-9"><span class="font-italic">ราคารวมสินค้าในตะกร้า : </span></div><div class="col"><span class="font-italic" id="total-amount"></span></div></div></th>
                            </tr> -->
                            <tr>
                                <th colspan="2" class="text-right"><div class="row"><div class="col-9"><span class="amount">ราคารวม : </span></div><div class="col"><span class="amount" id="order_total_amount"></span></div></div></th>
                            </tr>
                        </tfoot>
                    </table>                 
                </div>
            </div>
            <br>
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <button class="btn btn-main-md width-100p bg-orange" onclick="checkData()"> จองวันเข้าใช้บริการ</button> 
                </div>
            </div>
            <br>
        </div>
	</div>
</section>