<style>
.leftline {
    border-left: 1px solid #ced4da;
}

.pt-10{
    padding: 10px;
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

.google-button {
    height: 40px;
    width: 100%;
    border-width: 0;
    background: white;
    color: #737373;
    border-radius: 5px;
    white-space: nowrap;
    box-shadow: 1px 1px 0px 1px rgba(0, 0, 0, 0.05);
    transition-property: background-color, box-shadow;
    transition-duration: 150ms;
    transition-timing-function: ease-in-out;
    padding: 0;

    &:focus,
    &:hover {
        box-shadow: 1px 4px 5px 1px rgba(0, 0, 0, 0.1);
    }

    &:active {
        background-color: #e5e5e5;
        box-shadow: none;
        transition-duration: 10ms;
    }
}

.google-button__icon {
    display: inline-block;
    vertical-align: middle;
    margin: 0px 0 8px 8px;
    width: 18px;
    height: 18px;
    box-sizing: border-box;
}
</style>
<section class="section pricing" id="top-register">
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
                                            <p class="pt-10">
                                                <a href="<?php echo base_url('forgotPassword') ?>">ลืมรหัสผ่านใช่หรือไม่</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn google-button btn-block" id="login-button">
                                            <span class="google-button__icon">
                                                <svg viewBox="0 0 366 372" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M125.9 10.2c40.2-13.9 85.3-13.6 125.3 1.1 22.2 8.2 42.5 21 59.9 37.1-5.8 6.3-12.1 12.2-18.1 18.3l-34.2 34.2c-11.3-10.8-25.1-19-40.1-23.6-17.6-5.3-36.6-6.1-54.6-2.2-21 4.5-40.5 15.5-55.6 30.9-12.2 12.3-21.4 27.5-27 43.9-20.3-15.8-40.6-31.5-61-47.3 21.5-43 60.1-76.9 105.4-92.4z"
                                                        id="Shape" fill="#EA4335" />
                                                    <path
                                                        d="M20.6 102.4c20.3 15.8 40.6 31.5 61 47.3-8 23.3-8 49.2 0 72.4-20.3 15.8-40.6 31.6-60.9 47.3C1.9 232.7-3.8 189.6 4.4 149.2c3.3-16.2 8.7-32 16.2-46.8z"
                                                        id="Shape" fill="#FBBC05" />
                                                    <path
                                                        d="M361.7 151.1c5.8 32.7 4.5 66.8-4.7 98.8-8.5 29.3-24.6 56.5-47.1 77.2l-59.1-45.9c19.5-13.1 33.3-34.3 37.2-57.5H186.6c.1-24.2.1-48.4.1-72.6h175z"
                                                        id="Shape" fill="#4285F4" />
                                                    <path
                                                        d="M81.4 222.2c7.8 22.9 22.8 43.2 42.6 57.1 12.4 8.7 26.6 14.9 41.4 17.9 14.6 3 29.7 2.6 44.4.1 14.6-2.6 28.7-7.9 41-16.2l59.1 45.9c-21.3 19.7-48 33.1-76.2 39.6-31.2 7.1-64.2 7.3-95.2-1-24.6-6.5-47.7-18.2-67.6-34.1-20.9-16.6-38.3-38-50.4-62 20.3-15.7 40.6-31.5 60.9-47.3z"
                                                        fill="#34A853" /></svg>
                                            </span>
                                            <span class="google-button__text">เข้าสู่ระบบด้วย Google</span>
                                        </button>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block" aria-haspopup="true"
                                            aria-expanded="false" onclick="register()">
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
                                            <div id="error-message2" class="alert alert-warning hide" role="alert"></div>
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
                                                    <input type="text" name="username" id="t_username" class="form-control main"
                                                        placeholder="ชื่อผู้ใช้งาน" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>รหัสผ่าน</span>
                                                    <input type="password" name="password" id="t_password"
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
                                                    <button type="button" class="btn btn-block" aria-haspopup="true"
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