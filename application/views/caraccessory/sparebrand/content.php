<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ยี่ห้ออะไหล่</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/spareundercarries"); ?>">อะไหล่</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/sparebrand/index/$spares_undercarriageId"); ?>">ยี่ห้ออะไหล่</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
    <input type="hidden" id="spares_undercarriageId" name="spares_undercarriageId" value="<?=$spares_undercarriageId ?>">
        
        <div class="row p-30">
            <div class="col-lg-4 div-right">
                <a href="<?=base_url("caraccessory/sparebrand/createSpareBrand/$spares_undercarriageId") ?>">
                    <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                    <i class="fa fa-plus"> สร้าง</i></button>
                </a>
            </div>
            <div class="col-lg-4">
                <div class="input-group input-group-flat">
                    <label class="col-lg-3 col-form-label">ยี่ห้อ: </label>
                    <input type="text" class="form-control input-default" id="spares_search" placeholder="ค้นหา...">
                    <span class="input-group-btn"><button class="btn btn-success" type="button" id="btn-search"><i class="ti-search"></i></button></span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group input-group-flat">
                    <label class="col-lg-3 col-form-label">จัดเรียง: </label>
                    <select class="form-control input-default" name="column" id="column">
                        <option value="1" selected>เรียงลำดับจาก ก-ฮ</option>
                        <option value="2">เรียงลำดับจาก ฮ-ก</option>
                        <option value="3">เรียงลำดับจาก สถานะ</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="table">
            <table class="table table-bordered" id="model-table" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                </thead>	
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->