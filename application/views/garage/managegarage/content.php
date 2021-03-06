<div class="page-wrapper bg-container">
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
                <div class="table-responsive">
                   <!--  <thead>
                        <tr><th></th></tr>
                    </thead> -->
                    <!-- <tbody>
                        <tr>
                            <td> -->
                    <div class="card">
                        <form id="registergarage">
                            <!-- <div class="shop">
                                <div class="container"> -->
                            <div class="row m-y-2">
                                <div class="col-lg-12 push-lg-4">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="" data-target="#garage" data-toggle="tab" class="nav-link active">ข้อมูลอู่ซ่อมรถ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" data-target="#mechanic" data-toggle="tab" class="nav-link">ข้อมูลเจ้าของอู่</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content p-b-3">
                                        <div class="tab-pane" id="mechanic"><br>
                                            <form id="registergarage">
                                                <div class="shop">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row p-t-20">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <h3><label class="control-label">รูปเจ้าของอู่ซ่อมรถ</label></h3>
                                                                            <div class="image-editor" id="owner">
																			<div class="cropit-preview"></div>
                                                                                <input type="hidden" name="pictures" id="pictures" class="hidden-image-data" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8"> 
                                                            <h3>ข้อมูลทั่วไป</h3>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label for="garage">เลขรหัสบัตรประชาชน</label>
                                                                        <input type="number" class="form-control" name="personalid" id="personalid" readonly>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="garage">ชื่อ-นามสกุล</label>
                                                                        <input type="text" class="form-control" name="flName" id="flName" readonly>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label for="garage">เบอร์โทรศัพท์</label>
                                                                        <input type="number" class="form-control" name="phone" id="phone"  readonly>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="garage">ประสบการณ์</label>
                                                                        <input type="text" class="form-control" name="exp" id="exp" readonly>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row">
                                                                <!-- <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <a  href="<?=base_url("garage/managegarage/create") ?>"><button type="button" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>สร้าง</button></a>
                                                                    </div>
                                                                 </div> -->
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <a  href="<?=base_url("garage/managegarage/updateowner") ?>"><button type="button" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขข้อมูลเจ้าของอู่</button></a>
                                                                    </div>
                                                                 </div>
                                                                </div><br>
                                                            </div>  
                                                        </div><br>
                                                        <!-- <div class="row">
															<div class="col-md-2">
                                                                <div class="form-group">
                                                            		<a  href="<?=base_url("garage/managegarage/updateowner") ?>"><button type="button" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไข</button></a>
															    </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>					
                                            </form>
                                        </div>

                                        <div class="tab-pane active" id="garage"><br>
                                            <form id="registergarage">
                                                <div class="shop">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row p-t-20">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <h3><label class="control-label">รูปร้านอู่ซ่อมรถ</label></h3>
                                                                            <div class="image-editor" id="garage">
                                                                                <div class="cropit-preview"></div>
                                                                              <input type="hidden" name="garagePicture" id="garagePicture" class="hidden-image-data" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8"> 
                                                            <h3>ข้อมูลทั่วไป</h3>
                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <label for="garage">ชื่ออู่ซ่อมรถ</label>
                                                                        <input type="text" class="form-control" name="garageName" id="garageName" readonly>
                                                                    </div>
                                                                    <div class="col-sm">
                                                                        <label for="garage">หมายเลขทะเบียนการค้า</label>
                                                                        <input type="number" class="form-control" name="businessRegistration" id="businessRegistration" readonly>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <label for="garage">เบอร์โทรศัพท์</label>
                                                                        <input type="number" class="form-control" name="phoned" id="phoned"  readonly>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="garage">ความเชี่ยวชาญด้านรถ</label>
                                                                        <input type="text" class="form-control" name="brandId" id="brandId" readonly>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <label for="garage">การบริการ</label>
                                                                        <input type="text" class="form-control" name="garageService" id="garageService"  readonly>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <label for="garage">ช่วงเวลาทำการ</label>
                                                                        <input type="text" class="form-control" name="timeSE" id="timeSE" readonly>
                                                                    </div>
                                                                    <div class="col-sm">
                                                                        <label for="garage">วันทำการ</label>
                                                                        <input type="text" class="form-control" name="dateSE"  id="dateSE" readonly>
                                                                    </div>
                                                                </div><br>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="garage">บริการเพิ่มเติม</label>
                                                                        <textarea id="service_options" rows="4" class="form-control" readonly></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-md-12"> 
                                                                <h3>ที่อยู่</h3>
                                                                <textarea class="form-control" rows="3" id="address" readonly></textarea>
                                                            </div>
                                                        </div><br>
                                                        <div class="row justify-content-md-center">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                            		<a  href="<?=base_url("garage/managegarage/update") ?>"><button type="button" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขข้อมูลอู่ซ่อมรถ</button></a>
															    </div>
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
                                <!-- </div>
                            </div> -->
                        </form>
                    </div>
                            <!-- </td>
                        </tr>
                    </tbody> -->
                </div>
            </div>
        </div>
           
    <div>       
</div>

    