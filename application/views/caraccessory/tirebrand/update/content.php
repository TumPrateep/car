Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เเก้ไขยี่ห้อยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireBrand"); ?>">ยี่ห้อยาง</a></li>
                <li class="breadcrumb-item active">เเก้ไขข้อมูล</li>
            </ol>
        </div>
    </div>

    <form id="submit">

    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">

                    <div class="card-title"></div>
                    <div class="card-body">
                        <!-- <form action="#"> -->
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อยาง</label>
                                            <input type="text" id="firstName" class="form-control" placeholder="ชื่อยี่ห้อยาง">
                                         </div>
                                        </div>       
                                    </div>
                                       
                                    <h3 class="box-title m-t-40">รูปภาพ</h3>
                                    <hr>
                                    
                                    <form class="dropzone">
                                        <div class="fallback"><input name="file" type="file" multiple /></div>
                                    </form>  
                                    <h6 class="card-subtitle">เพิ่ม <code>รูปภาพ</code> ที่นี้</h6>
                                           
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button>
                                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<!-- End Container fluid 