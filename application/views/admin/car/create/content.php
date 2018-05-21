

    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?=base_url("car") ?>">ยี่ห้อรถ</a>
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

                  <h3 class="card-title"><i class="fa fa-fw fa-car"></i>เพิ่มข้อมูลยี่ห้อรถ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create-brand" enctype="multipart/form-data" >
                <div class="card-body black bg-light">
                    <div class="form-group">
                      <label>ชื่อยี่ห้อรถ</label>
                      <input type="text" class="form-control" placeholder="ชื่อยี่ห้อรถ" name="brandName">
                    </div>
                    <div class="container kv-main">

        <form enctype="multipart/form-data">
            <input id="input-b3" name="input-b3[]" type="file" class="file" multiple 
    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
            <br>
        </form>
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