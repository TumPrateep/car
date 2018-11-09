<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">แก้ไขข้อมูลช่าง</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                <li class="breadcrumb-item active">แก้ไขข้อมูลช่าง</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-white m-l-0 m-r-0 box-shadow ">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row"> 
                        <div class="col-lg-9">
                            <form id="submit">
                            <input type="hidden" id="mechanicId" name="mechanicId" value="<?=$mechanicId ?>">
                                <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name"><h4>ชื่อ</h4></label>
                                            <input type="text" class="form-control" name="firstname" id="firstName" placeholder="ชื่อ" title="enter your first name if any.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name"><h4>นามสกุล</h4></label>
                                            <input type="text" class="form-control" name="lastname" id="lastName" placeholder="นามสกุล" title="enter your last name if any.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone"><h4>เลขบัตรประชาชน</h4></label>
                                            <input type="text" class="form-control" name="personalid" id="personalid" placeholder="เลขบัตรประชาชน" title="enter your phone number if any.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone"><h4>ประสบการณ์(ปี)</h4></label>
                                            <input type="text" class="form-control" name="exp" id="exp" placeholder=" ปี" title="enter your phone number if any.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone"><h4>เบอร์โทรศัพท์</h4></label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" title="enter your phone number if any.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mobile"><h4>ความชำนาญ</h4></label>
                                            <select type="select" aria-setsize="100" class="form-control" name="skill" placeholder="ความชำนาญ" title="enter your mobile number if any.">
                                                  <option value="">เลือกความชำนาญ</option>
                                                  <option value="volvo">Honda</option>
                                                  <option value="saab">Isuzu</option>
                                                  <option value="fiat">Mazda</option> 
                                                  <option value="audi">Toyota</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg text-right">
                                        <button type="submit" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"> บันทึก</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>