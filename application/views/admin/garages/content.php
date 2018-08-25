
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">ที่ตั้งอู่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>        
      </ol>
      <form id="form-search">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
          <div class="input-group">
            <input name="garageName" id="table-search" class="form-control" placeholder="ชื่ออู่">
            <div class="input-group-append">
              <button class="btn btn-info inactive"><i class="fa fa-map-marker"></i></button>
            </div>
            <select class="form-control" name="provinceId" id="province">
              <option value="">เลือกจังหวัด</option>
            </select>
            <div class="input-group-append">
              <button class="btn btn-info inactive"><i class="fa fa-map-o"></i></button>
            </div>

            <div class="input-group-append">
              <button type="submit" id="btn-search" class="btn btn-success">
                <i class="fa fa-search"></i>  ค้นหา
              </button>
            </div>

          </div>
        </div>
      </div>
      </form>
      <br/>
      <div class="row">
        <div class="col-md-12">
          <div id="map"></div>
        </div>
      </div>

      <!-- Success Modal-->
      <div class="modal fade" id="garage-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="garageName"></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body" >
                <div class="row">
                  <div class="col-md-6">
                    <small><b>หมายเลขทะเบียนการค้า</b></small>
                      <p id="businessRegistration"></p>
                  </div>
                  <div class="col-md-6">
                    <small><b>ชื่อเจ้าของอู่</b></small>
                    <p id="garageMaster"></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <small><b>ที่อยู่</b></small>
                    <p>
                      <span id="garageAddress"></span>
                      ตำบล/แขวง <span id="garageSubdistrict"></span>
                      อำเภอ/เขต <span id="garageDistrict"></span>
                      จังหวัด <span id="garageProvince"></span>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <a href="#" id="update"><button type="button" class="btn btn-warning btn-md btn-block">แก้ไข</button></a>
                    <button type="button" class="btn btn-secondary btn-md btn-block" data-dismiss="modal">ปิด</button>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

    
    