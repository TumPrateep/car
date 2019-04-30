<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">รายละเอียดการจอง</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">รายละเอียดการจอง</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
      <div class="row">
            <div class="col-md-12">
              <div class="card col-md-12">
              <h4 class="orange">หมายเลขสั่งซื้อ: #<?=$orderId ?></h4>
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
              </div>
            </div>
          </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->