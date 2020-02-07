<!--========================================
=            Navigation Section            =
=========================================-->

<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
        <!-- logo -->
        <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url('public/')?>images/logo/notofficiallogo1.png" class="logo" alt="logo" width="80%">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <span class="main">คาร์ใจดี "เรื่องรถ" <span class="click">คลิกเดียวจบ</span></span>
            <ul class="navbar-nav mx-auto"></ul>
            <div>
                <a href="<?=base_url('login')?>" class="btn btn-main-md width-100p bg-orange"><i class="fa fa-sign-in"
                        aria-hidden="true"></i> เข้าสู่ระบบ/ลงทะเบียน</a>
                <div class="dropdown">
                    <button class="btn btn-main-md width-100p bg-orange dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-registered" aria-hidden="true"></i> สมัครเป็นผู้ให้บริการ
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?=base_url('register/garage/')?>"><i class="fa fa-car"
                                aria-hidden="true"></i> ศูนย์บริการคาร์ใจดี</a>
                        <a class="dropdown-item" href="<?=base_url('register/caraccessory/')?>"><i class="fa fa-truck"
                                aria-hidden="true"></i> ร้านค้าส่งคาร์ใจดี</a>
                    </div>
                </div>
            </div>
        </div>
</nav>