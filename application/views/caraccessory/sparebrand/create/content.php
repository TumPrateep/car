<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มข้อมูลยี่ห้ออะไหล่</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Spareundercarries"); ?>">อะไหล่</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/SpareBrand/index/$spares_undercarriageId"); ?>">ยี่ห้ออะไหล่</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูลห้ออะไหล่</li>
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
                                    <div class="form-group col-md-6">
                                        <label>ชื่อรายการยี่ห้ออะไหล่</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อรายยี่ห้อการอะไหล่" name="spares_brandName">
                                    </div>
                                </div>
                                    <div class="form-group">
                                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                          <a> <button type="button" class="btn btn-inverse">ยกเลิก</button> </a>
                                    </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>