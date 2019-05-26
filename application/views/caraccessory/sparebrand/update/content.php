<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> แก้ไขข้อมูลยี่ห้ออะไหล่</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/spareundercarries"); ?>">อะไหล่</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/sparebrand/index/$spares_undercarriageId"); ?>">ยี่ห้ออะไหล่</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูลห้ออะไหล่</li>
            </ol>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">     
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header">
                        <div class="card-title">
                            <h4>เพิ่มข้อมูลยี่ห้ออะไหล่</h4>
                        </div>
                        <form id="submit">
                            <div class="card-body">
                                <div class="basic-form">
                                <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
                                <input type="hidden" id="spares_brandId" name="spares_brandId" value="<?=$spares_brandId ?>">
                                    <div class="form-group col-md-6">
                                        <label>ชื่อรายการยี่ห้ออะไหล่</label><span class="error">*</span>
                                        <!-- <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ" name="modelName" > -->
                                        <input type="text" class="form-control" placeholder="ชื่อรายยี่ห้อการอะไหล่" name="spares_brandName" id="spares_brandName">
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                        <a href="<?=base_url("caraccessory/sparebrand/index/$spares_undercarriageId"); ?>">
                                        <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                        </a>
                                    </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>