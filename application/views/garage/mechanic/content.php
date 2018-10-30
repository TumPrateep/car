<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ข้อมูลช่าง</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ข้อมูลช่าง</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="breadcrumbs animated">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                            <div class="page-header float-left">
                                    <div class="page-title">
                                    <ol class="breadcrumb text-left">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="<?= base_url("garage/Member/create"); ?>"><button type="button" class="btn btn-secondary" ><font color=" #ffffff">+ เพิ่ม</font>  </button></a>
                                        </div>
                                    </ol>
                                </div>
                            </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                        <div class="input-group">
                                                <input type="text" class="form-control" placeholder="ชื่อ-ช่าง" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon2"><i class="fa fa-wrench" aria-hidden="true"></i></div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="ความชำนาญ" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon2"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-secondary"> ค้นหา </button>
                                            </div>
                                        </div>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">ความชำนาญ</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>เปลี่ยนล้อ</td>
                                    <td>083-xxxxxxx</td>
                                    <td><a href="#"><button><i class="menu-icon fa fa-eye" aria-hidden="true"></i></button> </a>&nbsp<a href="#"><button><i class="menu-icon fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>&nbsp<a href="#"><button><i class="menu-icon fa fa-trash-o" aria-hidden="true"></i></button> </a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>เปลี่ยนน้ำมันเครื่อง</td>
                                    <td>083-xxxxxxx</td>
                                    <td><a href="#"><button><i class="menu-icon fa fa-eye" aria-hidden="true"></i></button> </a>&nbsp<a href="#"><button><i class="menu-icon fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>&nbsp<a href="#"><button><i class="menu-icon fa fa-trash-o" aria-hidden="true"></i></button> </a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                        <td>Jo</td>
                                        <td>เปลี่ยนโช้คอัพ</td>
                                        <td>083-xxxxxxx</td>
                                        <td><a href="#"><button><i class="menu-icon fa fa-eye" aria-hidden="true"></i></button> </a>&nbsp<a href="#"><button><i class="menu-icon fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>&nbsp<a href="#"><button><i class="menu-icon fa fa-trash-o" aria-hidden="true"></i></button> </a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Dom</td>
                                        <td>เปลี่ยนเครื่องยนต์</td>
                                        <td>083-xxxxxxx</td>
                                        <td><a href="#"><button><i class="menu-icon fa fa-eye" aria-hidden="true"></i></button> </a>&nbsp<a href="#"><button><i class="menu-icon fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>&nbsp<a href="#"><button><i class="menu-icon fa fa-trash-o" aria-hidden="true"></i></button> </a></td>
                                    </tr>
                                </tbody>
                                </table>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div>