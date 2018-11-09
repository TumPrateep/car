<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ออกรายงาน</h3>  
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("#"); ?>">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ออกรายงาน</li>
            </ol>
        </div>
    </div> 
    
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-0" >  
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                รูปแบบการออกรายงาน
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">รายสัปดาห์</a>
                                <a class="dropdown-item" href="#">รายเดือน</a>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary">เเสดงตัวอย่าง</button>
                    </div>
                    <div class="col-md-0">
                    <button type="button" class="btn btn-outline-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXCEL</button>
                    </div>
                    <div class="col-md-1">
                    <button type="button" class="btn btn-outline-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</button>
                    </div>
                    <div class="row">
                    <!-- Line Chart -->
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Line chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="card">
        
                
            </div>
        </div>   
    </div>
    