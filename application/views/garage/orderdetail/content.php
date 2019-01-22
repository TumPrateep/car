<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">สร้างข้อมูลช่าง</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                <li class="breadcrumb-item active">สร้างข้อมูลช่าง</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <!-- <div class="card-title">
                        <h4>สร้างข้อมูลช่าง</h4>
                    </div> -->
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="submit">
                            <h4 class="orange">หมายเลขสั่งซื้อ: <?=$orderId ?></h4>
                            <input type="hidden" id="orderId" name="orderId" value="<?=$orderId ?>">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">รูป</th>
                                                <th scope="col">ชื่อสินค้า</th>
                                                <th scope="col">จำนวน</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="showOrder"></tbody>
                                    </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>