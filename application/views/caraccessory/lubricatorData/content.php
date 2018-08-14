<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ข้อมูลน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/lubricatordata"); ?>">ข้อมูลน้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12 pt-20 ml-8">
                <a href="<?=base_url("caraccessory/lubricatordata/create") ?>">
                    <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                    <i class="fa fa-plus"> สร้าง</i></button>
                </a>

                <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                    <i class="ti-search"> ค้นหา</i>
                </button>
            </div>
        </div>
        
    </div>
    <!-- End Container fluid  -->