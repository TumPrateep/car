<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/UserManagement") ?>">ข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขผู้ใช้งาน</li>
      </ol>

      <!-- Example DataTables Card-->
        
      <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10">
                <div class="card text-white bg-success">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-user-circle-o" ></i> เเก้ไขข้อมูลผู้ใช้งาน</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="group">
                      <input type="hidden" name="id" id="id" value="<?=$id ?>">
                      <div class="card-body black bg-light">
                        <div class="form-group">
                          <label>ชื่อผู้ใช้งาน</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" name="username" id="username" >
                        </div>
                        <div class="form-group">
                          <label>เบอร์โทรศัพท์</label> <span class="error">*</span>
                          <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" name="phone" id="phone"> 
                        </div>
                        <div class="form-group">
                          <label>อีเมล</label>
                          <input type="text" class="form-control" placeholder="อีเมล" name="email" id="email">
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

