<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ข้อมูลช่างเพิ่มเติม</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                <li class="breadcrumb-item active">ข้อมูลช่างเพิ่มเติม</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-white m-l-0 m-r-0 box-shadow ">
            <div class="col-lg-10">
                <div class="card card  bg-secondary">
                <div class="card">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <form id="submit">
                            <input type="hidden" id="mechanicId" name="mechanicId" value="<?=$mechanicId ?>">
                                <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="first_name"><h5>ชื่อ:</h5></label>
                                            <output type="text"  name="firstName" id="firstName">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="last_name"><h5>นามสกุล:</h5></label>
                                            <output type="text"  name="lastName" id="lastName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="phone"><h5>เลขบัตรประชาชน:</h5></label>
                                            <output type="text"  name="personalid" id="personalid" >
                                        </div>
                                    </div>
                                <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="phone"><h5>เบอร์โทรศัพท์:</h5></label>
                                            <output type="text"  name="phone" id="phone" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mobile"><h5>ความชำนาญ:</h5></label>
                                            <output type="text" name="skill" id="skill">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone"><h5>ประสบการณ์(ปี):</h5></label>
                                            <output type="text" name="exp" id="exp" > 
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="row">
                                    <div class="col-lg text-left">
                                        <a class="btn btn-primary create" href="<?=base_url("garage/mechanic/") ?>">
                                             กลับ
                                        </a>
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
