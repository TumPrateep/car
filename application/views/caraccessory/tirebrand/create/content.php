<!--Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary"> เพิ่มยี่ห้อยาง</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/TireBrand"); ?>">ยี่ห้อยาง</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
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
                                            <input type="text" id="firstName" class="form-control" placeholder="ชื่อยี่ห้อยาง" id="tire_brandName" name ="tire_brandName">
                                         </div>
                                        </div>       
                                    </div>
                                       
                                    <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อยาง</label>
                                            <input name="tire_brandPicture" type="file" multiple />
                                         </div>
                                        </div>       
                                    </div>
                                </div>       

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<!-- End Container fluid >>