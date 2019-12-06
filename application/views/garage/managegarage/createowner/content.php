<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">สร้างข้อมูลช่าง</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                <li class="breadcrumb-item active">สร้างข้อมูลช่าง</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>สร้างข้อมูลช่าง</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="submit">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="first_name">ชื่อ</label><span class="error">*</span>
                                            <input type="text" class="form-control" name="firstname" id="firstName" placeholder="ชื่อ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="last_name">นามสกุล</label><span class="error">*</span>
                                            <input type="text" class="form-control" name="lastname" id="lastName" placeholder="นามสกุล" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="last_name">ชื่อเล่น</label>
                                            <input type="text" class="form-control" name="nickName" id="nickName" placeholder="ชื่อเล่น" >
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์</label><span class="error">*</span>
                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" min=0 >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone">เลขบัตรประชาชน</label><span class="error">*</span>
                                            <input type="number" class="form-control" name="personalid" id="personalid" placeholder="เลขบัตรประชาชน" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone">ประสบการณ์(ปี)</label><span class="error">*</span>
                                            <input type="number" class="form-control" name="exp" id="exp" placeholder=" ปี" min=0 >
                                        </div>
                                    </div>
                                </div>
                                <span>ตำแหน่งช่าง</span>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <label class="form-check-label" >
                                            <input class="form-check-input" name="job1" id="job1" value="1" type="checkbox">ช่างเครื่อง</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <label class="form-check-label" >
                                            <input class="form-check-input" name="job2" id="job2" value="2" type="checkbox">ช่างช่วงล่าง</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <label class="form-check-label" >
                                            <input class="form-check-input" name="job3" id="job3" value="3" type="checkbox">ช่างยางรถยนต์</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="control-label">รูปช่าง</label>
                                            <div class="image-editor">
                                                <input type="file" class="cropit-image-input" name="tempImage" required>
                                                <div class="cropit-preview"></div>
                                                <div class="image-size-label">ปรับขนาด</div>
                                                <input type="range" class="cropit-image-zoom-input">
                                                <input type="hidden" name="picture" class="hidden-image-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="row">
                                    <div class="col-lg-4"> 
                                        <button type="submit" class="btn btn-info m-b-10 m-l-5">บันทึก</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>