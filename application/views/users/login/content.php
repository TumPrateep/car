<style>
.leftline {
    border-left: 1px solid #ced4da;
}

.btn-fb {
    padding: 15px 20px;
    background: #ffffff;
    outline: none;
    font-size: 0.9375rem;
    color: #222222;
    border: 2px solid #e5e5e5;
    border-radius: 6;
}

.btn-fb:hover {
    background-color: #3b5998;
}

.btn-google {
    padding: 15px 20px;
    background: #ffffff;
    outline: none;
    font-size: 0.9375rem;
    color: #222222;
    border: 2px solid #e5e5e5;
    border-radius: 6;
}

.btn-google:hover {
    background-color: #dd4b39;
}

.hide {
    display: none;
}
</style>
<section class="section pricing">
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-5 form-login">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <h4 class="text-center">เข้าสู่ระบบ</h4>
                                <div id="error-message" class="alert alert-warning hide" role="alert"></div>
                                <form id="login">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <span>ชื่อผู้ใช้งาน</span>
                                                <input type="text" name="username" class="form-control main"
                                                    placeholder="ชื่อผู้ใช้งาน">
                                            </div>
                                            <div class="form-group">
                                                <span>รหัสผ่าน</span>
                                                <input type="password" name="password" class="form-control main"
                                                    placeholder="รหัสผ่าน">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-main-md width-100p bg-orange"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-google btn-block" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-google fa-lg" aria-hidden="true"></i> Google
                                        </button>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <button class="btn btn-fb btn-block" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i> Facebook
                                        </button>
                                    </div> -->
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-block" aria-haspopup="true" aria-expanded="false"
                                            onclick="register()">
                                            ลงทะเบียน
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 hide form-register">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="text-center">ลงทะเบียน</h4>
                                    </div>
                                </div>
                                <form id="register">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>ชื่อ</span>
                                                    <input type="text" name="firstname" class="form-control main"
                                                        placeholder="ชื่อ" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>นามสกุล</span>
                                                    <input type="text" name="lastname" class="form-control main"
                                                        placeholder="นามสกุล" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>เบอร์โทรศัพท์</span>
                                                    <input type="text" name="phone" class="form-control main"
                                                        placeholder="เบอร์โทรศัพท์">
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>อีเมล์</span>
                                                    <input type="email" name="email" class="form-control main"
                                                        placeholder="example@Carjaidee.com">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>ชื่อผู้ใช้งาน</span>
                                                    <input type="text" name="username" class="form-control main"
                                                        placeholder="ชื่อผู้ใช้งาน" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>รหัสผ่าน</span>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control main" placeholder="รหัสผ่าน" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>รหัสผ่านอีกครั้ง</span>
                                                    <input type="password" name="password_again"
                                                        class="form-control main btn-ga" placeholder="รหัสผ่านอีกครั้ง"
                                                        required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <button type="submit"
                                                        class="btn btn-outline-light width-100p bg-orange register"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        ลงทะเบียน
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-block" aria-haspopup="true"
                                                        aria-expanded="false" onclick="login()">
                                                        เข้าสู่ระบบ
                                                    </button>
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
</section>