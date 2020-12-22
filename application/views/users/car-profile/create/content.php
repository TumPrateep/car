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
                    <form id="submit">

                        <div class="card-body">
                            <div class="form-group row ">
                                <div class="form-group col-md-3">
                                    <label>หมวดอักษร</label><span class="error">*</span>
                                    <input type="text" class="form-control" name="character_plate" id="character_plate"
                                        placeholder="หมวดอักษร">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>หมายเลขทะเบียน</label><span class="error">*</span>
                                    <input type="number" class="form-control" name="number_plate" id="number_plate"
                                        placeholder="หมายเลขทะเบียน" min="0">
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label class="form-label required" for="garage"
                                            aria-required="true">จังหวัด</label> <span class="error">*</span>
                                        <select class="form-control input-default" name="province_plate"
                                            id="province_plate">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label class="form-label required" for="garage"
                                            aria-required="true">ยี่ห้อ</label> <span class="error">*</span>
                                        <select class="form-control input-default" name="brandId" id="brandId">
                                            <option value="">เลือกยี่ห้อรถ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label class="form-label required" for="garage"
                                            aria-required="true">รุ่นรถ</label> <span class="error">*</span>
                                        <select class="form-control input-default" name="modelId" id="modelId">
                                            <option value="">เลือกรุ่นรถ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label class="form-label required" for="garage"
                                            aria-required="true">ปีรถยนต์</label> <span class="error">*</span>
                                        <select class="form-control input-default" name="detail" id="detail">
                                            <option value="">เลือกปี</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <label class="form-label required" for="garage"
                                            aria-required="true">เชื้อเพลิง</label> 
                                        <select class="form-control input-default">
                                            <option value="">เลือกเชื้อเพลิง</option>
                                            <option value="1">ดีเซล</option>
                                            <option value="2">เบนซิน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="form-group col-md-4">
                                    <label for="phone">สี</label>
                                    <input type="text" class="form-control" name="color" id="color" placeholder=" สี">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="color">เลขกิโลเมตร</label><!-- <span class="error">*</span> -->
                                    <input type="text" class="form-control" name="mileage" id="mileage"
                                        placeholder="เลขกิโลเมตร" min="0">
                                </div>
                            </div>
                            <!-- <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">รูปหน้ารถ</label>
                                        <div class="image-editor-front">
                                            <input type="file" class="cropit-image-input" name="tempImage1" required=""
                                                aria-required="true" accept="image/*">
                                            <div class="cropit-preview"
                                                style="position: relative; width: 200px; height: 200px;">
                                                <div class="cropit-preview-image-container"
                                                    style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 100%; height: 100%;">
                                                    <img class="cropit-preview-image" alt=""
                                                        style="transform-origin: left top; will-change: transform;">
                                                </div>
                                            </div>
                                            <div class="image-size-label">ปรับขนาด</div>
                                            <input type="range" class="cropit-image-zoom-input" min="0" max="1"
                                                step="0.01">
                                            <input type="hidden" name="picture1" class="hidden-image-front">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">รูปหลังรถ</label>
                                        <div class="image-editor-back">
                                            <input type="file" class="cropit-image-input" name="tempImage2"
                                                aria-required="true" accept="image/*">
                                            <div class="cropit-preview"
                                                style="position: relative; width: 200px; height: 200px;">
                                                <div class="cropit-preview-image-container"
                                                    style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 100%; height: 100%;">
                                                    <img class="cropit-preview-image" alt=""
                                                        style="transform-origin: left top; will-change: transform;">
                                                </div>
                                            </div>
                                            <div class="image-size-label">ปรับขนาด</div>
                                            <input type="range" class="cropit-image-zoom-input" min="0" max="1"
                                                step="0.01">
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
                                            <input type="file" class="cropit-image-input" name="tempImage3"
                                                aria-required="true" accept="image/*">
                                            <div class="cropit-preview"
                                                style="position: relative; width: 600px; height: 300px;">
                                                <div class="cropit-preview-image-container"
                                                    style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 100%; height: 100%;">
                                                    <img class="cropit-preview-image" alt=""
                                                        style="transform-origin: left top; will-change: transform;">
                                                </div>
                                            </div>
                                            <div class="image-size-label">ปรับขนาด</div>
                                            <input type="range" class="cropit-image-zoom-input" min="0" max="1"
                                                step="0.01">
                                            <input type="hidden" name="picture-form" class="hidden-image-form">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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