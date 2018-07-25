
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/car") ?>">ที่ตั้งอู่</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>        
      </ol>

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
          <div class="input-group">
            <input name="car_search" id="table-search" class="form-control" placeholder="ชื่ออู่">
            <div class="input-group-append">
              <button class="btn btn-info inactive"><i class="fa fa-map-marker"></i></button>
            </div>
            <select class="form-control" name="province" id="province">
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
      <br/>
      <div class="row">
        <div class="col-md-12">
          <div id="map"></div>
        </div>
      </div>

    
    