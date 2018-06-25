<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/lubricatortype") ?>">ประเภทน้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
      </ol>
      <!-- Icon Cards-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card text-white bg-success">
                  <div class="card-header">

                    <h3 class="card-title"><i class="fa fa-tint"></i> เเก้ไขข้อมูลประเภทน้ำมันเครื่อง</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="submit">
                  <input type="hidden" id="lubricator_typeId" name="lubricator_typeId" value="<?=$lubricator_typeId?>">
                    <div class="card-body black bg-light">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>ชื่อประเภทน้ำมันเครื่่อง</label> <span class="error">*</span>
                            <input type="text" class="form-control" placeholder="ชื่อประเภทน้ำมันเครื่อง" id="lubricator_typeName" name="lubricator_typeName" value="">
                          </div>
                          <div class="form-group">
                            <label>ระยะทาง</label> <span class="error">*</span>
                            <input type="number" class="form-control" placeholder="ระยะทาง" name="lubricator_typeSize" id="lubricator_typeSize">
                        </div>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary ">บันทึก</button>
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