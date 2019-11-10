<section class="section pricing">
    <div class="container">
        <div class="row flex-row flex-wrap">
            <div class="row">
            <div class="col-md-12">
            <div class="section-title">
                <h3>เพิ่ม<span class="alternate">ข้อมูลรถยนต์</span></h3>
            </div>
        </div>
                <div class="card col-md-12">
                    <form id="submit" novalidate="novalidate">
                    
                        <div class="card-body" >
                        <div class="form-group row ">
                            <div class="form-group col-md-3">
                                <label>หมวดอักษร</label><span class="error">*</span>
                                <input type="text" class="form-control" name="character_plate" id="character_plate" placeholder="หมวดอักษร">
                            </div>
                            <div class="form-group col-md-3">
                                <label>หมายเลขทะเบียน</label><span class="error">*</span>
                                <input type="number" class="form-control" name="number_plate" id="number_plate" placeholder="หมายเลขทะเบียน" min="0">
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label class="form-label required" for="garage" aria-required="true">จังหวัด</label> <span class="error">*</span>
                                    <select class="form-control input-default" name="province_plate" id="province_plate"><option value="">เลือกจังหวัด</option><option value="64">กระบี่</option><option value="1">กรุงเทพมหานคร</option><option value="56">กาญจนบุรี</option><option value="34">กาฬสินธุ์</option><option value="49">กำแพงเพชร</option><option value="28">ขอนแก่น</option><option value="13">จันทบุรี</option><option value="15">ฉะเชิงเทรา</option><option value="11">ชลบุรี</option><option value="9">ชัยนาท</option><option value="25">ชัยภูมิ</option><option value="69">ชุมพร</option><option value="72">ตรัง</option><option value="14">ตราด</option><option value="50">ตาก</option><option value="17">นครนายก</option><option value="58">นครปฐม</option><option value="36">นครพนม</option><option value="19">นครราชสีมา</option><option value="63">นครศรีธรรมราช</option><option value="47">นครสวรรค์</option><option value="3">นนทบุรี</option><option value="76">นราธิวาส</option><option value="43">น่าน</option><option value="77">บึงกาฬ</option><option value="20">บุรีรัมย์</option><option value="4">ปทุมธานี</option><option value="62">ประจวบคีรีขันธ์</option><option value="16">ปราจีนบุรี</option><option value="74">ปัตตานี</option><option value="5">พระนครศรีอยุธยา</option><option value="44">พะเยา</option><option value="65">พังงา</option><option value="73">พัทลุง</option><option value="53">พิจิตร</option><option value="52">พิษณุโลก</option><option value="66">ภูเก็ต</option><option value="32">มหาสารคาม</option><option value="37">มุกดาหาร</option><option value="75">ยะลา</option><option value="24">ยโสธร</option><option value="68">ระนอง</option><option value="12">ระยอง</option><option value="55">ราชบุรี</option><option value="33">ร้อยเอ็ด</option><option value="7">ลพบุรี</option><option value="40">ลำปาง</option><option value="39">ลำพูน</option><option value="22">ศรีสะเกษ</option><option value="35">สกลนคร</option><option value="70">สงขลา</option><option value="71">สตูล</option><option value="2">สมุทรปราการ</option><option value="60">สมุทรสงคราม</option><option value="59">สมุทรสาคร</option><option value="10">สระบุรี</option><option value="18">สระแก้ว</option><option value="8">สิงห์บุรี</option><option value="57">สุพรรณบุรี</option><option value="67">สุราษฎร์ธานี</option><option value="21">สุรินทร์</option><option value="51">สุโขทัย</option><option value="31">หนองคาย</option><option value="27">หนองบัวลำภู</option><option value="26">อำนาจเจริญ</option><option value="29">อุดรธานี</option><option value="41">อุตรดิตถ์</option><option value="48">อุทัยธานี</option><option value="23">อุบลราชธานี</option><option value="6">อ่างทอง</option><option value="45">เชียงราย</option><option value="38">เชียงใหม่</option><option value="78">เบตง</option><option value="61">เพชรบุรี</option><option value="54">เพชรบูรณ์</option><option value="30">เลย</option><option value="42">แพร่</option><option value="46">แม่ฮ่องสอน</option></select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label class="form-label required" for="garage" aria-required="true">ยี่ห้อ</label> <span class="error">*</span>
                                    <select class="form-control input-default" name="brandId" id="brandId">
                                        <option value="">เลือกยี่ห้อรถ</option>
                                    <option data-thumbnail="images/icon-chrome.png" value="11">AUDI</option><option data-thumbnail="images/icon-chrome.png" value="1">CHEVROLET</option><option data-thumbnail="images/icon-chrome.png" value="4">FORD</option><option data-thumbnail="images/icon-chrome.png" value="2">HONDA</option><option data-thumbnail="images/icon-chrome.png" value="13">HYANDAI</option><option data-thumbnail="images/icon-chrome.png" value="3">ISUZU</option><option data-thumbnail="images/icon-chrome.png" value="9">KIA</option><option data-thumbnail="images/icon-chrome.png" value="5">MAZDA</option><option data-thumbnail="images/icon-chrome.png" value="12">MERCEDEZ BENZ</option><option data-thumbnail="images/icon-chrome.png" value="7">MISHUBISHI</option><option data-thumbnail="images/icon-chrome.png" value="8">NISSAN</option><option data-thumbnail="images/icon-chrome.png" value="14">SUBARU</option><option data-thumbnail="images/icon-chrome.png" value="15">SUZUKI</option><option data-thumbnail="images/icon-chrome.png" value="6">TOYOTA</option><option data-thumbnail="images/icon-chrome.png" value="10">VOLKSWAGEN</option></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label class="form-label required" for="garage" aria-required="true">รุ่นรถ</label> <span class="error">*</span>
                                    <select class="form-control input-default" name="modelId" id="modelId">
                                        <option value="">เลือกรุ่นรถ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label class="form-label required" for="garage" aria-required="true">ปีรถยนต์</label> <span class="error">*</span>
                                    <select class="form-control input-default" name="detail" id="detail">
                                        <option value="">เลือกปี</option>
                                        <option value="1">2015</option><option value="2">2016</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label class="form-label required" for="garage" aria-required="true">รายละเอียดรุ่น</label> <span class="error">*</span>
                                    <select class="form-control input-default" name="brandId" id="brandId">
                                        <option value="">รายละเอียดรุ่น</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <label class="form-label required" for="garage" aria-required="true">เชื้อเพลิง</label> <span class="error">*</span>
                                    <select class="form-control input-default" name="brandId" id="brandId">
                                        <option value="">เลือกเชื้อเพลิง</option>
                                    <option value="1">ดีเซล</option><option value="2">เบนซิน</option></select>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group row ">
                            <div class="form-group col-md-4">
                                <label for="phone">สี</label><span class="error">*</span>
                                <input type="text" class="form-control" name="color" id="color" placeholder=" สี">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="color">เลขกิโลเมตร</label><!-- <span class="error">*</span> -->
                                <input type="text" class="form-control" name="mileage" id="mileage" placeholder="เลขกิโลเมตร" min="0">
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">รูปหน้ารถ</label>
                                    <div class="image-editor-front">
                                        <input type="file" class="cropit-image-input" name="tempImage" required="" aria-required="true" accept="image/*">
                                        <div class="cropit-preview" style="position: relative; width: 200px; height: 200px;"><div class="cropit-preview-image-container" style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 100%; height: 100%;"><img class="cropit-preview-image" alt="" style="transform-origin: left top; will-change: transform;"></div></div>
                                        <div class="image-size-label">ปรับขนาด</div>
                                        <input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01">
                                        <input type="hidden" name="picture1" class="hidden-image-front">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">รูปหลังรถ</label>
                                    <div class="image-editor-back">
                                        <input type="file" class="cropit-image-input" name="tempImage" required="" aria-required="true" accept="image/*">
                                        <div class="cropit-preview" style="position: relative; width: 200px; height: 200px;"><div class="cropit-preview-image-container" style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 100%; height: 100%;"><img class="cropit-preview-image" alt="" style="transform-origin: left top; will-change: transform;"></div></div>
                                        <div class="image-size-label">ปรับขนาด</div>
                                        <input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01">
                                        <input type="hidden" name="picture2" class="hidden-image-back">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">เล่มทะเบียนรถ</label>
                                    <div class="image-editor-form">
                                        <input type="file" class="cropit-image-input" name="tempImage" required="" aria-required="true" accept="image/*">
                                        <div class="cropit-preview" style="position: relative; width: 600px; height: 300px;"><div class="cropit-preview-image-container" style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 100%; height: 100%;"><img class="cropit-preview-image" alt="" style="transform-origin: left top; will-change: transform;"></div></div>
                                        <div class="image-size-label">ปรับขนาด</div>
                                        <input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01">
                                        <input type="hidden" name="picture-form" class="hidden-image-form">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                <button type="submit" class="btn btn-main-md bg-orange">บันทึก</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
        </div>
    </div>
</section>