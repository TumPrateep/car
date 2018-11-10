<div class="page-wrapper">

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
        <div class="col-lg-12">
            <div class="card">
                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group" >                    
                        <a href="<?=base_url("garage/mechanic/create") ?>" class="btn btn-success" role="button" aria-pressed="true">เพิ่ม</a>    
                    </div>
                    <div class="input-group" id="table-Tsearch">
                        <input type="text" class="form-control" placeholder="ชื่อ - ช่าง" id="namemechanic" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                        <div class="input-group-prepend">
                        <div class="input-group-text btn btn-danger" id="btnGroupAddon2"><i class="fa fa-wrench" aria-hidden="true"></i></div>
                        </div> 
                        <input type="text" class="form-control" placeholder="ความชำนาญ" id="skillmechanic" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                        <div class="input-group-prepend">
                        <div class="input-group-text btn btn-danger" id="btnGroupAddon2" ><i class="fa fa-star" aria-hidden="true"></i></div>
                        <button type="button" class="btn btn-success" id="search"> ค้นหา </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <table class="table table-bordered" id="Mechanic-table">
                    <thead>
                        <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">ความชำนาญ</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                        <th scope="col">บทบาท</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>        
    </div>