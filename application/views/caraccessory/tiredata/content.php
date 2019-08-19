<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <span class="text-primary">ข้อมูลยาง</span>
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
        <div class="row">
            <div class="col-lg-2 pt-20 ml-8">
                <a href="<?=base_url("caraccessory/tiredata/createtiredata") ?>">
                    <button type="button" class="btn btn-success btn-lg btn-block m-b-10 m-l-5">
                    <i class="fa fa-plus"> สร้าง</i></button>
                </a>
            </div>
        </div>
        <br>
        <div class="table">
            <table class="table table-striped" id="brand-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ยี่ห้อยาง</th>
                        <th>รุ่นยาง</th>
                        <th>ขนาดยาง</th>
                        <th>ราคา</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- End Container fluid  -->