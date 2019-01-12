
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/") ?>">หน้าหลัก</a>
        </li>
        <li class="breadcrumb-item active">รายละเอียดสินค้า</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white ">
              <h4 class="orange">หมายเลขสั่งซื้อ: <?=$orderId ?></h4>
                <input type="hidden" id="orderId" name="orderId" value="<?=$orderId ?>">
                    <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">รูป</th>
                              <th scope="col">ชื่อสินค้า</th>
                              <th scope="col">จำนวน</th>
                              <th scope="col">ราคา</th>
                            </tr>
                        </thead>
                      <tbody id="showOrder"></tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </section>
    </div>