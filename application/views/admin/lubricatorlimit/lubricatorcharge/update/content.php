
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("admin/lubricatorlimit/lubricatorcharge/".$groupId) ?>">ราคาเปลี่ยนน้ำมันเครื่อง</a>
      </li>
      <li class="breadcrumb-item active">แก้ไขข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card text-white bg-success">
                <div class="card-header">

                  <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขข้อมูลราคาเปลี่ยนน้ำมันเครื่อง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="submit">
                  <input type="hidden" name="groupId" id="groupId" value="<?=$groupId?>">
                  <input type="hidden" name="limitId" id="limitId" value="<?=$limitId?>">
                  <!-- <input type="hidden" name="lubricator_changeId" id="lubricator_changeId" value="<=$lubricator_changeId?>"> -->
                  <div class="card-body black bg-light">
                      <div class="form-group row">
                        <div class="col-md-4">
                            <label>ราคาค่าบริการ</label> <span class="error">*</span>
                            <input type="number" class="form-control" placeholder="ราคาค่าบริการ" name="price" id="price">
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