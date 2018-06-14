<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">รายการอะไหล่</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Spareundercarries"); ?>">รายการอะไหล่</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->

    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-success">

                    <div class="card-header">
                        <h4 class="m-b-0 text-white">เพิ่มรายการอะไหล่</h4>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="form-body">
                                <h3 class="card-title m-t-15">รายละเอียด</h3>
                                <hr>
                                <form id="createsparesBrand">
                                    <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">ชื่ออะไหล่</label>
                                                    <input type="text" class="form-control" placeholder="ชื่อรายการอะไหล่" name="spares_undercarriageName">
                                                    <!-- <input type="text" id="firstName" class="form-control" placeholder="ชื่ออะไหล่"> -->
                                                </div>       
                                            </div>
                                    </form> 
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>บันทึก</button>
                                    <button type="button" class="btn btn-inverse">ยกเลิก</button>
                                </div>
                            </div>
                        </form>   
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <!-- End Container fluid  -->