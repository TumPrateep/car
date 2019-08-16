<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <span class="text-primary">ข้อมูลอะไหล่ช่วงล่าง</span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/spareundercarriesdata"); ?>">ข้อมูลอะไหล่ช่วงล่าง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container">

        <div class="card">
            <div class="row">
                <div class="col-lg-12 ml-8">
                    <a href="<?=base_url("caraccessory/spareundercarriesdata/createspareundercarriesdata") ?>">
                        <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                        <i class="fa fa-plus"> สร้าง</i></button>
                    </a>

                    <!-- <button class="btn-create btn btn-gray btn-md m-b-10 m-l-5" id="show-search">
                        <i class="ti-search"> ค้นหา</i>
                    </button> -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="spareUndercarries-table" width="100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ประเภทอะไหล่</th>
                                <th>ยี่ห้ออะไหล่</th>
                                <th>ข้อมูลรถยนต์</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Container fluid  -->