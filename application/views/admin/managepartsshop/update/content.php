<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url(" admin/managepartsshop ") ?>">การจัดการร้านอะไหล่</a>
        </li>
        <li class="breadcrumb-item active">เเก้ไขข้อมูลร้านอะไหล่</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card bg-success">
                        <div class="card-header">
                            <h3 class="card-title text-white"><i class="fa fa-home"></i> เเก้ไขข้อมูลร้านอะไหล่</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="update-partsshop">
                            <input type="hidden" id="car_accessoriesId" name="car_accessoriesId" value="<?=$car_accessoriesId ?>" />
                            <!-- <div class="shop">
                                                    <div class="container"> -->
                            <div class="card col-md-12">

                                <h3>ข้อมูลร้านอะไหล่</h3>
                                <div class=row>
                                    <div class="col-md-6">
                                        <label>ชื่อร้านอะไหล่</label> <span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required" placeholder="ชื่อร้านอะไหล่" name="car_accessoriesName" id="car_accessoriesName">
                                        <label id="car_accessoriesName-error" class="error" for="car_accessoriesName"></label>
                                    </div>

                                    <div class="col-md-6">
                                        <label>เบอร์โทรศัพท์ร้าน</label> <span class="error">*</span>
                                        <input type="number" class="form-control form-control-chosen-required" placeholder="ชื่อยี่ห้อรถ" name="car_accessories_phone" id="car_accessories_phone">
                                        <label id="car_accessories_phone-error" class="error" for="car_accessories_phone"></label>
                                    </div>

                                    <div class="col-md-6">
                                        <label>จำนวนวันที่จัดส่ง</label> <span class="error">*</span>
                                        <input type="number" class="form-control" placeholder="จำนวนวันที่จัดส่ง" name="deliver_day" id="deliver_day">
                                        <label id="deliver_day-error" class="error" for="deliver_day"></label>
                                    </div>
                                </div>
                                <br>
                                <h3>ที่อยู่</h3>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">บ้านเลขที่</label><span class="error">*</span>
                                            <input type="text" class="form-control" name="hno" id="hno" placeholder="บ้านเลขที่" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">ซอย</label>
                                            <input type="text" class="form-control" name="alley" id="alley" placeholder="ซอย" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">ถนน</label>
                                            <input type="text" class="form-control" name="road" id="road" placeholder="ถนน">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="garage">หมู่ที่</label>
                                            <input type="text" class="form-control" name="village" id="village" placeholder="หมู่ที่" >
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
                                <br>
                                <h3>ข้อมูลเจ้าของร้านอะไหล่</h3>
                                <div class=row>
                                    <div class="col-md-2">
                                        <label class="form-label">คำนำหน้า</label><span class="error">*</span>
                                        <select class="form-control form-control-chosen-required" name="titleName" id="titleName" aria-required="true" aria-invalid="false">
                                            <option value="">คำนำหน้า</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                        <label id="titleName-error" class="error" for="titleName"></label>
                                    </div>
                                    <div class="col-sm-5">
                                        <label>ชื่อ</label><span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required" name="firstname" id="firstname" placeholder="ชื่อ">
                                        <label id="profile_firstname-error" class="error" for="firstname"></label>
                                    </div>
                                    <div class="col-sm-5">
                                        <label>นามสกุล</label><span class="error">*</span>
                                        <input type="text" class="form-control form-control-chosen-required" name="lastname" id="lastname" placeholder="นามสกุล">
                                        <label id="profile_lastname-error" class="error" for="lastname"></label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    </div>