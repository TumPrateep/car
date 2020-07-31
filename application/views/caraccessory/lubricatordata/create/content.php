<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เพิ่มข้อมูลน้ำมันเครื่อง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/lubricatordata"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูลน้ำมันเครื่อง</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">   
        <form id="create-lubricatordata">
        <div class="container-fluid">   
            <div class="row">
                <div class="col-12">
                    <div class="card card-header-blue">
                            <div class="form-body"> <br>
                                <div class="row p-t-20">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="control-label">ชนิดของเหลว</label><span class="error">*</span>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" name="lubricator_gear" id="lubricator_gear">
                                                    <option value="1">น้ำมันเครื่อง</option>
                                                    <option value="2">น้ำมันเกียร์ธรรมดา</option>
                                                    <option value="3">น้ำมันเกียร์ออโต</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md" id="box-lubricator_typeId">
                                        <div class="form-group">
                                            <label class="control-label">ชนิดน้ำมันเครื่อง</label><span class="error">*</span>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" name="lubricator_typeId" id="lubricator_typeId" data-placeholder="ชนิดน้ำมันเครื่อง">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="control-label">ยี่ห้อน้ำมันเครื่อง</label><span class="error">*</span> <label id="lubricator_brandId-error" class="error" for="lubricator_brandId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" id="lubricator_brandId" name="lubricator_brandId" data-placeholder="เลือกยี่ห้อน้ำมันเครื่อง" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="control-label">รุ่นน้ำมันเครื่อง</label><span class="error">*</span> <label id="lubricatorId-error" class="error" for="lubricatorId"></label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control form-control-chosen-required" id="lubricatorId" name="lubricatorId"  data-placeholder="เลือกรุ่นน้ำมันเครื่อง">
                                                </select>
                                            </div>
                                        </div>
                                    </div>     
                                </div>       
                                
                                <div class="row p-t-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">ราคา</label><span class="error">*</span> <label id="price-error" class="error" for="price"></label>
                                            <div class="input-group input-group-default">
                                                <input type="number" class="form-control" id="price" name="price" placeholder="ราคา"  min=0>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">การรับประกัน-ปี</label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control" id="warranty_year" name="warranty_year">
                                                    <option value="">เลือกการรับประกัน-ปี</option>
                                                    <option value="1">1 ปี</option>
                                                    <option value="2">2 ปี</option>
                                                    <option value="3">3 ปี</option>
                                                    <option value="4">4 ปี</option>
                                                    <option value="5">5 ปี</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">เงื่อนไข</label>
                                            <div class="input-group input-group-default">
                                                <select class="form-control" name="warranty" id="warranty">
                                                    <option value="">เลือกเงื่อนไข</option>
                                                    <option value="1">และ</option>
                                                    <option value="2">หรือ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">การรับประกัน-ระยะทาง</label>
                                            <div class="input-group input-group-default">
                                                <input type="number" class="form-control" id="warranty_distance" name="warranty_distance" placeholder="ระยะทาง (กิโลเมตร)" min=0>
                                            </div>
                                        </div>
                                    </div>
                                </div>              
                            </div>
                            
                            <div class="row p-t-20">
                                <div class="col-md-12 card-grid">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                    <a href="<?=base_url("caraccessory/lubricatordata/"); ?>">
                                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                    </a>
                                </div>
                            </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- End Container fluid -->