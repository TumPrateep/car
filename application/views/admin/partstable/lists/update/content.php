
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/partstable") ?>">ตารางการเช็คระยะ</a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/partstable/lists/".$parts_table_id) ?>">ระยะในการเช็ค</a>
      </li>
      <li class="breadcrumb-item active">แก้ไขข้อมูลระยะในการเช็ค</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขข้อมูลระยะในการเช็ค</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <input type="hidden" id="parts_table_id" name="parts_table_id" value="<?=$parts_table_id ?>">
                  <input type="hidden" id="parts_table_list_id" name="parts_table_list_id" value="<?=$parts_table_list_id ?>">
                  <div class="card-body black bg-light">
                    <div class="form-group row">
                      <div class="col-md-6">
                          <label>ระยะในการเช็ค(กม.)</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="ระยะในการเช็ค(กม.)" name="kilometre" id="kilometre">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                  </div>
                </form>
                  <!-- /.card-body -->
               
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>