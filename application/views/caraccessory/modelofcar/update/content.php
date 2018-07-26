<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> แก้ข้อมูลชื่อของรุ่นรถ</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/CarModelAccessory/index1/$modelId"); ?>">รุ่นรถ</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Modelofcar/index/$brandId/$modelId"); ?>">ชื่อรุ่นรถ</a></li>
                <li class="breadcrumb-item active">แก้ไขข้อมูลชื่อของรุ่นรถ</li>
            </ol>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">     
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header">
                        <div class="card-title">
                            <h4>แก้ไขข้อมูลชื่อของรุ่นรถ</h4>
                        </div>
                        <form id="submit">
                            <div class="card-body">
                                <div class="basic-form">
                                <input type="hidden" id="modelofcarId" name="modelofcarId" value="<?=$modelofcarId ?>">
                                <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                                <input type="hidden" id="modelId" name="modelId" value="<?=$modelId ?>">
                                    <div class="form-group col-md-6">
                                        <label>ชื่อของรุ่นรถ</label><span class="error">*</span>
                                        <input type="text" class="form-control" placeholder="ชื่อของรุ่นรถ" name="modelofcarName" id="modelofcarName">
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-12 card-grid">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                        <a href="<?=base_url("caraccessory/Modelofcar/index/$brandId/$modelId"); ?>">
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