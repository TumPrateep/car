<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ยี่ห้อรถ</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/tiredata"); ?>">ข้อมูลยาง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row bg-white p-30 search-header">
            <div class="col-md-3">
                <a href="<?=base_url("caraccessory/tiredata/createtiredata") ?>">
                    <button type="button" class="btn btn-info m-b-10 m-l-5" ><i class="fa fa-plus">  เพิ่ม</i></button>
                </a>     
            </div>
            <div class="col-md-2">
                <div class="input-group input-group-default">
                    <select class="form-control" id="tireBrand"></select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group input-group-default">
                    <select class="form-control" id="tireModel"></select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group input-group-default">
                    <select class="form-control" id="tireRim"></select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-default fixe-size">
                    <select class="form-control" id="tireSize"></select>
                    <span class="input-group-btn"><button class="btn btn-primary" id="btn-search"><i class="ti-search"></i></button></span>
                </div>
            </div>
        </div>
        
        <div class="table">
            <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                </thead>	
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->