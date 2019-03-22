<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ข้อมูลน้ำมันเครื่อง</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/Lubricatordata"); ?>">ข้อมูลน้ำมันเครื่อง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- End Container fluid  -->
    
    <!-- <div class="container-fluid">
        <form id="search">
            <div class="card" style="display:none;" id="search-form">
                <div class="card-body text-right">
                    <button type="button" id="search-hide" class="btn btn-dark btn-outline btn-sm m-b-10 m-l-5">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i> 
                        ซ่อน
                    </button>
                </div>
            </form>  
        </div>   -->

            <div class="row">
                <div class="col-lg-12 pt-20 ml-8">
                    <!-- <a href="<?=base_url("caraccessory/LubricatorData/create") ?>">
                        <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                        <i class="fa fa-plus"> สร้าง</i></button>
                    </a> -->

                    <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                        <i class="ti-search"> ค้นหา</i>
                    </button>
                </div>
            </div>
            
        <div class="table">
            <table class="table table-bordered" id="do-table" width="100%" cellspacing="0">
                <thead>
                  <th><i class="fa fa-sort"></i> ลำดับ</th>
                  <th><i class="fa fa-picture-o"></i> รูปยี่ห้อรถ</th>
                  <th><i class="fa fa-rebel"></i>  รายละเอียดสินค้า</th>
                  <th><i class="fa fa-rebel"></i>  จำนวน</th>
                  <th><i class="fa fa-rebel"></i>  ราคา</th>
                  <th><i class="fa fa-rebel"></i>  ร้านอะไหล่</th>
                  <th><i class="fa fa-rebel"></i>  ลูกค้า</th>
                  <th><i class="fa fa-user-circle"></i>  สถานะ</th>
                  <th></th>
                </thead>
            </table>
        </div>
    </div>
</div>
        