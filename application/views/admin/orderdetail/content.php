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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="orange">หมายเลขสั่งซื้อ: <?=$orderId?></h4>
                            <input type="hidden" id="orderId" name="orderId" value="<?=$orderId?>">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">รูป</th>
                                        <th scope="col">ชื่อสินค้า</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">ราคา</th>
                                        <th scope="col">ร้านค้าส่งคาร์ใจดี</th>
                                    </tr>
                                </thead>
                                <tbody id="showOrder"></tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">รูปรถยนต์</th>
                                        <th scope="col">ทะเบียนรถ</th>
                                        <th scope="col">ข้อมูลรถยนต์</th>
                                    </tr>
                                </thead>
                                <tbody id="showCarprofile"></tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">รูปศูนย์บริการ</th>
                                        <th scope="col">ชื่อศูนย์บริการ</th>
                                        <th scope="col">วันเวลาที่จอง</th>
                                    </tr>
                                </thead>
                                <tbody id="showReserve"></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>