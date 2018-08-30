

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/car") ?>">การจัดการยี่ห้อ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/model/$brandId") ?>">รุ่นรถ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/carmodel/$brandId/$modelId") ?>">รายละเอียดรุ่นรถ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car/machinetype/$brandId/$modelId/$modelofcarId") ?>">ชนิดเครื่องยนต์</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขชนิดเครื่องยนต์</li>
      </ol>

      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-fw fa-car"></i> แก้ไขชนิดเครื่องยนต์</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                    <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                    <input type="hidden" id="modelId" name="modelId" value="<?=$modelId ?>">
                    <input type="hidden" id="modelofcarId" name="modelofcarId" value="<?=$modelofcarId ?>">
                    
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ชนิดเครื่องยนต์</label> <span class="error">*</span>
                            <select name="machinetype" id="machinetype" class="form-control">
                              <option value="ดีเซล">ดีเซล</option>  
                              <option value="เบนซิน">เบนซิน</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>เกียร์</label> <span class="error">*</span>
                            <select name="gear" id="gear" class="form-control">
                              <option value="AT">AT</option>
                              <option value="MT">MT</option>
                            </select>
                          </div>
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