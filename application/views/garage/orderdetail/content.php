<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">รายการส่งสินค้า</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">รายการส่งสินค้า</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                   <div class="row justify-content-between">
                        <div class="col-lg-3 offset-lg-7 mt-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="rims" placeholder="ยี่ห้อรถ">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-car" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-info btn-block"  id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                        </div>
                    </div><br>

                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
                                    <thead>
                                    <th><i class="fa fa-sort"></i>  ลำดับ</th>
                                    <th><i class="fa fa-circle-o"></i>  ขอบยาง</th>
                                    <th><i class="fa fa-usd" ></i>  ราคาค่าบริการ</th>
                                    <th></th>
                                    </thead>    
                                </table>
                            </div>
                        </div> 
                    </div> -->

                    <div class="card-body">
                        <div class="basic-form">
                            <form id="submit">
                            <!-- <h4 class="orange">หมายเลขสั่งซื้อ:</h4> -->

                            <!-- <h4 class="orange">หมายเลขสั่งซื้อ: <?=$orderId ?></h4> -->
                            <!-- <input type="hidden" id="orderId" name="orderId" value="<?=$orderId ?>"> -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col"><i class="fa fa-sort"></i> ลำดับ</th>
                                                <th class="text-center" scope="col"><i class="fa fa-picture-o"\></i> รูป</th>
                                                <th class="text-center" scope="col"><i class="fa fa-pencil-square"\></i> ชื่อสินค้า</th>
                                                <th class="text-center" scope="col"><i class="fa fa-calendar"\></i> วันที่ส่ง</th>
                                                <th class="text-center" scope="col"><i class="fa fa-clock-o"\></i> เวลาที่ส่ง</th>
                                                <th class="text-center" scope="col"><i class="fa fa-usd" ></i> ราคา</th>
                                                <th class="text-center" scope="col"><i class="fa fa-truck"\></i> ร้านอะไหล่</th>
                                                <th class="text-center" scope="col"> สถานะ</th>
                                                <th scope="col"></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="showOrder">
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="col"><img src="/public/image/brand/5bc1709a5cc29.png"  class="brand-image"></th>
                                                <th scope="col">โชคอัพหน้า trw</th>
                                                <th scope="col">18-03-2562</th>
                                                <th scope="col">12:00</th>
                                                <th scope="col">4200</th>
                                                <th scope="col">พี3อะไห่ยนต์</th>
                                                <th scope="col">รับสินค้า</th>
                                                <th class="text-center">
                                                    <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                </th>
                                               
                                            </tr>
                                        </tbody>
                                    </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>