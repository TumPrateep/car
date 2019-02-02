<div class="page-wrapper bg-container">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">จัดการข้อมูลอู่</h3> 
        </div>
<<<<<<< HEAD
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
                                                    <form id="submit">
                                                        <div class="shop">
                                                            <div class="container">
                                                                <h3>ข้อมูลอู่ซ่อมรถ</h3>
                                                                <div class="tab-pane" id="garage"><br>
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="card col-md-4">
                                                                            <div class="row p-t-20">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <H3><label class="control-label">รูปร้านอู่ซ่อมรถ</label></H3>
                                                                                        <div class="image-editor">
                                                                                            <div class="cropit-preview"></div>
                                                                                            <input type="hidden" name="garagePicture" id="garagePicture" class="hidden-image-data" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card col-md-8"> 
                                                                        <h3>ข้อมูลทั่วไป</h3>
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
=======
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
                                                        <div class="row m-y-2">
                                                            <div class="col-lg-12 push-lg-4">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="nav-item">
                                                                        <a href="" data-target="#mechanic" data-toggle="tab" class="nav-link active">ข้อมูลเจ้าของอู่</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="" data-target="#garage" data-toggle="tab" class="nav-link">ข้อมูลอู่ซ่อมรถ</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content p-b-3">
                                                                    <div class="tab-pane active" id="mechanic"><br>
                                                                        <form id="registergarage">
                                                                            <div class="shop">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="card col-md-4">
                                                                                            <div class="row p-t-20">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label">รูปเจ้าของอู่ซ่อมรถ</label>
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
                                                                                                    <label for="garage">เลขรหัสบัตรประชาชน</label>
                                                                                                    <input type="number" class="form-control" name="personalid" id="personalid" readonly>
                                                                                                </div>
                                                                                                <div class="col-sm">
                                                                                                    <label for="garage">ชื่อ-นามสกุล</label>
                                                                                                    <input type="text" class="form-control" name="flName" id="flName" readonly>
                                                                                                </div>
                                                                                            </div><br>
                                                                                            <div class="row">
                                                                                                <div class="col-sm">
                                                                                                    <label for="garage">เบอร์โทรศัพท์ที่สามารถติดต่อได้</label>
                                                                                                    <input type="text" class="form-control" name="phone1" id="phone1" readonly>
                                                                                                </div>
                                                                                                <div class="col-sm">
                                                                                                    <label for="garage">เบอร์โทรศัพท์</label>
                                                                                                    <input type="number" class="form-control" name="phone2" id="phone2"  readonly>
                                                                                                </div>
                                                                                            </div><br>
                                                                                            <div class="row">
                                                                                                <div class="col-sm">
                                                                                                    <label for="garage">ประสบการณ์</label>
                                                                                                    <input type="text" class="form-control" name="exp" id="exp" readonly>
                                                                                                </div>
                                                                                                <div class="col-sm">
                                                                                                    <label for="garage">ความชำนาญ</label>
                                                                                                    <input type="number" class="form-control" name="skill" id="skill"  readonly>
                                                                                                </div>
                                                                                            </div><br>
                                                                                           
                                                                                            
                                                                                        </div>  
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="card col-md-12"> 
                                                                                        <h4>ที่อยู่</h4>
                                                                                            <textarea class="form-control" rows="5" id="garageowneraddress" readonly></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>					
                                                                        </form>
>>>>>>> 665562255c5937a7e487b4fd0dc3841cd957911a
                                                                    </div>

                                                                    <div class="tab-pane" id="garage"><br>
                                                                        <form id="registergarage">
                                                                            <div class="shop">
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
                                                                                        <h4>ที่อยู่</h4>
                                                                                            <textarea class="form-control" rows="5" id="address" readonly></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>					
                                                                        </form>
                                                                    </div>
                                                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>       
</div>

    