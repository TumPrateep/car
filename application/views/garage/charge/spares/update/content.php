<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">แก้ไขข้อมูลราคาเปลี่ยนอะไหล่</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูลราคาเปลี่ยนอะไหล่</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>แก้ไขข้อมูลราคาเปลี่ยนอะไหล่</h4>

                </div>
                <div class="card-body">
                    <form id="submit">
                        <input type="hidden" name="spares_changeId" id="spares_changeId" value="<?=$sparesId?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>ยี่ห้อรถ</label> <span class="error">*</span>
                                        <select class="form-control" name="brandId" id="brandId">
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>รายการอะไหล่ช่วงล่าง</label> <span class="error">*</span>
                                        <select class="form-control" name="spares_undercarriageId" id="spares_undercarriageId">
                                            <option value="">เลือกรายการอะไหล่ช่วงล่าง</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>ราคาค่าบริการ (บาท)</label> <span class="error">*</span>
                                        <input type="number" class="form-control" placeholder="ราคาค่าบริการ" name="spares_price" id="spares_price" min=0 >
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