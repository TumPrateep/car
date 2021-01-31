    <style>
      .font-20{
        font-size: 20px;
      }
    </style>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/partstable") ?>">ตารางการเช็คระยะ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/partstable/product/".$parts_table_id) ?>">สินค้าในแต่ละระยะ</a>
        </li>
        <li class="breadcrumb-item active">
          กำหนดสินค้า (<?=$partdata->partsName?>)
        </li>
      </ol>

      <!-- Example DataTables Card-->
      <input type="hidden" name="parts_table_id" id="parts_table_id" value="<?=$parts_table_id?>">
      <input type="hidden" name="partId" id="partId" value="<?=$partId?>">

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> กำหนดสินค้า (<?=$partdata->partsName?>)</h3>
                </div>
                <form id="submit">
                  <div class="card-body black bg-light">
                    <span id="product-id"></span><br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
     

  
