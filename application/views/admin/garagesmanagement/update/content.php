<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/garagesmanagement") ?>">การจัดการผู้ให้บริการ</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลผู้ให้บริการ</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card bg-success">
                        <div class="card-header">
                            <h3 class="card-title text-white"><i class="fa fa-home"></i> เเก้ไขข้อมูลผู้ให้บริการ</h3>
                        </div>
                        <form id="update-garagesmanagement">
                            <input type="hidden" id="garageId" name="garageId" value="<?=$garageId ?>">
                            <div class="card col-md-12">
                                <h3>ข้อมูลเจ้าของผู้ให้บริการ</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="form-label required" for="user_profile" aria-required="true">คำนำหน้า</label><span class="error">*</span>
                                            <select class="form-control form-control-chosen-required" name="titleName" id="titleName" aria-required="true" aria-invalid="false">
                                                <option value="">คำนำหน้า</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นาง">นาง</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>
                                        <label id="titleName-error" class="error" for="titleName"></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>ชื่อ</label><span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required" name="firstname" id="firstname" placeholder="ชื่อ">
                                        <label id="firstname-error" class="error" for="firstname"></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>นามสกุล</label><span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required" name="lastname" id="lastname" placeholder="นามสกุล">
                                        <label id="lastname-error" class="error" for="lastname"></label>
                                    </div>
                              
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์</label><span class="error">*</span>
                                            <input type="number" class="form-control form-control-chosen-required" name="phone1" id="phone1" placeholder="เบอร์โทรศัพท์">
                                            <label id="phone1-error" class="error" for="phone1"></label>
                                        </div>
                                    </div>
                                </div>
                                <h3>ข้อมูลร้านผู้ให้บริการ</h3>
                                <div class=row>
                                    <div class="col-md-6">
                                        <label>ชื่อร้านผู้ให้บริการ</label> <span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required" name="garageName" id="garageName" placeholder="ชื่อร้านผู้ให้บริการ">
                                        <label id="garageName-error" class="error" for="garageName"></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>เบอร์โทรศัพท์ร้าน</label> <span class="error">*</span>
                                        <input type="number" class="form-control form-control-chosen-required" name="phone" id="phone"  placeholder="เบอร์โทรศัพท์ร้าน">
                                        <label id="phone-error" class="error" for="phone"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>ที่อยู่</label><span class="error">*</span>
                                        <textarea class="form-control" name="addressGarage" id="addressGarage" rows="3" placeholder="ที่อยู่" ></textarea>
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