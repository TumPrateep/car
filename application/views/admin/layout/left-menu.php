<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html"><i class="fa fa-codiepie"></i> CarJaidee</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav bg-green " id="exampleAccordion" >
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link text-white" href="<?=base_url("admin/car") ?>">
            <i class="fa fa-fw fa-car"></i>
            <span class="nav-link-text">การจัดการยี่ห้อ/รุ่นรถ</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link text-white" href="<?=base_url("admin/usermanagement") ?>">
            <i class="fa fa-user-plus"></i>
            <span class="nav-link-text">การจัดการผู้ใช้งาน</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">เมนูอะไหล่</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a class="nav-link text-white" href="<?=base_url("admin/sparepartcar") ?>">
                <i class="fa fa-cog"></i>
                <span class="nav-link-text">อะไหล่ช่วงล่าง</span>
              </a>
            </li>

            <li>
              <a class="text-white" href=""><i class="fa fa-tint"></i> น้ำมันเครื่อง</a>
            </li>

            <li>
              <a class="nav-link-collapse text-white collapsed" data-toggle="collapse" href="#collapseMulti2">
              <i class="fa fa-life-ring"></i> ยางรถ</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a class="nav-link text-white" href="<?=base_url("admin/tires") ?>">
                    <i class="fa fa-circle-o"></i>
                    <span class="nav-link-text">ขอบยางรถยนต์</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link text-white" href="<?=base_url("admin/tires/tiresbrand/") ?>">
                    <i class="fa fa-futbol-o"></i>
                    <span class="nav-link-text">ยี่ห้อยางรถยนต์</span>
                  </a>
                </li>
              </ul>
            </li>
            
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>