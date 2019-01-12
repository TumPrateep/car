
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
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <!-- <h3 class="card-title"><i class="fa fa-fw fa-car"></i> รายละเอียดสินค้า</h3> -->
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <input type="hidden" id="orderId" name="orderId" value="<?=$orderId ?>">  
                    <!-- /.card-body -->
                  <div class="card-body black bg-light">
                      <table id="showOrder"></table>
                  </div>
                 
                </div>
              </div>
          </div>
        </div>
      </section>
    </div>