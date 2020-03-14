
<!--========================================
=            Navigation Section            =
=========================================-->

<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand" href="<?=base_url()?>">
        <img src="<?=base_url('public/')?>images/logo/notofficiallogo1.png" class="logo" alt="logo" width="80%">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("user/order")?>">รายการสั่งซื้อ <span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("user/servicehistory")?>">ประวัติการซ่อม <span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url("user/carprofile")?>">ข้อมูลรถ</a>
        </li>
        <li class="nav-item menu <?=$tire?>">
            <a class="nav-link" href="<?=base_url("search/tire")?>">ยางรถยนต์</a>
        </li>
        <li class="nav-item menu <?=$garage?>">
            <a class="nav-link" href="<?=base_url("search/garage")?>">ค้นหาศูนย์บริการ</a>
        </li>
        <li class="nav-item menu">
            <a class="nav-link" href="<?=base_url("user/news")?>">ข่าวสาร/โปรโมชั่น</a>
        </li>
        <li class="nav-item menu">
            <a class="nav-link" href="<?=base_url("user/about-us")?>">เกี่ยวกับเรา</a>
        </li>
      </ul>
      <div>
        <div class="dropdown">
            <button class="btn btn-main-md width-100p bg-orange dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i> สวัสดีคุณ <?=$name?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> ข้อมูลผู้ใช้งาน</a>
              <a class="dropdown-item" href="#" onclick="logout()"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
            </div>
          </div>
      </div>
  </div>
</nav>