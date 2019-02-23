<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">ราคาเปลี่ยนยาง</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ราคาเปลี่ยนยาง</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <div class="row">
                    <div class="card col-lg-12">
                        <div class="row justify-content-between">
                            <div class="col-lg-2">
                            <a href="<?=base_url("garage/charge/createtire") ?>" class="btn btn-info btn-block"><i class="fa fa-plus"></i>  สร้าง</a>
                            </div>
                            <div class="col-lg-3 offset-lg-5 mt-8">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="rims" placeholder="ขอบยาง">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-info btn-block"  id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
                                        <thead>
                                        <th><i class="fa fa-sort"></i>  ลำดับ</th>
                                        <th><i class="fa fa-toggle-left"></i>  ล้อหน้า</th>
                                        <th><i class="fa fa-toggle-right"></i>  ล้อหลัง</th>
                                        <th><i class="fa fa-circle-o"></i>  ขอบยาง</th>
                                        <th></th>
                                        </thead>	
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>  			
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->