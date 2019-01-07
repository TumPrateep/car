<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มข้อมูลราคาเปลี่ยนยาง</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                <li class="breadcrumb-item active">สร้างข้อมูลช่าง</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>เพิ่มข้อมูลราคาเปลี่ยนยาง</h4>

                </div>
                <div class="card-body">
                  <form id="submit">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label>ราคายางล้อหน้า</label><span class="error">*</span>
                                <input type="number" class="form-control"  name="tire_front" id="tire_front" placeholder="ราคายางล้อหน้า">
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <div class="form-group">
                                <label>ราคายางล้อหลัง</label><span class="error">*</span>
                                <input type="number" class="form-control" name="tire_back" id="tire_back" placeholder="ราคายางล้อหลัง">
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <div class="form-group">
                          <label>ชื่อขอบยาง</label> <span class="error">*</span>
                            <select class="form-control" name="tire_rimId" id="tire_rimId">
                                <option value="">กรุณาเลือกขอบยาง</option>
                            </select>
                         </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"> 
                        <button type="submit" class="btn btn-info m-b-10 m-l-5">บันทึก</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    