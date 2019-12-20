<style>
ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
}
</style>
<section class="section pricing">
    <div class="container">
        <div class="row" id="">
            <div class="col-md-12">
                <div class="section-title">
                    <h3>ค้นหา<span class="alternate">ข้อมูลรถยนต์</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="<?=base_url('/user/carprofile/create')?>" class="btn btn-main-md width-100p bg-orange"><i
                        class="fa fa-plus"></i> เพิ่ม</a>
            </div>
            <div class="col-md-4 form-group">
                <input type="text" class="form-control main-md btn-ga" placeholder="ป้ายทะเบียน" id="" name="">
            </div>
            <div class="col-md-4 form-group">
                <select class="form-control main-md" name="" id="">
                    <option value="">จังหวัด</option>

                </select>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-main-md width-100p bg-orange"><i class="fa fa-search"></i> ค้นหา</a>
            </div>
        </div>


        <div>
            <table id="order-table" width="100%">



            </table>
        </div>



        <!--<div class="row">
        <div class="col-md-4" style="">
            <div class="card" id="order-table" width="100%">
            <a href="#"><img class="card-img-top" src="https://img.kaidee.com/prd/20191109/351549517/b/7a608e50-df29-4dba-95eb-b732a4370e79.jpg" width="100%" alt=""></a>
                <div class="card-body">
                    <div>
                        <p> <strong>ยี่ห้อ :</strong>  Benz E250 CDI Coupe</p> <p><strong>เลขทะเบียน :</strong> 2ษฎ-250 กรุงเทพมหานคร</p>
                    </div>
                    <div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-pencil"></i>
                                <a href="#" class="text-warning font-weight-bold">แก้ไข</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-list-alt"></i>
                                <a href="#" class="text-warning font-weight-bold">ประวัติการซ่อม</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-trash-o"></i>
                                <a href="#" class="text-warning font-weight-bold">ลบ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md-4" style="">
            <div class="card">
            <img class="card-img-top" src="https://img.kaidee.com/prd/20191023/351179519/b/702194e3-33b2-462c-b25b-dbace4490a41.jpg" width="100%" alt="">
            <div class="card-body">
                <div>
                    <p> <strong>ยี่ห้อ :</strong>  TOYOTA Fortuner 2012</p> <p><strong>เลขทะเบียน :</strong> 2กฎ-1883 กรุงเทพมหานคร</p>
                </div>
                <div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-pencil"></i>
                            <a href="#" class="text-warning font-weight-bold">แก้ไข</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-list-alt"></i>
                            <a href="#" class="text-warning font-weight-bold">ประวัติการซ่อม</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-trash-o"></i>
                            <a href="#" class="text-warning font-weight-bold">ลบ</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4" style="">
        <div class="card">
            <img class="card-img-top" src="https://img.kaidee.com/prd/20191026/351242752/b/e0bcdaae-ddea-47a4-a258-957df37ad775.jpg" width="100%" alt="">
            <div class="card-body">
                <div>
                    <p> <strong>ยี่ห้อ :</strong>  TOYOTA Vios 2012</p> <p><strong>เลขทะเบียน :</strong> ฉฏ-2563 กรุงเทพมหานคร</p>
                </div>
                <div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-pencil"></i>
                            <a href="#" class="text-warning font-weight-bold">แก้ไข</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-list-alt"></i>
                            <a href="#" class="text-warning font-weight-bold">ประวัติการซ่อม</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-trash-o"></i>
                            <a href="#" class="text-warning font-weight-bold">ลบ</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" style="">
            <div class="card">
                <img class="card-img-top" src="https://img.kaidee.com/prd/20191026/351250893/b/9422bc52-fe84-4276-a623-b05a08a42412.jpg" width="100%" alt="">
                <div class="card-body">
                    <div>
                        <p> <strong>ยี่ห้อ :</strong>  Chevrolet sonic 1.4 LTZ</p> <p><strong>เลขทะเบียน :</strong> ขข-9854 ภูเก็ต</p>
                    </div>
                    <div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-pencil"></i>
                                <a href="#" class="text-warning font-weight-bold">แก้ไข</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-list-alt"></i>
                                <a href="#" class="text-warning font-weight-bold">ประวัติการซ่อม</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-trash-o"></i>
                                <a href="#" class="text-warning font-weight-bold">ลบ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="">
            <div class="card">
            <img class="card-img-top" src="https://img.kaidee.com/prd/20191109/351549517/b/7a608e50-df29-4dba-95eb-b732a4370e79.jpg" width="100%" alt="">
            <div class="card-body">
                <div>
                    <p> <strong>ยี่ห้อ :</strong>  Benz E250 CDI Coupe</p> <p><strong>เลขทะเบียน :</strong> ศฉ-5521 กรุงเทพมหานคร</p>
                </div>
                <div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-pencil"></i>
                            <a href="#" class="text-warning font-weight-bold">แก้ไข</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-list-alt"></i>
                            <a href="#" class="text-warning font-weight-bold">ประวัติการซ่อม</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-trash-o"></i>
                            <a href="#" class="text-warning font-weight-bold">ลบ</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </div> -->

    </div>
    </div>

</section>