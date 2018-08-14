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

        <div class="table mt-20">
            <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card card-header-height">

                                        <div class="card-body">
                                            <!-- <div class="icon-left"> -->
                                                <!-- <img class="card-img-top" src="http://localhost/car/public/image/tire_brand/1991f5f7d21e5f4a613089261a791b41.JPG"> -->
                                                <img class="card-img-top" src="http://localhost/car/public/image/tire/tire.jpg">
                                            <!-- </div>
                                            <div class="icon-right">
                                                <img class="card-img-top" src="http://localhost/car/public/image/icon/Wet-Grip-Tyre-Label.png">
                                                <img class="card-img-top" src="http://localhost/car/public/image/icon/External-noise-Tyre-Label.png">
                                                <img class="card-img-top" src="http://localhost/car/public/image/icon/Fuel-efficiency-Tyre-Label.png">
                                            </div> -->
                                        </div>

                                        <div class="card-body">
                                            <div class="text-center">
                                                <h3>ยี่ห้อน้ำมันเครื่อง/รุ่นน้ำมันเครื่อง</h3>
                                            </div>
                                            <div class="text-center">
                                                <span>รับประกัน 2 ปี</span>
                                                <span>หรือ</span>
                                                <span>รับประกัน 1000 กม.</span>
                                            </div>
                                            <div class="text-center">
                                                <h2>xxx,xxx บาท</h2>
                                            </div>
                                            <div>
                                                <a href="#"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>
                                                <a href="#"><button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-trash"></i> ลบ</button> </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- End Container fluid  -->