<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ยี่ห้อรถ</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row bg-white p-30 search-header">
            <div class="col-md-6">
                 <button type="button" class="btn btn-info m-b-10 m-l-5"><i class="fa fa-plus">  สร้าง</i></button>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-default">
                    <input type="text" placeholder="ค้นหา" name="Search" class="form-control">
                    <span class="input-group-btn"><button class="btn btn-primary" type="submit"><i class="ti-search"></i></button></span>
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