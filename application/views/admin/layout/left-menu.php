<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
        <a class="navbar-brand" href="<?=base_url("admin");?>"><i class="fa fa-codiepie"></i> CarJaidee</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav bg-green " id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#datasetting" data-parent="#exampleAccordion">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span class="nav-link-text">ตั้งค่า </span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="datasetting">
                        <li class="<?=activate_menu('geartype');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/geartype")?>">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span class="nav-link-text">ประเภทเกียร์</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('machine');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/machine")?>">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                <span class="nav-link-text">ประเภทเครื่องยนต์</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse" href="#user"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">ผู้ใช้งาน</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="user">
                        <li class="<?=activate_menu('garagesmanagement');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/garagesmanagement")?>">
                                <i class="fa fa-id-card"></i>
                                <span class="nav-link-text">ศูนย์บริการคาร์ใจดี</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('managepartsshop');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/managepartsshop")?>">
                                <i class="fa fa-vcard-o"></i>
                                <span class="nav-link-text">ร้านค้าส่งคาร์ใจดี</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('usermanagement');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/usermanagement")?>">
                                <i class="fa fa-user-plus"></i>
                                <span class="nav-link-text">ผู้ใช้งาน</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?=activate_menu('car');?>" data-toggle="tooltip" data-placement="right"
                    title="Dashboard">
                    <a class="nav-link text-white" href="<?=base_url("admin/car")?>">
                        <i class="fa fa-fw fa-car"></i>
                        <span class="nav-link-text">การจัดการยี่ห้อ/รุ่นรถ</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#collapseComponents1" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">เมนูอะไหล่</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents1">
                        <li>
                            <a class="nav-link-collapse text-white collapsed" data-toggle="collapse"
                                href="#collapseMulti3">
                                <i class="fa fa-tint"></i> อะไหล่ช่วงล่าง</a>
                            <ul class="sidenav-third-level collapse" id="collapseMulti3">
                                <li class="<?=activate_menu('sparepartcar');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/sparepartcar")?>">
                                        <i class="fa fa-tachometer"></i>
                                        <span class="nav-link-text">รายการอะไหล่ช่วงล่าง</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('sparepartcar/sparepart/');?>">
                                    <a class="nav-link text-white"
                                        href="<?=base_url("admin/sparepartcar/sparepart/")?>">
                                        <i class="fa fa-safari"></i>
                                        <span class="nav-link-text">ยี่ห้ออะไหล่ช่วงล่าง</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('sparespicture');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/sparespicture/")?>">
                                        <i class="fa fa-picture-o"></i>
                                        <span class="nav-link-text">รูปภาพอะไหล่สินค้า</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="nav-link-collapse text-white collapsed" data-toggle="collapse"
                                href="#collapseMulti2">
                                <i class="fa fa-tint"></i> น้ำมันเครื่อง</a>
                            <ul class="sidenav-third-level collapse" id="collapseMulti2">
                                <li class="<?=activate_menu('lubricatortype');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/lubricatortype")?>">
                                        <i class="fa fa-tachometer"></i>
                                        <span class="nav-link-text">ประเภทน้ำมันเครื่อง</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('apilubricator');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/apilubricator")?>">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span class="nav-link-text">Api น้ำมันเครื่อง</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('lubricatorcapacity');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/lubricatorcapacity")?>">
                                        <i class="fa fa-tint" aria-hidden="true"></i>
                                        <span class="nav-link-text">ความจุน้ำมันเครื่อง</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('lubricatornumber');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/lubricatornumber")?>">
                                        <i class="fa fa-safari"></i>
                                        <span class="nav-link-text">เบอร์น้ำมันเครื่อง</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('lubricator');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/lubricator")?>">
                                        <i class="fa fa-rebel"></i>
                                        <span class="nav-link-text">ยี่ห้อน้ำมันเครื่อง</span>
                                    </a>
                                </li>
                                <!-- <li class="<?=activate_menu('lubricatortypeformachine');?>">
                  <a class="nav-link text-white" href="<?=base_url("admin/lubricatortypeformachine")?>">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-link-text">ประเภทน้ำมันเครื่องตามเครื่องยนต์</span>
                  </a>
                </li> -->
                            </ul>
                        </li>

                        <li>
                            <a class="nav-link-collapse text-white collapsed" data-toggle="collapse"
                                href="#collapseMultiTire">
                                <i class="fa fa-life-ring"></i> ยางรถ</a>
                            <ul class="sidenav-third-level collapse" id="collapseMultiTire">
                                <li class="<?=activate_menu('tires');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/tires")?>">
                                        <i class="fa fa-circle-o"></i>
                                        <span class="nav-link-text">ขอบยางรถยนต์</span>
                                    </a>
                                </li>
                                <li class="<?=activate_menu('tires/tiresbrand/');?>">
                                    <a class="nav-link text-white" href="<?=base_url("admin/tires/tiresbrand/")?>">
                                        <i class="fa fa-futbol-o"></i>
                                        <span class="nav-link-text">ยี่ห้อยางรถยนต์</span>
                                    </a>
                                </li>

                                <!-- <li class="<?=activate_menu('tires/tirechange/');?>">
                  <a class="nav-link text-white" href="<?=base_url("admin/tires/tirechange/")?>">
                    <i class="fa fa-usd"></i>
                    <span class="nav-link-text">ราคาเปลี่ยนยาง</span>
                  </a>
                </li> -->
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#matchingProduct" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">ข้อมูลอะไหล่ตามข้อมูลรถยนต์</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="matchingProduct">
                        <li class="<?=activate_menu('spareundercarriesdata');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/spareundercarriesdata")?>">
                                <i class="fa fa-car"></i>
                                <span class="nav-link-text">อะไหล่ช่วงล่าง</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('lubricatormatching');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/lubricatormatching")?>">
                                <i class="fa fa-tint"></i>
                                <span class="nav-link-text">น้ำมันเครื่อง</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('tires/tiresmatching/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/tires/tiresmatching/")?>">
                                <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                <span class="nav-link-text">ยางรถยนต์</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#dataProduct" data-parent="#exampleAccordion">
                        <i class="fa fa-product-hunt"></i>
                        <span class="nav-link-text">รูปภาพสินค้า </span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="dataProduct">
                        <!-- <li class="<?=activate_menu('spareproduct');?>">
              <a class="nav-link text-white" href="<?=base_url("admin/spareproduct")?>">
                <i class="fa fa-cog"></i>
                <span class="nav-link-text">อะไหล่ช่วงล่าง</span>
              </a>
            </li>
            <li class="<?=activate_menu('lubricatorproduct');?>">
              <a class="nav-link text-white" href="<?=base_url("admin/lubricatorproduct")?>">
                <i class="fa fa-rebel"></i>
                <span class="nav-link-text">น้ำมันเครื่อง</span>
              </a>
            </li> -->
                        <!-- <li class="<?=activate_menu('tireproduct');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/tireproduct")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ยางรถ</span>
                            </a>
                        </li> -->
                        <li class="<?=activate_menu('tirepicture');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/tirepicture")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ยางรถ</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?=activate_menu('promote');?>" data-toggle="tooltip" data-placement="right"
                    title="Dashboard">
                    <a class="nav-link text-white" href="<?=base_url("admin/promote")?>">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span class="nav-link-text">รูปภาพแบนเนอร์</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#Tirelimit" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">กำหนดราคาสินค้า</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Tirelimit">
                        <li class="<?=activate_menu('Tirelimit/tirescharge/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/Tirelimit/GarageGruop")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ยางรถ</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#serviceCharge" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">ราคาค่าบริการ</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="serviceCharge">
                        <!-- <li class="<?=activate_menu('charge/brand/');?>">
              <a class="nav-link text-white" href="<?=base_url("admin/charge/brand")?>">
                <i class="fa fa-cog"></i>
                <span class="nav-link-text">ราคาค่าบริการเปลี่ยนอะไหล่ช่วงล่าง</span>
              </a>
            </li>
            <li class="<?=activate_menu('charge/lubricatorcharge/');?>">
              <a class="nav-link text-white" href="<?=base_url("admin/charge/lubricatorcharge")?>">
                <i class="fa fa-rebel"></i>
                <span class="nav-link-text">ราคาค่าบริการเปลี่ยนน้ำมันเครื่อง</span>
              </a>
            </li> -->
                        <li class="<?=activate_menu('charge/tirescharge/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/charge/tirescharge")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ยางรถ</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse" href="#service"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">ราคาค่าจัดส่ง</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="service">
                        <li class="<?=activate_menu('charge/tireservice/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/charge/tireservice")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ยางรถ</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item <?=activate_menu('garages');?>" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link text-white" href="<?=base_url("admin/garages")?>">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span class="nav-link-text">ที่ตั้งอู่</span>
          </a>
        </li> -->

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#manage_order">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">การสั่งซื้อสินค้า</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="manage_order">
                        <li class="<?=activate_menu('paymentapprove');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/paymentapprove")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ยืนยันการจ่ายเงิน</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('orderapprove');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/orderapprove")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">จัดการการจอง</span>
                            </a>
                        </li>
                        <!-- <li class="<?=activate_menu('manageorder');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/manageorder")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">จัดการการสั่งสินค้า</span>
                            </a>
                        </li> -->
                        <li class="<?=activate_menu('order');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/order")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">รายการสั่งซื้อสินค้า</span>
                            </a>
                        </li>
                        <!-- <li class="<?=activate_menu('order');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/order")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">รายการสั่งซื้อสินค้า</span>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#manage_revenue">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">การเงิน</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="manage_revenue">
                        <li class="<?=activate_menu('revenue/income_item/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/revenue/income_item")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">รายได้แต่ละรายการ</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('revenue/income/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/revenue/income")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">รายได้แต่ละเดือน</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed text-white" data-toggle="collapse"
                        href="#payment_user">
                        <i class="fa fa-fw fa-dollar"></i>
                        <span class="nav-link-text">การจ่ายเงิน</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="payment_user">
                        <li class="<?=activate_menu('revenue/income_item/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/Payment/garagesmanagementindex")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ศูนย์บริการคาร์ใจดี</span>
                            </a>
                        </li>
                        <li class="<?=activate_menu('revenue/income/');?>">
                            <a class="nav-link text-white" href="<?=base_url("admin/Payment/managepartsshopindex")?>">
                                <i class="fa fa-life-ring"></i>
                                <span class="nav-link-text">ร้านค้าส่งคาร์ใจดี</span>
                            </a>
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