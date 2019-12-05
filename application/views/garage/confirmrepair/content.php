<div class="page-wrapper">
            <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ยืนยันการซ่อม</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ยืนยันการซ่อม</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="card col-lg-12">
                <div class="row ">
                    <div class="col-lg-3 offset-lg-1 mt-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="วันที่" id="date">
                            <div class="input-group-append">
                                <span class="input-group-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3  mt-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ผู้จอง" id="reservename">
                            <div class="input-group-append">
                                <span class="input-group-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="สถานะ" id="status">
                            <div class="input-group-append">
                                <span class="input-group-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-info btn-block" id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="changes-table" width="100%" cellspacing="0">
                                <thead>
                                <th>ลำดับ</th>
                                <th>หมายเลขการซ่อม</th>
                                <th>วันที่จอง</th>
                                <th>เวลา</th>
                                <th>ผู้จอง</th>
                                <th>สถานะ</th>
                                <th></th>
                                </thead>	
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>  			
    </div>
    <!-- Pop-up -->
    <div class="modal fade" id="update-mileage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-lg model-Width-sm appove" id="maxWidthSelect" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><b>ยืนยันการซ่อม</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="submit">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="orderId" id="orderId">
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <span><h5><b>ระบุเลขไมล์</b></h5></span><br>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control"  id="mileage_carprofile" name="mileage_carprofile">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-success"> บันทึก</button>
                                    <button type="button" class="btn btn-default" onclick="confirmStatus('+data.orderId+') data-dismiss="modal"> ปิด</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>           <!-- End PAge Content -->
</div>
            <!-- End Container fluid  -->