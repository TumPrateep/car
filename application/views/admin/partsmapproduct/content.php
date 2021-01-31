
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/partsmapproduct") ?>">เช็คระยะตามข้อมูลรถ</a>
        </li>
        <li class="breadcrumb-item active">ค้นหา</li>
      </ol>

      <div class="card-tools one">
        <form id="form-search">
            <div class="form-row">
                <div class="col-md-3 offset-md-4">
                  <div class="form-group">
                    <select class="form-control" name="brandId" id="brandId">
                      <option value="">เลือกยี่ห้อรถ</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control" name="modelId" id="modelId">
                      <option value="">เลือกรุ่นรถ</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group-append">
                        <button type="submit" id="btn-search" class="btn btn-success btn-block">
                        <i class="fa fa-search"></i>  ค้นหา
                        </button>
                    </div>
                </div>
            </div>
        </form>
      </div>

     <div class="table-responsive">
      <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-toggle-left"></i>  ข้อมูลรถ</th>
          <th><i class="fa fa fa-table"></i>  ตารางการเช็คระยะ</th>
          <th>สถานะ</th>
          <th></th>
        </thead>	
      </table>
    </div>

    <div class="modal fade" id="change-part-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <form id="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ตั้งค่าตารางเช็คระยะ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="txt-title"></p>
            <input type="hidden" name="modelofcarId" id="modelofcarId">
            <div class="form-group">
              <label>ตารางเช็คระยะ</label>
              <select class="form-control" name="parts_table_id" id="parts_table_id" required></select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            <button type="submit" class="btn btn-primary">บันทึก</button>
          </div>
        </div>
      </form>
      </div>
    </div>

  
