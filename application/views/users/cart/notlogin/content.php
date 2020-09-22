<style>
*,
::after,
::before {
    box-sizing: border-box;
}

.pt-10{
    padding: 10px;
}

ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
}

.btn-result {
    padding: 7px 7px 7px 7px;
}

div.brand img {
    margin: 45px 0px 0px 0px;
    width: 100%;
    height: auto;
}

.card-body.order {
    background-color: #ff6600;
    color: aliceblue;
    padding: 0.5rem;
}

.card.pointer {
    cursor: pointer;
}

.order>h5 {
    color: white !important;
}

.footer.order {
    background-color: #343a40;
    color: white;
}

.detail {
    width: -webkit-fill-available !important;
}

input[type="checkbox"] {
    width: 30px;
    height: 30px;
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
}

.google-button__icon {
    display: inline-block;
    vertical-align: middle;
    margin: 0px 0 8px 8px;
    width: 18px;
    height: 18px;
    box-sizing: border-box;
}

.form-control{
    margin-bottom: 10px;
}

</style>
<section class="section pricing" id="search">
    <div class="container">
        <div id="boby">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>ตะกร้า<span class="alternate">สินค้า</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">  
                    <table class="table table-hover" id="cart-table">
                        <tbody id="cart_list"></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right"><div class="row"><div class="col-9"><span class="font-italic">ราคารวมสินค้าในตะกร้า : </span></div><div class="col"><span class="font-italic" id="total-amount"></span></div></div></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-right"><div class="row"><div class="col-9"><span class="amount">ราคารวม : </span></div><div class="col"><span class="amount alternate" id="order_total_amount"></span></div></div></th>
                            </tr>
                        </tfoot>
                    </table>                 
                </div>
                <div class="col-md-12">
                    <hr>
                    <h5 class="text-center pt-10">วิธีการ<span class="alternate">ยืนยันการสั่งซื้อ</span></h5><br>
                    <div id="error-message" class="alert alert-warning hide" role="alert"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="row pt-10">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5 class="text-center">วิธีที่ 1 กรอกข้อมูลเพื่อยืนยัน</h5>
                                                </div>
                                            </div>
                                            <form id="register">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <span>ชื่อ</span>
                                                                <input type="text" name="firstname" class="form-control"
                                                                    placeholder="ชื่อ" required>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <span>นามสกุล</span>
                                                                <input type="text" name="lastname" class="form-control"
                                                                    placeholder="นามสกุล" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <span>เบอร์โทรศัพท์</span>
                                                                <input type="text" name="phone" class="form-control"
                                                                    placeholder="เบอร์โทรศัพท์">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <span>ชื่อผู้ใช้งาน</span>
                                                                <input type="text" name="username" class="form-control" id="t_username"
                                                                    placeholder="ชื่อผู้ใช้งาน" required>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <span>รหัสผ่าน</span>
                                                                <input type="password" name="password" id="t_password"
                                                                    class="form-control" placeholder="รหัสผ่าน" required>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <span>รหัสผ่านอีกครั้ง</span>
                                                                <input type="password" name="password_again"
                                                                    class="form-control" placeholder="รหัสผ่านอีกครั้ง"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="form-group col-md-4">
                                                                <span>หมวดอักษร</span><span class="error">*</span>
                                                                <input type="text" class="form-control" name="character_plate" id="character_plate" placeholder="หมวดอักษร">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <span>หมายเลขทะเบียน</span><span class="error">*</span>
                                                                <input type="number" class="form-control" name="number_plate" id="number_plate" placeholder="หมายเลขทะเบียน" min="0">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="form-group">
                                                                    <span>จังหวัด</span> <span class="error">*</span>
                                                                    <select class="form-control input-default" name="province_plate" id="province_plate">
                                                                    <option value="">เลือกจังหวัด</option><option value="64">กระบี่</option><option value="1">กรุงเทพมหานคร</option><option value="56">กาญจนบุรี</option><option value="34">กาฬสินธุ์</option><option value="49">กำแพงเพชร</option><option value="28">ขอนแก่น</option><option value="13">จันทบุรี</option><option value="15">ฉะเชิงเทรา</option><option value="11">ชลบุรี</option><option value="9">ชัยนาท</option><option value="25">ชัยภูมิ</option><option value="69">ชุมพร</option><option value="72">ตรัง</option><option value="14">ตราด</option><option value="50">ตาก</option><option value="17">นครนายก</option><option value="58">นครปฐม</option><option value="36">นครพนม</option><option value="19">นครราชสีมา</option><option value="63">นครศรีธรรมราช</option><option value="47">นครสวรรค์</option><option value="3">นนทบุรี</option><option value="76">นราธิวาส</option><option value="43">น่าน</option><option value="77">บึงกาฬ</option><option value="20">บุรีรัมย์</option><option value="4">ปทุมธานี</option><option value="62">ประจวบคีรีขันธ์</option><option value="16">ปราจีนบุรี</option><option value="74">ปัตตานี</option><option value="5">พระนครศรีอยุธยา</option><option value="44">พะเยา</option><option value="65">พังงา</option><option value="73">พัทลุง</option><option value="53">พิจิตร</option><option value="52">พิษณุโลก</option><option value="66">ภูเก็ต</option><option value="32">มหาสารคาม</option><option value="37">มุกดาหาร</option><option value="75">ยะลา</option><option value="24">ยโสธร</option><option value="68">ระนอง</option><option value="12">ระยอง</option><option value="55">ราชบุรี</option><option value="33">ร้อยเอ็ด</option><option value="7">ลพบุรี</option><option value="40">ลำปาง</option><option value="39">ลำพูน</option><option value="22">ศรีสะเกษ</option><option value="35">สกลนคร</option><option value="70">สงขลา</option><option value="71">สตูล</option><option value="2">สมุทรปราการ</option><option value="60">สมุทรสงคราม</option><option value="59">สมุทรสาคร</option><option value="10">สระบุรี</option><option value="18">สระแก้ว</option><option value="8">สิงห์บุรี</option><option value="57">สุพรรณบุรี</option><option value="67">สุราษฎร์ธานี</option><option value="21">สุรินทร์</option><option value="51">สุโขทัย</option><option value="31">หนองคาย</option><option value="27">หนองบัวลำภู</option><option value="26">อำนาจเจริญ</option><option value="29">อุดรธานี</option><option value="41">อุตรดิตถ์</option><option value="48">อุทัยธานี</option><option value="23">อุบลราชธานี</option><option value="6">อ่างทอง</option><option value="45">เชียงราย</option><option value="38">เชียงใหม่</option><option value="78">เบตง</option><option value="61">เพชรบุรี</option><option value="54">เพชรบูรณ์</option><option value="30">เลย</option><option value="42">แพร่</option><option value="46">แม่ฮ่องสอน</option></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-main-md width-100p bg-orange" onclick="checkData()"> ยืนยันการชำระเงิน</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 form-login">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-body">
                                                    <div class="row pt-10">
                                                        <div class="col-lg-12">
                                                            <h5 class="text-center">วิธีที่ 2 เข้าสู่ระบบเพื่อยืนยัน</h5>
                                                        </div>
                                                    </div>
                                                    <form id="login">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <span>ชื่อผู้ใช้งาน</span>
                                                                    <input type="text" name="username" class="form-control"
                                                                        placeholder="ชื่อผู้ใช้งาน">
                                                                </div>
                                                                <div class="form-group">
                                                                    <span>รหัสผ่าน</span>
                                                                    <input type="password" name="password" class="form-control"
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
	</div>
</section>