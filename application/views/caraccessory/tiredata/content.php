<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <span class="text-primary">ยี่ห้อรถ</span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/tiredata"); ?>">ข้อมูลยาง</a></li>
                <li class="breadcrumb-item active">ค้นหา</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row p-30">
            <div class="col-lg-1 text-right"></div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">ชื่อยี่ห้อรถ</label>
                    <select class="form-control input-default">
                        <option value="">ยี่ห้อยาง</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">ชื่อยี่ห้อรถ</label>
                    <select class="form-control input-default">
                        <option value="">ยี่ห้อยาง</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">ชื่อยี่ห้อรถ</label>
                    <select class="form-control input-default">
                        <option value="">ยี่ห้อยาง</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">ชื่อยี่ห้อรถ</label>
                    <select class="form-control input-default">
                        <option value="">ยี่ห้อยาง</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row p30">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="control-label">ช่วงราคา</label>
                    <div class="input-default">
                        <span id="start"></span> <input type="text" id="test"> <span id="end"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label class="control-label">filled or Oreder</label>
                    <select class="form-control input-default">
                        <option value="">ยี่ห้อยาง</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="control-label">จัดเรียง: </label>
                    <select class="form-control input-default" name="column" id="column">
                        <option value="1" selected>เรียงลำดับจาก ก-ฮ</option>
                        <option value="2">เรียงลำดับจาก ฮ-ก</option>
                        <option value="3">เรียงลำดับจาก สถานะ</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="button" class="btn-create btn btn-gray btn-md m-b-10 m-l-5">
                    <i class="ti-search"> ค้นหา</i>
                </button>
                <a href="<?=base_url("caraccessory/tiredata/createtiredata") ?>">
                    <button type="button" class="btn-create btn btn-success btn-md m-b-10 m-l-5">
                    <i class="fa fa-plus"> สร้าง</i></button>
                </a>
            </div>
        </div>  
        
        <div class="table">
            <table class="table table-bordered" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <th></th>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-header-height">
                                        <span class="card-subtitle text-right card-margin ">
                                            <i class="fa fa-circle lamp"></i> เปิดใช้งาน
                                        </span>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <img class="card-img-top" src="http://localhost/car/public/image/tire/tire.jpg" alt="Card image cap">
                                                </div>
                                                <div class="col-lg-5 text-left">
                                                    <h3>รุ่นยาง/ยี่ห้อยาง ขนาดยาง</h3>
                                                    ยี่ห้อยาง: aaaaaaaaaaa</br>
                                                    รุ่นยาง: aaaaaaaaaaa</br>
                                                    ขอบยาง: aaaaaaaaaaa</br>
                                                    ขนาดยาง: aaaaaaaaaaa
                                                </div>
                                                <div class="col-lg-4 text-left">
                                                    <h2>xxx,xxx บาทต่อเส้น</h2>
                                                    <h4>รับประกัน</h4>
                                                    <h4>Mail Order/Fitted</h4>
                                                    <a href="#"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>
                                                    <a href="#"><button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-trash"></i> ลบ</button> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="card-body text-center card-bottom"></div> -->
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