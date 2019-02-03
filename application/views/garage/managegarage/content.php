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
                                                                            <h3><label class="control-label">รูปเจ้าของอู่ซ่อมรถ</label></h3>
                                                                            <div class="image-editor">
																			<div class="cropit-preview"></div>
                                                                                <input type="hidden" name="picture" id="picture" class="hidden-image-data" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card col-md-8"> 
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
                                                                    <div class="col-sm-6">
                                                                        <label for="garage">ความชำนาญ</label>
                                                                        <input type="number" class="form-control" name="skill" id="skill"  readonly>
                                                                    </div>
                                                                </div><br>
                                                               
                                                                
                                                            </div>  
                                                        </div>
                                                        <div class="row">
                                                            <div class="card col-md-12"> 
                                                            <h3>ที่อยู่</h3>
                                                                <textarea class="form-control" rows="5" id="garageowneraddress" readonly></textarea>
                                                            </div>
															<div class="col-md-2">
                                                                <div class="form-group">
                                                            		<a  href="<?=base_url("garage/managegarage/updateowner") ?>"><button type="button" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไข</button></a>
															    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>					
                                            </form>
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
                                                                            <h3><label class="control-label">รูปร้านอู่ซ่อมรถ</label></h3>
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
                                                                        <input type="number" class="form-control" name="phoned" id="phoned"  readonly>
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
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                            		<a  href="<?=base_url("garage/managegarage/update") ?>"><button type="button" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไข</button></a>
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

    