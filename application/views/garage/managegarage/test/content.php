<div class="page-wrapper bg-container">

        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">จัดการข้อมูลอู่</h3> 
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">จัดการข้อมูลอู่</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <!-- <table class="table table-nobordered no-head" id="Mechanic-table"> -->
                                    <thead>
                                        <tr><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
												<div class="card">
                                                    <form id="registergarage">
                                                        <div class="shop">
                                                            <div class="container">
                                                                <h3>ข้อมูลอู่ซ่อมรถ</h3>
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="card col-md-4">
                                                                            <div class="row p-t-20">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">รูปร้านอู่ซ่อมรถ</label>
                                                                                        <div class="image-editor">
                                                                                            <input type="file" class="cropit-image-input" name="tempImage">
                                                                                            <div class="cropit-preview"></div>
                                                                                            <div class="image-size-label">ปรับขนาด</div>
                                                                                            <input type="range" class="cropit-image-zoom-input">
                                                                                            <input type="hidden" name="garagePicture" id="garagePicture" class="hidden-image-data" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card col-md-8"> 
                                                                        <h4>ข้อมูลทั่วไป</h4>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label for="garage">หมายเลขทะเบียนการค้า</label>
                                                                                    <input type="number" class="form-control" name="businessRegistration" id="businessRegistration" readonly>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label for="garage">ชื่ออู่ซ่อมรถ</label>
                                                                                    <input type="text" class="form-control" name="garageName" id="garageName" readonly>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label for="garage">เบอร์โทรศัพท์</label>
                                                                                    <input type="number" class="form-control" name="phone" id="phone"  readonly>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label for="garage">ช่วงเวลาทำการ</label>
                                                                                    <input type="number" class="form-control" name="timeSE" id="timeSE" readonly>
                                                                                </div>
                                                                                <div class="col-sm">
                                                                                    <label for="garage">วันทำการ</label>
                                                                                    <input type="text" class="form-control" name="dateSE"  id="dateSE"  readonly>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="col-sm">
                                                                                    <label for="comment">ข้อมูลเพิ่มเติม:</label>
                                                                                    <textarea class="form-control" rows="5" id="comment" readonly></textarea>
                                                                                </div>
                                                                            </div><br>
                                                                        </div>  
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="card col-md-12"> 
                                                                        <h3>ที่อยู่</h3>
                                                                            <textarea class="form-control" rows="5" id="address" readonly></textarea>
                                                                       </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>					
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>       
    </div>

    