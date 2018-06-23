Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">เเก้ไขยี่ห้อรถ</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item active">เเก้ไข</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->

    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-header-blue">

                    <div class="card-title"></div>
                    <div class="card-body">
                        <form id="submit">
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อรถ</label>
                                            <input type="text" id="brandName" class="form-control" name="brandName" placeholder="ชื่อยี่ห้อรถ">
                                         </div>
                                        </div>       
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อรถ</label>
                                            <input name="brandPicture" type="file" multiple />
                                         </div>
                                        </div>       
                                    </div>
                                </div>       

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                                    <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <!-- End Container fluid 