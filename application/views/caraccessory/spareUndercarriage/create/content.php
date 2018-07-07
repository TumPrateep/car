<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">อะไหล่</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Spareundercarries"); ?>">อะไหล่</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <section class="content">
        <div class="container-fluid">     
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header">
                        <div class="card-title">
                            <h4>เพิ่มรายการอะไหล่</h4>
                        </div>
                        <form id="submit">
                            <!-- <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>"> -->
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-group col-md-6">
                                        <label>ชื่อรายการอะไหล่</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อรายการอะไหล่" name="spares_undercarriageName">
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12 card-grid">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                        <a href="<?=base_url("caraccessory/Spareundercarries"); ?>">
                                        <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                        </a>
                                    </div>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- End Container fluid  -->