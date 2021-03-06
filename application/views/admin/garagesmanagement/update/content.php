<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/garagesmanagement")?>">การจัดการผู้ให้บริการ</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลผู้ให้บริการ</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card bg-success">
                        <div class="card-header">
                            <h3 class="card-title text-white"><i class="fa fa-home"></i> เเก้ไขข้อมูลผู้ให้บริการ</h3>
                        </div>
                        <form id="update-garagesmanagement">
                            <input type="hidden" id="garageId" name="garageId" value="<?=$garageId?>">
                            <input type="hidden" id="mechanicId" name="mechanicId">
                            <div class="card col-md-12">
                                <h3>ข้อมูลเจ้าของผู้ให้บริการ</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="form-label required" for="user_profile"
                                            aria-required="true">คำนำหน้า</label><span class="error">*</span>
                                        <select class="form-control form-control-chosen-required" name="titleName"
                                            id="titleName" aria-required="true" aria-invalid="false">
                                            <option value="">คำนำหน้า</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                        <label id="titleName-error" class="error" for="titleName"></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>ชื่อ</label><span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required"
                                            name="firstname" id="firstname" placeholder="ชื่อ">
                                        <label id="firstname-error" class="error" for="firstname"></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>นามสกุล</label><span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required"
                                            name="lastname" id="lastname" placeholder="นามสกุล">
                                        <label id="lastname-error" class="error" for="lastname"></label>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label><span class="error">*</span>
                                            <input type="number" class="form-control form-control-chosen-required"
                                                name="phone1" id="phone1" placeholder="เบอร์โทรศัพท์">
                                            <label id="phone1-error" class="error" for="phone1"></label>
                                        </div>
                                    </div>
                                </div>
                                <h3>ข้อมูลร้านผู้ให้บริการ</h3>
                                <div class=row>
                                    <div class="col-md-6">
                                        <label>ชื่อร้านผู้ให้บริการ</label> <span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required"
                                            name="garageName" id="garageName" placeholder="ชื่อร้านผู้ให้บริการ">
                                        <label id="garageName-error" class="error" for="garageName"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>เบอร์โทรศัพท์ร้าน</label> <span class="error">*</span>
                                        <input type="number" class="form-control form-control-chosen-required"
                                            name="phone" id="phone" placeholder="เบอร์โทรศัพท์ร้าน">
                                        <label id="phone-error" class="error" for="phone"></label>
                                    </div>
                                </div>
                                <h3>ที่อยู่</h3>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">บ้านเลขที่</label><span class="error">*</span>
                                            <input type="text" class="form-control" name="hno" id="hno"
                                                placeholder="บ้านเลขที่">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">ซอย</label>
                                            <input type="text" class="form-control" name="alley" id="alley"
                                                placeholder="ซอย">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">ถนน</label>
                                            <input type="text" class="form-control" name="road" id="road"
                                                placeholder="ถนน">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">หมู่ที่</label>
                                            <input type="text" class="form-control" name="village" id="village"
                                                placeholder="หมู่ที่">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garage">จังหวัด</label><span class="error">*</span>
                                            <select class="form-control" name="provinceId" id="provinceId">
                                                <!-- <option>จังหวัด</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garage">อำเภอ</label><span class="error">*</span>
                                            <select class="form-control" name="districtId" id="districtId">
                                                <!-- <option>อำเภอ</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garage">ตำบล</label><span class="error">*</span>
                                            <select class="form-control" name="subdistrictId" id="subdistrictId">
                                                <!-- <option>ตำบล</option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garage">ละติจูด</label>
                                            <input type="text" class="form-control" name="latitude" id="latitude"
                                                placeholder="ละติจูด">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garage">ลองจิจูด</label>
                                            <input type="text" class="form-control" name="longtitude" id="longtitude"
                                                placeholder="ลองจิจูด">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garage">ประเภทศูนย์บริการ</label>
                                            <select name="group" id="group" class="form-control">
                                                <option value="">เลือกประเภทศูนย์บริการ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>