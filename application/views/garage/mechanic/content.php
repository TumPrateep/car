<div class="page-wrapper bg-container">

        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">ข้อมูลช่าง</h3> 
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card col-lg-12">
                    <div class="row justify-content-between">
                        <div class="col-lg-2">
                            <a  href="<?=base_url("garage/mechanic/create") ?>"><button type="button" class="btn btn-info btn-block" ><i class="fa fa-plus"></i>  เพิ่มข้อมูลช่าง</button></a>  
                        </div>
                        
                        <div class="col-lg-3 offset-lg-2 mt-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="ชื่อ - ช่าง" id="namemechanic">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 mt-8">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="ความเชี่ยวชาญด้านรถ" id="skillmechanic">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-star" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-info btn-block" id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-nobordered no-head" id="Mechanic-table">
                                    <thead>
                                        <tr><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card-two">
                                                                    <header>
                                                                        <div class="avatar">
                                                                            <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Allison Walker">
                                                                        </div>
                                                                    </header>

                                                                    <h3>Allison Walker</h3>
                                                                    <div class="desc">
                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                                                                    </div>
                                                                    <div class="contacts">
                                                                        <a href=""><i class="fa fa-plus"></i></a>
                                                                        <a href=""><i class="fa fa-whatsapp"></i></a>
                                                                        <a href=""><i class="fa fa-envelope"></i></a>
                                                                        <div class="clear"></div>
                                                                    </div>
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
                    </div>
                </div>
            </div>
        <div>       
    </div>

    