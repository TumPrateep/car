<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/filter") ?>">ยี่ห้อไส้กรอง</a>
        </li>
        <li class="breadcrumb-item">
        <a href="<?=base_url("admin/filter/filters/$filter_brandId") ?>">รุ่นไส้กรอง</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-tint"></i>  เพิ่มข้อมูลรุ่นไส้กรอง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form id="create-filter" >
                  <div class="card-body black bg-light">
                  <input type="hidden" name="filter_brandId" id="filter_brandId" value="<?=$filter_brandId ?>">
                      <div class="row">
                          <div class="col-md-12 form-group">
                            <label>ชื่อรุ่นไส้กรอง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อรุ่นไส้กรอง" name="filterName" id="filterName">
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
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